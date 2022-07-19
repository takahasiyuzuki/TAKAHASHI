<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
     public function __construct(){

         $this->middleware('auth');
          
     }
     
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
         $articles = Article::all();

         return view('articles.index', compact('articles')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
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
         $user = Auth::user(); //追記
         $id = Auth::id(); //追記

         $article = Article::create([
         'user_id' => $user->id,
         'title' => $request->title,
         'body' => $request->body,
         'status' => $request->status,
        ]); 

          return redirect()->route('index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id)
    {    
         $user_id = Auth::id();
         $article = Article::find($id);
         
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
          
         $article = Article::find($id);

         $article->delete();
          
         return redirect()->route('index');
    }


}
