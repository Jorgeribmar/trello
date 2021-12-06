<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->orderBy('title') // trié par ordre alphabétique
            ->get();
        //dd($posts);

        return view('posts.index')
            ->with([
                'posts' => $posts
            ]);
        //return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // $post = $request->validate([...]);
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'follower' => 'required'
        ]);

        $post = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => $request->input('author'),
            'follower' => $request->input('follower')
        ];
        //dd($post);

        Post::create($post);

        //return view('posts.index'); => ne pas faire, il faut utiliser une redirection
        return redirect()->route('posts.index');
    }

    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->author = $request->input('author');
        $post->follower = $request->input('follower');
        $post->save();

        return redirect()->route('posts.show', $id);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index');
    }
}
