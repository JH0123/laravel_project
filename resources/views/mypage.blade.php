<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mypage') }}
        </h2>
        <button onclick=location.href="{{ route('posts.create') }}" type="button" class="btn btn-primary font-bold">글작성</button>
        </div>
    </x-slot>
    <div class="container-xxl my-md-4 bd-layout">
        <x-post-mypage :posts="$posts" />
    </div>
</x-app-layout>

{{-- 
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Mypage') }}
                        </h2>
                        <button onclick=location.href="{{ route('posts.create') }}" type="button" class="btn btn-primary font-bold">글작성</button>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="container-xxl my-md-4 bd-layout row">
                <x-post-navigation />
                <x-post-mypage :posts="$posts" class="col-8"/>
            </div>
        </div>
    </body>
</html> --}}
