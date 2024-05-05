@extends('layout')
@section('title', '動画登録')
@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>動画を登録してね</h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
            @csrf
            <div class="form-group">
                <label for="title">
                    動画の名前
                </label>
                <input
                    id="title"
                    name="title"
                    class="form-control"
                    value="{{ old('title') }}"
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
                    value="{{ old('movie_url') }}"
                    type="url"
                >
                @if (session('err_msg'))
                    <p class="text-danger">{{session('err_msg')}}</p>
                @endif
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
                    value="{{ old('description') }}"
                    rows="4"
                >{{ old('description') }}</textarea>
                @if ($errors->has('description'))
                    <div class="text-danger">
                        {{ $errors->first('description') }}
                    </div>
                @endif
            </div>
    @for($i = 1; $i <= 5; $i++)
        <div>
            <select name="genre{{ $i }}" onchange="toggleNewGenreInput(this)">
                <option value="">ジャンルを選択</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
                <option value="new">新規登録</option>
            </select>
            <!-- 新規登録の場合の入力欄 -->
            <input type="text" name="new_genre{{ $i }}" class="new-genre" style="display: none;">
            
        </div>
    @endfor
            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('movie') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    登録する
                </button>
            </div>
        </form>
    </div>
</div>
<script>
function checkSubmit(){
if(window.confirm('登録OK?')){
    return true;
} else {
    return false;
}
}
function toggleNewGenreInput(select) {
        var input = select.nextElementSibling;
        if (select.value === 'new') {
            input.style.display = 'inline-block';
        } else {
            input.style.display = 'none';
        }
    }
</script>
@endsection