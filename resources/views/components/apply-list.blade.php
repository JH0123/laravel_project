{{-- 신청 목록 --}}
<div class="flex h-full mt-4">
<div class="w-1/5 border-r-2 ml-3 border-solid border-gray-600">신청자 목록</div>
  <div class="w-4/5 flex flex-col">
    @foreach ($applies as $apply)
          @if ($apply->user_id == Auth::user()->id)
              @else
              <div class="border p-3">
                {{ $apply->user_id }} 님으로 부터 신청 요청이 있습니다.
                <div class="float-right">
                <form method="post" name="form">
                    @csrf
                    <input type="hidden" value="{{ $apply->user_id }}" name="request_user_id">
                    <input type="hidden" value="{{ $apply->post_id }}" name="request_post_id">
                    {{-- <a href="/accept/{{ $apply->post_id }}" class="mb-10 bg-blue-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded">Ok</a>
                    <a href="/refusal/{{ $apply->user_id }}" class="mb-10 bg-red-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded">No</a> --}}
                    <input class="mb-10 bg-blue-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" type="submit" value="OK" onclick="javascript: form.action='/apply/accept';">
                    <input class="mb-10 bg-red-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" type="submit" value="NO" onclick="javascript: form.action='/apply/refusal';">
                </form>
                </div>
                </div>
          @endif                
    @endforeach
    </div>
</div>

{{-- 로그인한 유저가 신청한 목록 --}}
{{-- <div class="flex h-full">
<div class="w-1/5 border-r-2 border-solid border-gray-600">신청한 내역</div>
  <div class="w-4/5 flex flex-col">
    @foreach ($applies as $apply)
      <div class="border p-3">
          @if ($apply->post_id == )
              @else
                {{ $apply->post_id }}에 신청을 했습니다
          @endif                 
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
</div> --}}