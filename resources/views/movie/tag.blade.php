@extends('layout')
@section('title','タグ一覧')
@section('content')
<div class="container">
    <h3>タグ一覧</h3>
    <div class="row">
        @foreach($genres->chunk(20) as $chunk) <!-- 20件ずつのチャンクに分割 -->
            <div class="col-md-4">
                <ul>
                    @foreach($chunk as $genre)
                        <li>{{ $genre->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>

{{ $genres->links() }}

<div>
    
</div>
@endsection
