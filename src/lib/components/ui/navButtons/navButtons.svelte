<script>
	import { Button } from '$lib/components/ui/button';
	import { page } from '$app/stores';
	import Icon from '$lib/components/ui/icon/icon.svelte';
</script>

<div class="mb-4">
	<Button
		href="/"
		variant={$page.url.pathname == '/' ? 'default' : 'ghost'}
		size="full"
		class="text-left"
		rel="noreferrer">Home</Button
	>

	<Button
		href="/about"
		variant={$page.url.pathname.includes('/about') ? 'default' : 'ghost'}
		size="full"
		class="text-left"
		rel="noreferrer">About</Button
	>
</div>

<hr class="mb-6" />

<div>
	<small class="px-4 py-2 text-xs font-medium leading-none text-muted-foreground">Online</small>

	<!-- Github -->
	<Button
		href="https://github.com/burraksumer"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="github" /> </span>
		GitHub
		<span class="ml-auto mr-0"> <Icon name="arrow-up-right" /> </span>
	</Button>

	<!-- LinkedIn -->
	<Button
		href="https://www.linkedin.com/in/buraksum/"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="linkedin" /> </span>
		LinkedIn
		<span class="ml-auto mr-0"> <Icon name="arrow-up-right" /> </span>
	</Button>

	<!-- Twitter -->
	<Button
		href="https://twitter.com/burraksumer"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="twitter" /> </span>
		Twitter
		<span class="ml-auto mr-0"> <Icon name="arrow-up-right" /> </span>
	</Button>

	<!-- YouTube -->
	<Button
		href="https://www.youtube.com/@brokiama/"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="youtube" /> </span>
		YouTube
		<span class="ml-auto mr-0"> <Icon name="arrow-up-right" /> </span>
	</Button>

	<!-- Publications -->
	<Button
		href="https://www.goodreads.com/author/list/21463143.Burak_S_mer"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="book" /> </span>
		Publications
		<span class="ml-auto mr-0"> <Icon name="arrow-up-right" /> </span>
	</Button>

	<!-- PGP -->
	<Button
		href="https://raw.githubusercontent.com/burraksumer/pgp/main/public.asc"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="key" /> </span>
		PGP Key
		<span class="ml-auto mr-0"> <Icon name="arrow-up-right" /> </span>
	</Button>

	<!-- Resume -->
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>

	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
	<Button
		href="https://burak.mulayim.app/cvBurakSumer.pdf"
		target="_blank"
		variant="ghost"
		size="full"
		class="mt-2 items-center gap-2 text-left"
		rel="noreferrer"
	>
		<span class=""> <Icon name="file-text" /> </span>
		Resume
		<span class="ml-auto mr-0"> <Icon name="arrow-down" /> </span>
	</Button>
</div>
