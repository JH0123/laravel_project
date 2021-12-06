<div class="container">
<div class="row row-cols-4">
  @foreach ($posts as $post)
    <div class="card mb-5 shadow-sm">
      @if ($post->image)
        <img src="{{ '/storage/images/'. $post->image }}" class="img-fluid" alt="post image">
        @else
        <img src="/storage/images/no image.jpg" class="img-fluid" alt="post image">
      @endif
      <div class="card-body">
        <div class="card-title">
          <a href="{{ route('posts.show', ['post'=>$post->id]) }}" class="font-bold text-lg">{{ $post->title }}</a>
        </div>
        <div class="card-text">
          <p>작성자 : {{ $post->writer->name }}</p>
          <p>작성일 : {{ $post->created_at->diffForHumans() }}</p>
        </div>
      </div>
    </div>
  @endforeach
  {{ $posts->links() }}
</div>
</div>

{{-- 신청 목록 --}}
{{-- <div class="flex h-full">
<div class="w-1/5 border-r-2 border-solid border-gray-600">신청 목록</div>
  <div class="w-4/5 flex flex-col">
    @foreach ($apply_list as $apply)
      <div class="border p-3">                 
        {{ $apply->user_id }}님으로 부터 신청 요청이 있습니다.
        <div class="float-right"> --}}
          {{-- 버튼을 두개만들어서, 버튼에 따라서 action을 다르게 주기위함 --}}
          {{-- <form method="post" name="form">
            @csrf
            <input type="hidden" value="{{ $apply->user_id }}">
            <input type="hidden" value="{{ $apply->post_id }}">
            <input class="mb-10 bg-blue-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" 
            type="submit" value="ok" onclick=""/>
            <input class="mb-10 bg-red-700 hover:bg-gray-900 text-white font-bold py-2 px-4 border border-gray-900 rounded" 
            type="submit" value="no" onclick=""/>
          </form>
        </div>
      </div>                
    @endforeach
    </div>    
</div> --}}