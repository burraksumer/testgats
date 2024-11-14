@extends('layouts.base')

@section('body')

    {{-- Handle session flash error messages --}}
    <div class="fixed z-50 m-3 top-5 right-5">
        @if (session('error'))
            <x-error-alert
                errorCode="{{ session('errorCode') }}"
                error="{{ session('error') }}"
            />
        @endif
    </div>

    {{-- Handle session flash success messages --}}
    <div class="fixed z-50 m-3 top-5 right-5">
        @if (session('success'))
            <x-success-alert successMessage="{{ session('success') }}" />
        @endif
    </div>

    {{-- Handle validation error messages --}}
    <div class="fixed z-50 m-3 top-5 right-5">
        @if ($errors->any())
            @foreach ($errors->all() as $index => $error)
                <x-error-alert
                    errorCode="Error"
                    error="{{ $error }}"
                />
            @endforeach
        @endif
    </div>

    @yield('content')

    @isset($slot)
        {{ $slot }}
    @endisset
@endsection
