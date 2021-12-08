{{-- <div class="grid grid-cols-4 m-4">
  @foreach ($posts as $post)
    <div class="card-body">
      @if ($post->image)
        <img src="{{ '/storage/images/'. $post->image }}" class="card-img-top" alt="post image">
        @else
        <img src="/storage/images/no image.jpg" class="card-img-top" alt="post image">
      @endif
      <div class="ml-3">
      <a href="{{ route('posts.show', ['post'=>$post->id]) }}" class="font-bold text-lg">{{ $post->title }}</a>
      <p>작성자 : {{ $post->writer->name }}</p>
      <p>작성일 : {{ $post->created_at->diffForHumans() }}</p>
      </div>
    </div>
  @endforeach
  {{ $posts->links() }}
</div> --}}

<div class="container">
<div class="row row-cols-4">
  @foreach ($posts as $post)
    <div class="card ml-4 mb-5 shadow-sm">
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