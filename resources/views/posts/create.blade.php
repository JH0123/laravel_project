<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form') }}
        </h2>
        <button onclick=location.href="{{ route('posts.index') }}" class="btn btn-info hover:bg-blue-700 font-bold text-white">목록보기</button>
        </div>
    </x-slot>

    <div class="m-4 p-4">
      <form class="row g-3" action="{{ route('posts.store') }}"
      method="post" enctype="multipart/form-data">
      @csrf

        <div class="col-12 m-2">
          <label for="title" class="form-label">제목</label>
          <textarea class="form-control" name="title" id="title">{{ old('title') }}</textarea>
          
          @error('title')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">    
          <label for="age" class="form-label">나이(필수X)</label>
          <textarea class="form-control" name="age" id="age">{{ old('age') }}</textarea>
          
          @error('age')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="applicant" class="form-label">모집인원(숫자만 입력해 주세요)</label>
          {{-- 숫자 이외를 입력했을 때 오류창 뜨게 만들것 --}}
          <textarea class="form-control" name="applicant" id="applicant">{{ old('applicant') }}</textarea>
          
          @error('applicant')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="content" class="form-label">소개</label>
          <textarea class="form-control" name="content" id="content">{{ old('content') }}</textarea>

          @error('content')
            <span class="text-red-800">{{ $message }}</span>
          @enderror
        </div>

        <div class="col-12 m-2">
          <label for="image" class="form-label">이미지 첨부</label>
          <input type="file" name="image" id="image" value="{{ old('image') }}">
        </div>

        <div class="col-12 m-2">
          <button type="submit" class="btn btn-info hover:bg-blue-700 font-bold text-white">Submit</button>
        </div>
  
      </form>
    </div>
</x-app-layout>