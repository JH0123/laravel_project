<div class="m-4 p-4">
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
          <td>{{ $post->title }}</td>
          <td>{{ $post->writer->name }}</td>
          <td>{{ $post->created_at->diffForHumans() }}</td>
        </tr>
    @endforeach
      </tbody>
      </table>
    {{ $posts->links() }}
</div>