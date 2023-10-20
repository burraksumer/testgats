<script>
	import DesktopNav from '$lib/components/ui/desktopNav/desktopNav.svelte';
	import MobileNav from '$lib/components/ui/mobileNav/mobileNav.svelte';
	import '../app.postcss';
</script>

<div class="prose">
	<MobileNav />
	<div class="flex-rows flex">
		<DesktopNav />
		<div class="flex-grow sm:px-12 sm:pt-36 px-6">
			<div class="m-auto max-w-3xl">
				<slot />
			</div>
		</div>
	</div>
</div>
