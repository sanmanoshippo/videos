<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="{{ route('movie') }}">
    <img src="/images/アイコン.png" alt="動画" width="30" height="30">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
     {{--  <a class="nav-item nav-link active" href="{{route('movie')}}">一覧へ <span class="sr-only"></span></a> --}}
     
      <a class="nav-item nav-link" href="{{route('create')}}">登録</a>
      <a class="nav-item nav-link" href="{{route('tag')}}">タグ</a>
    </div>
  </div>
</nav>
