@extends('layout')
@section('title', '登録情報編集')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>動画情報の編集</h2>
        <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
            @csrf
            <input type="hidden" name="id" value="{{$movie->id}}">
            <div class="form-group">
                <label for="title">
                    動画の名前
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{$movie->title}}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="movie_url">
                    youtubeのURL
                </label>
                <input
                    id="movie_url"
                    name="movie_url"
                    class="form-control"
                    value="{{ $movie->movie_url }}"
                    type="url"
                >
                @if ($errors->has('movie_url'))
                    <div class="text-danger">
                        {{ $errors->first('movie_url') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="description">
                    レシピなど
                </label>
                <textarea
                    id="description"
                    name="description"
                    class="form-control"
                    value="{{ $movie->description }}"
                    rows="4"
                >{{ $movie->description }}</textarea>
                @if ($errors->has('description'))
                    <div class="text-danger">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('movie') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新OK?')){
    return true;
} else {
    return false;
}
}
</script>
@endsection