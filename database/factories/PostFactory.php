<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'content' => $this->faker->paragraphs(1, true),
            'user_id' => User::factory(),
            'slug' => Str::slug($title),
            'deleted_at' => null,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $post->slug = Str::slug($post->title).'-'.$post->id;
            $post->save();
        });
    }
}
