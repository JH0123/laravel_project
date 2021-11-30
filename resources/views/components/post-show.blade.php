<div class="container">
    <div class="card" style="width: 80%; margin:10px">
        @if ($post->image)
            <img src="{{ '/storage/images/'. $post->image }}" class="card-img-top" alt="post image">
            @else
            <span>첨부 이미지 없음</span>
            @endif
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $post->writer->name }}</li>
            <li class="list-group-item">@if ($post->age == null)
                <span>비공개</span>
                @else
                <span>{{ $post->age }}</span>
            @endif</li>
            <li class="list-group-item">{{ $post->hobby }}</li>
            <li class="list-group-item">{{ $post->created_at->diffForHumans() }}</li>
            <li class="list-group-item">{{ $post->updated_at->diffForHumans() }}</li>
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