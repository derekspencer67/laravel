<?php

namespace App\Http\Controllers;

use App\Post;
use App\Role;
use App\Theme;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function index()
    {
        $posts = DB::table('posts')->orderBy('posts.created_at', 'desc')
            ->join('users','users.id','=','posts.created_by')
            ->select('posts.*','users.name','users.email','users.password')
            ->where('posts.deleted_at','=', null)->get();

        //dd(Auth::user()->roles->first());

        $modId = Role::all()->where('name', '=', 'Moderator')->first()->id;

        if(Auth::check() && Auth::user()->roles->first() !== null){
            $userRoles = Auth::user()->roles;
        }else{
            $userRoles = [];
        }


        //dd($posts);
        return view('home', compact( 'posts', 'userRoles', 'modId'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'created_by' => 'required',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        //dd($data);

        Post::create($request->all());

        $request->session()->flash('status', 'Post Created.');

        return redirect('/');
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {


        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'created_by' => 'required',
            'updated_at' => now()
        ]);
        //dd($data);

        $post->update($request->all());

        $request->session()->flash('status', 'Post Updated.');

        return redirect('/');
    }

    public function destroy(Request $request, Post $post)
    {
        //dd($post);
        $post->delete();

        DB::table('posts')->where('id','=',$post->id)->update([
           'deleted_by' => Auth::id()
        ]);

        $request->session()->flash('deny', 'Post Deleted.');

        return redirect('/');
    }

}
