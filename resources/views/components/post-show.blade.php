<div class="container">
    <div class="card" style="width: 80%; margin:10px">
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
                <span>나이제한 :{{ $post->age }}</span>
            @endif</li>
            <li class="list-group-item">취미 : {{ $post->hobby }}</li>
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