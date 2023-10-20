<script>
	import { Button } from '$lib/components/ui/button';
	import NavButtons from '$lib/components/ui/navButtons/navButtons.svelte';
	import { slide } from 'svelte/transition';
	import { browser } from '$app/environment';
	import AvatarWithText from '../avatarWithText/avatarWithText.svelte';

	// @ts-ignore
	let scrollTop = null;
	// @ts-ignore
	let scrollLeft = null;

	//disable scroll when menu is open
	function disableScroll() {
		if (browser) {
			// scrollTop = window.document.documentElement.scrollTop;
			// (scrollLeft = window.document.documentElement.scrollLeft),
			// 	(window.onscroll = function () {
			// 		// @ts-ignore
			// 		window.scrollTo(scrollLeft, scrollTop);
			// 	});
			let body = document.getElementsByTagName('body')[0];
			body.style.overflow = 'hidden';
		}
	}

	//enable scroll when menu is closed
	function enableScroll() {
		if (browser) {
			let body = document.getElementsByTagName('body')[0];
			body.style.overflow = 'visible';
		}
	}

	let menuOpen = false;
	// I know if I add lang ts I can use MouseEvent, I don't want to.
	// @ts-ignore
	function toggleMenuOpen(event) {
		if (menuOpen) {
			menuOpen = false;
			enableScroll();
		} else {
			menuOpen = true;
			disableScroll();
		}
		event.stopPropagation();
	}

	function handleMenuClose() {
		menuOpen = false;
		enableScroll();
	}
	// @ts-ignore
	function handleESCKeyDown(event) {
		if (event.key === 'Escape') {
			menuOpen = false;
			enableScroll();
		}
	}
</script>

<svelte:window on:click={handleMenuClose} on:keydown={handleESCKeyDown} />

<div class="p-6 pt-2 lg:hidden">
	<nav class="mb-4 border-b">
		<Button on:click={toggleMenuOpen} class="mb-2" size="icon">&#10070;</Button>
	</nav>

	{#if menuOpen}
		<div
			transition:slide
			class="h-screen items-center justify-center overflow-hidden overflow-y-scroll bg-background pb-36"
		>
			<AvatarWithText />
			<NavButtons />
		</div>
	{/if}
</div>
