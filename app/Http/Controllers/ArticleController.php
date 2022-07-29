<?php

namespace App\Http\Controllers;

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
        $filename = $request->img_path->getClientOriginalName();
        $img_path = $request->img_path->storeAs('',$filename,'public');

        $user = Auth::user(); 
        $id = Auth::id();
       

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
        return response()->json('articles.show',['article' => $article ],['users' => $users]);
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
    
        \DB::beginTransaction();
        try {
            $article->fill($request->all())->save();
            \DB::commit();
        } catch (\Exception $e) {
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

    public function management()
    {
         $users = User::all();

         return view('articles.management', ['users' => $users]); 
    }

    public function user(Int $id)
    {
        $user = User::find($id);

        return view('articles.user', compact('user'));
        
    }
    public function useredit(Int $id)
    {
        $user = User::find($id);

        return view('articles.useredit', compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userupdate(Request $request, Int $id)
    {
        $user = User::find($request->id);
    
        \DB::beginTransaction();
        try {
            $user->fill($request->all())->save();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }

        return redirect()->route('management');
    }

    public function userdestroy($id)
    {
        $user = User::find($id);

        \DB::beginTransaction();
        try {
            $user->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }

        return redirect()->route('index');
    }

    public function test()
    {
         $articles = Article::all();

         return view('articles.test'); 
    }




}
