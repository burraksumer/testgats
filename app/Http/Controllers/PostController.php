<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);

        $posts->getCollection()->transform(function ($post) {
            $post->summary = Str::limit($this->markdownToPlainText($post->content), 90);

            return $post;
        });

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ], [
            'title.required' => 'The title field is required.',
            'content.required' => 'The content field is required.',
        ]);

        $post = new Post($request->all());
        $post->user_id = auth()->id();

        /** Generate temp slug */
        $tempSlug = Str::slug($request->title);
        $post->slug = $tempSlug;

        $post->save();

        /** Update slug with id at the end */
        $post->slug = $tempSlug.'-'.$post->id;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        /**
         * Extract the post ID from the slug, use the ID for self-healing URLs
         */
        $lastHyphenPosition = strrpos($slug, '-');
        $id = $lastHyphenPosition !== false ? substr($slug, $lastHyphenPosition + 1) : null;
        $id = (int) $id;
        $post = Post::with('comments.user')->find($id);
        if (! $post) {
            abort(404, 'Post not found.');
        }
        $actualSlug = $post->slug;
        if ($slug !== $actualSlug) {
            return redirect()->route('posts.show', ['post' => $actualSlug]);
        }

        /**
         * Parse post content from Markdown to HTML
         */
        $post->content = $this->parseMarkdown($post->content);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        /**
         * Store the previous URL in the session
         */
        $backUrlKey = 'backUrl.post.'.$post->id; // Dynamic session key based on post ID

        if (! session()->has($backUrlKey) || session()->get($backUrlKey) == url()->current()) {
            session()->put($backUrlKey, url()->previous());
        }

        $post->content = html_entity_decode($post->content, ENT_QUOTES, 'UTF-8');

        return view('posts.edit', compact('post', 'backUrlKey'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        /**
         * Generate updated slug
         **/
        $slug = Str::slug($request->title);

        /**
         * Append the post ID at the end of the slug
         **/
        $slugWithId = $slug.'-'.$post->id;

        $decodedContent = html_entity_decode($request->input('content'), ENT_QUOTES, 'UTF-8');

        $post->fill($request->except('content'));
        $post->content = $decodedContent;
        $post->slug = $slugWithId;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }

    /**
     * Display a list of all trashed posts.
     */
    public function trash()
    {
        $trashedPosts = Post::onlyTrashed()->get();
        $trashedPosts->transform(function ($post) {
            $post->content = $this->markdownToPlainText($post->content);

            return $post;
        });

        return view('posts.trash', compact('trashedPosts'));
    }

    /**
     * Restore a trashed post.
     */
    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect()->route('posts.trash')->with('success', 'Post restored successfully.');
    }

    /**
     * Permanently delete a trashed post.
     */
    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();

        return redirect()->route('posts.trash')->with('success', 'Post permanently deleted successfully.');
    }

    /**
     * Parse Markdown.
     */
    protected function parseMarkdown($markdownContent)
    {

        $html = Str::markdown(
            string: $markdownContent,
            options: [
                'html_input' => 'strip',
                'allow_unsafe_links' => false,
                'heading_permalink' => [
                    'symbol' => '#',
                ],
                'external_link' => [
                    'internal_hosts' => ['localhost', 'burak.mulayim.app'],
                    'open_in_new_window' => true,
                    'html_class' => 'external-link',
                    'nofollow' => '',
                    'noopener' => 'external',
                    'noreferrer' => 'external',
                ],
            ],
            extensions: [
                new HeadingPermalinkExtension(),
                new ExternalLinkExtension(),
            ],
        );

        return html_entity_decode($html, ENT_QUOTES, 'UTF-8');
    }

    /**
     * Parse Markdown to plain text.
     */
    protected function markdownToPlainText($markdownContent)
    {
        $htmlContent = Str::markdown($markdownContent);

        return strip_tags($htmlContent);
    }
}
