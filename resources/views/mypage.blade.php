<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mypage') }}
        </h2>
        <button onclick=location.href="{{ route('posts.create') }}" type="button" class="btn btn-secondary hover:bg-black font-bold text-white">글작성</button>
        </div>
    </x-slot>
    <div class="container-xxl my-md-4 bd-layout">
        <x-post-mypage :posts="$posts" />
    </div>
</x-app-layout>