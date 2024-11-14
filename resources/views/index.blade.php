@extends('layouts.app')

@section('content')
    <div>
        <h1 class="text-xl font-semibold tracking-tight scroll-m-20">
            Hello, it's Burak <small class="text-sm font-medium leading-none">(/brak/)</small> 👋
        </h1>
        <p class="leading-7 [&:not(:first-child)]:mt-6">
            I'm a QA Engineer with a passion for Front-End Development and all things tech. When I'm not
            finding bugs and ensuring quality in my day job, I enjoy keeping up with the latest tech
            advancements and tinkering with new tools.
        </p>
    </div>
    <div>
        <x-alert iconName='disc' />
    </div>
    <div class="min-h-screen"></div>

    <x-v-icon name='twitter' />
@endsection
