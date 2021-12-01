{{-- <div class="m-4 p-4">
  <table class="table dark:text-gray-300">
    <thead>
      <tr>
        <th scope="col">제목</th>
        <th scope="col">작성자</th>
        <th scope="col">작성일</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <td><a href="{{ route('posts.show', ['post'=>$post->id]) }}">{{ $post->title }}</a></td>
          <td>{{ $post->writer->name }}</td>
          <td>{{ $post->created_at->diffForHumans() }}</td>
        </tr>
    @endforeach
      </tbody>
      </table>
      {{ $posts->links() }}
</div> --}}

<div class="grid grid-cols-3 m-4">
          @foreach ($posts as $post)
          <div class="card-body">
              @if ($post->image)
              <img src="{{ '/storage/images/'. $post->image }}" class="card-img-top" alt="post image">
              @else
              <img src="/storage/images/no image.jpg" class="card-img-top" alt="post image">
              @endif
          <a href="{{ route('posts.show', ['post'=>$post->id]) }}">{{ $post->title }}</a>
          <p>{{ $post->writer->name }}</p>
          <p>{{ $post->created_at->diffForHumans() }}</p>
          </div>
          @endforeach
    {{ $posts->links() }}
</div>