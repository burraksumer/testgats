<div class="flex flex-col space-y-4 bg-inherit">

    @persist('avatar-link')
        <x-avatar-link
            className='mb-6'
            name='Burak Sümer'
            href='home'
            title='QA Engineer'
            variant='white'
            imgURL=""
            imgAlt="B letter"
        >
        </x-avatar-link>
    @endpersist

    <x-link-button
        href='home'
        variant="{{ Route::is('home') ? 'dark' : 'white' }}"
    >Home</x-link-button>
    <x-link-button
        href='about'
        variant="{{ Route::is('about') ? 'dark' : 'white' }}"
    >About</x-link-button>
    <x-link-button
        href='posts.index'
        variant="{{ Str::contains(Route::currentRouteName(), 'posts') ? 'dark' : 'white' }}"
    >Posts</x-link-button>
    @auth
        <x-link-button
            href="{{ route('profile.show', Auth::user()) }}"
            variant="{{ Str::contains(Route::currentRouteName(), 'profile') ? 'dark' : 'white' }}"
        >Profile</x-link-button>
    @endauth

    {{-- Show logout or login based on if the user is logged in or not --}}
    @auth
        <form
            id="logout-form"
            action="{{ route('logout') }}"
            method="POST"
        >
            @csrf
            <x-v-button
                href='#'
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                variant="{{ Route::is('logout') ? 'dark' : 'white' }}"
            >Logout</x-v-button>
        </form>
    @else
        <x-link-button
            href='login'
            variant="{{ Route::is('login', 'register', 'password.request') ? 'dark' : 'white' }}"
        >Login</x-link-button>
    @endauth

    <hr>

    <small class="px-4 py-2 text-xs font-medium leading-none text-muted-foreground">Online</small>

    <x-link-button
        external='https://github.com/burraksumer'
        target='_blank'
        variant='white'
        iconName='github'
        iconNameEnd='arrow-up-right'
    >
        Github
    </x-link-button>

    <x-link-button
        external='https://www.linkedin.com/in/buraksum/'
        target='_blank'
        variant='white'
        iconName='linkedin'
        iconNameEnd='arrow-up-right'
    >
        LinkedIn
    </x-link-button>

    <x-link-button
        external='https://twitter.com/burraksumer'
        target='_blank'
        variant='white'
        iconName='twitter'
        iconNameEnd='arrow-up-right'
    >
        Twitter
    </x-link-button>

    <x-link-button
        external='https://www.youtube.com/@brokiama'
        target='_blank'
        variant='white'
        iconName='youtube'
        iconNameEnd='arrow-up-right'
    >
        Youtube
    </x-link-button>

    <x-link-button
        external='https://www.goodreads.com/author/show/21463143.Burak_S_mer'
        target='_blank'
        variant='white'
        iconName='book'
        iconNameEnd='arrow-up-right'
    >
        Publications
    </x-link-button>

    <x-link-button
        external='https://raw.githubusercontent.com/burraksumer/pgp/main/public.asc'
        target='_blank'
        variant='white'
        iconName='key'
        iconNameEnd='arrow-up-right'
    >
        PGP Key
    </x-link-button>

    <x-link-button
        external='https://burak.mulayim.app/cvBurakSumer.pdf'
        target='_blank'
        variant='white'
        iconName='file-text'
        iconNameEnd='arrow-down'
    >
        Resume
    </x-link-button>

</div>
