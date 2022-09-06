<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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

    public function top()
    {
         $articles = Article::all();

         return view('articles.top', compact('articles')); 
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

        $user = Auth::user(); 
        $id = Auth::id();

        // $filename = $request->img_path->getClientOriginalName();
        // $img_path = $request->img_path->storeAs('',$filename,'public');

        if ($request->hasFile('img_path')) {
           $filename = $request->img_path->getClientOriginalName();
           $img_path = $request->img_path->storeAs('',$filename,'public');
        }else {
            $img_path = null;
        }

        \DB::beginTransaction();
        try {
            $article = Article::create([
                'user_id' => $user->id,
                'title' => $request->title,
                'body' => $request->body,
                'img_path' => $img_path,
                'status' => $request->status,
            ]); 
        \DB::commit();

        } catch(\Throwable $e) {
            \DB::rollback();
            dd($e);

        }

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
        $article = Article::find($id);

        $articles = \DB::table('users')
        ->join('articles', 'users.name', '=', 'articles.user_id')
        ->get();

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
        $article = Article::find($request->id);

        try {
         $img_path = $request->file('img_path');
         $path = $article->img_path;
         if (isset($img_path)) {
             \Storage::disk('public')->delete($path);
             $path = $img_path->store('articles', 'public');
         }

         $article->update([
             'title' => $request->title,
             'body' => $request->body,
             'status' => $request->status,
             'img_path' => $path,
            ]);}catch (\Exception $e) {
            \DB::rollback();
        }

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

        \DB::beginTransaction();
        try {
            $article->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }

        return redirect()->route('index');
    }
}
