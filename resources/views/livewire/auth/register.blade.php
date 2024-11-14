@section('title', 'Create a new account')

<div class="flex flex-col gap-3">
    <h1 class="text-xl font-semibold tracking-tight text-center scroll-m-20">Create a new account!</h1>

    <form
        class="flex flex-col gap-3"
        wire:submit.prevent="register"
        novalidate
    >
        <x-text-input
            wire:model="name"
            label="Name"
            placeholder="John Doe"
            required
        />
        @error('name')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror

        <x-text-input
            wire:model="username"
            label="Username"
            placeholder="jdoe"
            required
        ></x-text-input>
        @error('username')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror

        <x-text-input
            type="email"
            wire:model="email"
            label="Email"
            placeholder="john@doe.com"
            required
        />
        @error('email')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror

        <x-text-input
            type="password"
            wire:model="password"
            label="Password"
            placeholder="supersecurepassword"
            required
        />
        @error('password')
            <span class="text-sm text-red-500">{{ $message }}</span>
        @enderror

        <x-text-input
            type="password"
            wire:model="passwordConfirmation"
            label="Confirm Password"
            placeholder="supersecurepassword"
            required
        />

        <div class="grid gap-3 mt-6 md:grid-cols-2 md:auto-cols-auto ">
            <x-link-button
                class="mr-4"
                href="{{ route('login') }}"
                variant="white"
                iconName="arrow-left"
            >Already have an account?</x-link-button>
            <x-v-button
                type="submit"
                variant="dark"
            >Register</x-v-button>
        </div>
    </form>
</div>
