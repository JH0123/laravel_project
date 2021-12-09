<div class="container d-flex justify-content-center">
    <div class="card" style="width: 40%; margin:10px">
        @if ($post->image)
            <img src="{{ '/storage/images/'. $post->image }}" class="card-img-top" alt="post image">
            @else
            <img src="/storage/images/no image.jpg" class="card-img-top" alt="post image">
            @endif
        <div class="card-body">
            <h5 class="card-title">제목 : {{ $post->title }}</h5>
            <p class="card-text">내용 : {{ $post->content }}</p>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">작성자 : {{ $post->writer->name }}</li>
            <li class="list-group-item">@if ($post->age == null)
                <span>나이제한 : 없음</span>
                @else
                <span>나이제한 : {{ $post->age }}</span>
            @endif</li>
            <li class="list-group-item">모집인원 : {{ $post->applicant }} 명</li>
            <li class="list-group-item">현재 신청인원 : {{ DB::table('applies')->get()->count('post_id' == $post->id) }} 명
                @if (Auth::user()->id == $post->user_id)
                    @else
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                     <a href="/apply/{{ $post->id }}" class="btn btn-primary me-md-2">신청하기</a>
                     <a href="/apply_cancel/{{ $post->id }}" class="btn btn-danger">신청취소</a>
                    </div>
                @endif
            </li>
            <li class="list-group-item">등록일 : {{ $post->created_at->diffForHumans() }}</li>
            <li class="list-group-item">작성일 : {{ $post->updated_at->diffForHumans() }}</li>
        </ul>

        <div class="card-body flex">
           @can('update',$post)
            <a href="{{ route('posts.edit',['post'=>$post->id]) }}" class="card-link">수정하기</a>
            @endcan

            <div class="ml-4">
                @can('delete',$post)
                    <form class="row g-3" action="{{ route('posts.destroy',['post'=>$post->id]) }}"
                    method="post" enctype="multipart/form-data">
                    @method('delete')
                    @csrf
                    <button type="submit">삭제하기</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</div>