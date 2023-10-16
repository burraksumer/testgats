<script>
	import DesktopNav from '$lib/components/ui/desktopNav/desktopNav.svelte';
	import MobileNav from '$lib/components/ui/mobileNav/mobileNav.svelte';
	import '../app.postcss';
</script>

<div class="prose">
	<MobileNav />
	<div class="flex-rows flex">
		<DesktopNav />
		<div class="m-auto">
			<slot />
		</div>
	</div>
</div>
