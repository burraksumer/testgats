<script>
	export let data;
	// @ts-ignore
	const { song, carbon } = data;

	import * as Alert from '$lib/components/ui/alert';
	import { Skeleton } from '$lib/components/ui/skeleton';

	import Icon from '$lib/components/ui/icon/icon.svelte';
</script>

<h4 class="scroll-m-20 text-xl font-semibold tracking-tight">
	Hello, it's Burak <small class="text-sm font-medium leading-none">(/brak/)</small> 👋
</h4>
<p class="leading-7 [&:not(:first-child)]:mt-6">
	I'm a QA Engineer with a passion for Front-End Development and all things tech. When I'm not
	finding bugs and ensuring quality in my day job, I enjoy keeping up with the latest tech
	advancements and tinkering with new tools.
</p>
<div class="mt-6 min-h-screen">
	{#await Promise.all([data.streamed?.song, data.streamed?.carbon])}
		<!-- Song start -->
		<Alert.Root>
			<Icon name="disc" />
			<div class="sm:flex">
				<div class="h-full w-1/2">
					<Alert.Title><Skeleton class="mb-2 h-4 w-32 rounded-full sm:mb-1" /></Alert.Title>
					<Alert.Description>
						<Skeleton class="mb-2 h-4 w-48 rounded-full sm:mb-1" />
					</Alert.Description>
				</div>
				<hr class="my-4 sm:hidden" />

				<!-- Clubs start -->
				<div class="justify-end sm:w-1/2 sm:text-right">
					<Alert.Title>
						<div class="flex w-full items-center sm:justify-end">
							<div class="mr-2 h-2 w-2 rounded-full bg-green-500"></div>
							<a href="https://512kb.club/">512KB Club</a>
							<div class="ml-2 hidden h-2 w-2 rounded-full bg-green-500 sm:contents"></div>
						</div>
					</Alert.Title>
					<Alert.Description>
						<Skeleton class="mb-1 h-4 w-48 rounded-full sm:w-full" />
					</Alert.Description>
				</div>
			</div>
		</Alert.Root>
	{:then [song, carbon]}
		<!-- Song start -->
		<Alert.Root>
			<Icon name="disc" />
			<div class="h-full sm:flex">
				<div class="sm:w-1/2">
					<Alert.Title>
						<a target="_blank" href={song.recenttracks.track[0].url}
							>{song.recenttracks.track[0].name}</a
						></Alert.Title
					>
					<Alert.Description>
						<a target="_blank" href={song.recenttracks.track[0].url}
							>{song.recenttracks.track[0].artist['#text']}</a
						>
					</Alert.Description>
				</div>
				<hr class="my-4 sm:hidden" />

				<!-- Clubs start -->
				<div class="sm:w-1/2 sm:text-right">
					<Alert.Title>
						<div class="flex w-full items-center sm:justify-end">
							<div class="full mr-2 h-2 w-2 rounded bg-green-500"></div>
							<a href="https://512kb.club/">512KB Club</a>
							<div class="full ml-2 hidden h-2 w-2 rounded bg-green-500 sm:contents"></div>
						</div>
					</Alert.Title>
					<Alert.Description>
						<a target="_blank" href="https://www.websitecarbon.com/website/burak-mulayim-app/">
							{carbon.statistics.co2.grid.grams.toFixed(3)}g of CO2/view</a
						>
					</Alert.Description>
				</div>
			</div>
		</Alert.Root>
	{:catch error}
		<p>something went wront {error.message}</p>
	{/await}
</div>
<div class="min-h-screen">asd</div>
<div class="min-h-screen">asd</div>
