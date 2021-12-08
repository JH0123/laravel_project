{{-- 신청 목록 --}}
<div class="flex h-full">
<div class="w-1/5 border-r-2 border-solid border-gray-600">신청 목록</div>
  <div class="w-4/5 flex flex-col">
    @foreach ($applies as $apply)
      <div class="border p-3">                 
        {{ $apply->user_id }}님으로 부터 신청 요청이 있습니다.
        <div class="float-right">
          <form method="post" name="form">
            @csrf
            <input type="hidden" value="{{ $apply->user_id }}">
            <input type="hidden" value="{{ $apply->post_id }}">
            <input class="mb-10 bg-blue-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" 
            type="submit" value="ok"/>
            <input class="mb-10 bg-red-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" 
            type="submit" value="no"/>
          </form>
        </div>
      </div>                
    @endforeach
    </div>    
</div>