@section('title', 'Sign in to your account')

<div class="flex flex-col gap-3">
    <h1 class="text-xl font-semibold tracking-tight text-center scroll-m-20">Login to your account</h1>

    <form
        class="flex flex-col gap-3"
        wire:submit.prevent="authenticate"
        novalidate
    >
        <x-text-input
            type="text"
            wire:model="login"
            label="Email or Username"
            placeholder="jdoe / john@doe.com"
            required
        />
        @error('login')
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

        <div class="flex items-center justify-between">
            <label class="flex items-center">
                <input
                    class="form-checkbox"
                    type="checkbox"
                    wire:model="remember"
                >
                <span class="ml-2 text-sm text-gray-600">Remember me</span>
            </label>

            <a
                class="text-sm text-gray-600 underline hover:text-gray-900"
                href="{{ route('password.request') }}"
            >
                Forgot your password?
            </a>
        </div>

        <div class="grid gap-3 mt-6 md:grid-cols-2 md:auto-cols-auto ">
            <x-link-button
                class=""
                href="{{ route('register') }}"
                variant="white"
                iconName="arrow-left"
            >Need an account?</x-link-button>
            <x-v-button
                type="submit"
                variant="dark"
            >Login</x-v-button>
        </div>
    </form>
</div>
