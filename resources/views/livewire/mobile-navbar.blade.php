<div
    class="p-6 pt-2 lg:hidden"
    x-data="navigationMenu"
    @keydown.escape.window="menuOpen = false"
    @click.away="menuOpen = false"
>
    <nav class="z-20 mb-4 border-b bg-inherit max-w-10">
        <x-v-button
            class="z-20 mb-2 text-xl"
            @click="$data.toggleMenu()"
        >
            &#8984;
        </x-v-button>
    </nav>

    <div
        class="z-10 items-center justify-center w-full h-screen overflow-hidden bg-white pb-36"
        x-show="menuOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-full"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 translate-y-full"
    >
        <x-nav-buttons />
    </div>

</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navigationMenu', () => ({
            menuOpen: false,
            toggleMenu() {
                this.menuOpen = !this.menuOpen;
                document.body.style.overflow = this.menuOpen ? 'hidden' : 'visible';
            },
            init() {
                this.$watch('menuOpen', value => {
                    document.body.style.overflow = value ? 'hidden' : 'visible';
                });
            }
        }));
    });
</script>
