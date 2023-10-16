<script>
	import { Button } from '$lib/components/ui/button';
	import NavButtons from '$lib/components/ui/navButtons/navButtons.svelte';
	import AvatarWithText from '../avatarWithText/avatarWithText.svelte';
</script>

<aside
	class="sticky top-0 hidden h-screen overflow-y-auto p-6 lg:block lg:w-64 lg:border-r xl:w-72"
>
	<AvatarWithText />
	<NavButtons />
</aside>
