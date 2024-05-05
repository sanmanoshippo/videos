@extends('layout')
@section('title','詳細')
@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h2>{{$movie->title}}</h2>
    <span>登録日:{{$movie->created_at}}</span>
    <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{$movie->movie_url}}?controls=1" 
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen></iframe>
        <ul>
    @foreach($genres as $genre)
        <li>{{ $genre }}</li>
    @endforeach
</ul>
    <br>レシピなど:</br>
    <br>{{$movie->description}}</br>
    <div class="row">
      <div class="col-auto">
        <button type="button" class="btn btn-primary" onclick="location.href='/movies/edit/{{$movie->id}}'">編集する</button>
      </div>
      <div class="col-auto">
        <form method="POST" action="{{ route('delete', $movie->id) }}" onSubmit="return checkDelete()">
          @csrf
          <button type="submit" class="btn btn-danger" onclick=>消えてもらう</button>
        </form>
      </div>
      </div>
  </div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</div>
<script>
function checkDelete(){
if(window.confirm('お別れ?')){
    return true;
} else {
    return false;
}
}
</script>
@endsection
