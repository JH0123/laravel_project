<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-300">
              {{ __('동아리 찾기') }}
            </h2>
             <button onclick=location.href="{{ route('posts.create') }}" class="btn btn-secondary hover:bg-black font-bold text-white">글작성</button>
        </div>
    </x-slot>
    <x-post-search :posts="$posts"/>
</x-app-layout>