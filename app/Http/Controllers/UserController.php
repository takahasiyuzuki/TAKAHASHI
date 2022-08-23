<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function management()
    {
         $users = User::all();

        return view('articles.management', compact('users'));
    }
 /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user(Int $id)
    {
        $user = User::find($id);

        return view('articles.user', compact('user'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function profile(Int $id)
    {
        $user = User::find($id);

        return view('articles.profile', compact('user'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function renewal(Request $request, Int $id)
    {
        $users = User::find($request->id);
    
        \DB::beginTransaction();
        try {
            $users->fill($request->all())->save();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }

        return redirect()->route('management'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $user = User::find($id);

        \DB::beginTransaction();
        try {
            $user->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
        }

        return view('articles.index', compact('articles')); 
    }
}
