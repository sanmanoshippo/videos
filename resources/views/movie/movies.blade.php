@extends('layout')
@section('title','動画一覧')
@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-2">
      <h2>動画一覧</h2>
      @if (session('err_msg'))
        <p class="text-danger">{{session('err_msg')}}</p>
      @endif
      <form name="searchForm" action="{{route('crud')}}" method="GET" onsubmit="return validateForm()">
        <input type="text" name="keyword" placeholder="検索キーワードを入力">
      <button type="submit">検索</button>
    </form>
    <div class="container">
      <div class="row row-cols-1 row-cols-md-3 g-3">
        <!-- 動画を表示するカード -->
        @foreach($movies as $movie)
        <div class="col">
            <div class="card">
            <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$movie->movie_url}}?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <div class="card-body">
                    <h5 class="card-title"><a href="/movies/{{$movie->id}}">{{$movie->title}}</a></h5>
                    <p class="card-text">{{ mb_strlen($movie->description) > 30 ? mb_substr($movie->description, 0, 30) . '...' : $movie->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>

  <!-- ページネーション -->
  <div class="container">
    <div class="row">
        <div class="col-md-10 d-flex justify-content-center">
            {{ $movies->links() }}
        </div>
    </div>
  </div>

  </div>
</div>
<div>
      
    <script>
    function validateForm() {
        var keyword = document.forms["searchForm"]["keyword"].value;
        if (keyword.trim() === "") {
            // キーワードが空の場合は送信をキャンセル
            return false;
        }
    }
</script>
</div>
@endsection
