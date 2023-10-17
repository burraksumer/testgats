<script>
	export let name = '';
	export let width = '16';
	export let height = '16';
</script>

<svg class={$$props.class} {width} {height}>
	<use href={`/icons/icons.svg#${name}`} />
</svg>
