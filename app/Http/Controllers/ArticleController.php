<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // すべての記事を取得
         $articles = Article::all();

         // 記事一覧を表示
         return view('articles.index', compact('articles')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         // 投稿画面表示
         return view('articles.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // 投稿内容保存処理
         $article = Article::create([
         'title' => $request->title,
         'body' => $request->body,
         'status' => $request->status,
        ]); 

          return redirect()->route('articles.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id)
    {
        // ビューから渡されたIDの記事を取得
        $article = Article::find($id);

        // 記事詳細画面を表示
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Int $id)
    {
    // ビューから渡されたIDの記事を取得
    $article = Article::find($id);

    // 記事編集画面を表示
    return view('articles.edit', compact('article'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Int $id)
    {
    // 選択された記事データを取得
    $article = Article::find($id);

    // 編集処理実行
    $article->fill($request->all())->save();

    // 記事一覧画面へ
    return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          // 選択された記事データを取得
          $article = Article::find($id);

          // 削除処理実行
          $article->delete();

          // 記事一覧画面へ
          return redirect()->route('index');
    }

    public function test()
    {
         // 投稿画面表示
         return view('articles.test'); 
    }



}
