<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{

    /**
     * ==============================================================
     * ◆動画を並べて表示検索結果も表示
     * --------------------------------------------------------------
     * @return view
     *  */
        public function movies()
        {

            $movies = Movie::query()->paginate(12);
            return view('movie.movies', ['movies' => $movies]);

        }
    //==============================================================

    /**
     * ==============================================================
     * ◆動画の詳細を表示する
     * --------------------------------------------------------------
     * @param int $id
     * @return view
     *  */
        public function showDetail($id)
        {
            $movie = Movie::find($id);
            if(is_null($id)){
                \Session::flash('err_msg','データがありません');
                return redirect(route('movie'));
            }
            $genres = $movie->genres()->pluck('name')->toArray();
            return view('movie.detail', compact('movie', 'genres'));
        }
    //==============================================================

    /**
     * ==============================================================
     * ◆動画を登録画面を表示する
     * --------------------------------------------------------------
     * @return view
     *  */
    public function showCreate() 
    {
        $genres = Genre::all();
        return view('movie.form', compact('genres'));
    }
    //==============================================================

    /**
     * ==============================================================
     * ◆動画を新規登録する
     * --------------------------------------------------------------
     * @return view
     *  */
    public function exeStore(MovieRequest $request)
    {

            // 動画のデータを取得する

        
        \DB::beginTransaction();
        try{
            $url = $request['movie_url'];
            // YouTubeの動画IDを抜き出すための正規表現パターン
            $pattern = '/(?:youtube\.com\/(?:[^\/\n\s]+\/\S+(?:\/|\b))|(?:youtu\.be\/))(?<id>[^"&?\/\n\s]{11})/';
            // URLから動画IDを抜き出す
            if (preg_match($pattern, $url, $matches)) {
             $request['movie_url'] = $matches['id'];
            } else {
             \Session::flash('err_msg','!URLを確認してください:youtubeのURLを入力してね');
             return redirect(route('create'));
            }
            $movieData = [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'movie_url' => $request->input('movie_url'),
                ];
            // 映画を登録する
            $movie = Movie::create($movieData);

            // ジャンルの関連付けを行う
            for ($i = 1; $i <= 5; $i++) {
            // ジャンルIDを取得する
            $genreId = $request->input('genre' . $i);
            if (!empty($genreId) && $genreId !== 'new') {
            // 既存のジャンルを関連付ける
            $movie->genres()->attach($genreId);
            } else {
            // 新しいジャンルを作成して関連付ける
            $newGenreName = $request->input('new_genre' . $i);
            if (!empty($newGenreName)) {
                $newGenre = Genre::create(['name' => $newGenreName]);
                $movie->genres()->attach($newGenre->id);
            }
        }
    }
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        
        \Session::flash('err_msg','登録が完了したよ');
        return redirect(route('movie'));
    }
    //==============================================================

    /**
     * ==============================================================
     * ◆動画の編集画面を表示する
     * --------------------------------------------------------------
     * @param int $id
     * @return view
     *  */
    public function showEdit($id)
    {
        $movies = Movie::find($id);
        if(is_null($id)){
            \Session::flash('err_msg','データがありません');
            return redirect(route('movie'));
        }
        return view('movie.edit', ['movie' => $movies]);
    }
    //==============================================================

    /**
     * ==============================================================
     * ◆動画を更新する
     * --------------------------------------------------------------
     * @return view
     *  */
    public function exeUpdate(MovieRequest $request)
    {
        //データの受け取り
        $inputs = $request->all();
        
        \DB::beginTransaction();
        try{
            //データの更新
            $movie = Movie::find($inputs['id']);
            $movie->fill([
                'title' => $inputs['title'],
                'movie_url' => $inputs['movie_url'],
                'description' => $inputs['description'],
            ]);
            $movie->save();
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg','更新が完了したよ');
        return redirect(route('movie'));
    }
    //==============================================================

    /**
     * ==============================================================
     * ◆動画の削除
     * --------------------------------------------------------------
     * @param int $id
     * @return view
     *  */
    public function exeDelete($id)
    {
        if(empty($id)){
            \Session::flash('err_msg','データがありません');
            return redirect(route('movie'));
        }
        try{
            //データの削除
            $movie = Movie::find($id);
            $movie->genres()->detach();
            $movie->delete();
        }catch(\Throwable $e){
            abort(500);
        }
        \Session::flash('err_msg','お別れしました');
        return redirect(route('movie'));
    }
    //==============================================================

    /**
     * ==============================================================
     * ◆動画を検索する
     * --------------------------------------------------------------
     * @return view
     *  */
    public function exeCrud(Request $request)
    {
        
        $searchQuery = $request->input('keyword');
        
        // 検索クエリが空の場合は全ての動画を表示
        if (!$searchQuery) {
            $movies = Movie::query()->paginate(12);
            return view('movie.movies', ['movies' => $movies]);
        }
    
        // moviesテーブルからtitleかdescriptionに検索クエリが含まれるレコードを取得
        $movies = Movie::where('title', 'like', "%$searchQuery%")
                       ->orWhere('description', 'like', "%$searchQuery%");
    
        // genresテーブルからnameに検索クエリが含まれるレコードを取得
        $genreIds = Genre::where('name', 'like', "%$searchQuery%")
                        ->pluck('id');
    
        // 上記で取得したジャンルに関連付けられた映画を取得し、moviesクエリに結合
        $movies->orWhereHas('genres', function($query) use ($genreIds) {
            $query->whereIn('genres.id', $genreIds);
        });
    
        // ページングを実行
        $movies = $movies->paginate(12); 
        return view('movie.movies', ['movies' => $movies]);
    }
    //==============================================================


    /**
     * ==============================================================
     * ◆タグを一覧を表示する
     * --------------------------------------------------------------
     * @return view
     *  */
    public function showTags()
{
    $genres = Genre::paginate(60); // 60件ずつページングして取得
    return view('movie.tag', compact('genres'));
}
    //==============================================================
}
