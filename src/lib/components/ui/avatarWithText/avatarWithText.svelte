<script>
	import * as Avatar from '$lib/components/ui/avatar';
	import Button from '../button/button.svelte';
	import Headshot from '$lib/assets/images/headshot.webp';
</script>

<Button size="hfull" variant="ghost" class="mb-6" href="/">
	<div class="flex items-center">
		<Avatar.Root>
			<Avatar.Image src={Headshot} alt="Burak Headshot" />
			<Avatar.Fallback>BS</Avatar.Fallback>
		</Avatar.Root>
		<div class="ml-2">
			<p class="font-bold leading-7 [&:not(:first-child)]:mt-6">Burak Sümer</p>
			<p class="text-sm text-muted-foreground">QA Engineer</p>
		</div>
	</div>
</Button>
