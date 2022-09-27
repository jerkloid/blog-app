<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function index()
    {
        if (!Auth::check()) {
            return view('auth.login');
        }

        $tags = Tag::all();
        $posts = Post::with('tags')->get();
        //dd($posts);

        $categories = Category::all();
        return view('blog.new', ['posts' => $posts, 'tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|max:20|min:3',
            //'tags' => 'required',
            'content' => 'required',
            'img_url' => 'required|image|max:2048',

        ]);

        $img_url = $request->file('img_url')->store('public');
        //dd($request->all());


        $post = Post::create([
            'slug' => $request->slug,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'img_url' => Storage::url($img_url),



        ]);

        $tags = $request->tag;
        //dd($tags);
        foreach ($tags as $t) {
            //dd($t);
            $post->tags()->attach($t);
        }



        return redirect()->route('posts.index')->with('success', 'post creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {



        $posts = Post::with('tags')->where('id', $id)->get();

        foreach ($posts as $post) {
            $users = User::find($post->user_id);
            $categories = Category::find($post->category_id);


        }

       // dd($categories);
        return view('blog.show', compact('posts', 'categories', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->status = 1;

        $post->save();
        return redirect()->back();
        //return redirect()->route('posts.show', $id)->with('success', 'post activado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->status = 0;

        $post->save();

        return redirect()->back();
        //return redirect()->route('posts.show', $id)->with('success', 'post desactivado.');
    }
    public function list()
    {
        if (!Auth::check()) {
            return view('auth.login');
        }

        $tags = Tag::all();
        $posts = Post::with('tags')->get();
        //dd($posts);

        $categories = Category::all();
        return view('blog.list', ['posts' => $posts, 'tags' => $tags, 'categories' => $categories]);
    }
}
