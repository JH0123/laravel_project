<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('신청 내역') }}
        </h2>
        <button onclick=location.href="{{ route('posts.create') }}" type="button" class="btn btn-primary font-bold">글작성</button>
        </div>
    </x-slot>
        <x-apply-list :applies="$applies" />
</x-app-layout>