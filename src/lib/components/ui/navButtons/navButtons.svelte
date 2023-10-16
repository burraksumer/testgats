<script>
	import { Button } from '$lib/components/ui/button';
	import { page } from '$app/stores';
</script>

<div>
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
