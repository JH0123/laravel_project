<div class="card" style="width: 18rem;">
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
    <li class="list-group-item">{{ $post->age }}</li>
    <li class="list-group-item">{{ $post->hobby }}</li>
    <li class="list-group-item">{{ $post->created_at->diffForHumans() }}</li>
    <li class="list-group-item">{{ $post->updated_at->diffForHumans() }}</li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link">수정</a>
    <a href="#" class="card-link">삭제</a>
  </div>
</div>