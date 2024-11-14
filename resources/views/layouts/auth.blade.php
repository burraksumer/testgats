@extends('layouts.base')

@section('body')
    <div class="">
        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
@endsection
