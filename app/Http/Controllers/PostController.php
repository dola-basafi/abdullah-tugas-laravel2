<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('dashboard', compact('posts'));
    }


    public function create()
    {
        return view('create');
    }


    public function store(StorePostRequest $request)
    {
        $post = new Post;

        $file = $request->file('file');
        $filename = $file->hashName();
        $file->move("file", $filename);
        $path = $request->getSchemeAndHttpHost() . '/file/' . $filename;

        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->file = $path;

        $post->save();
        return redirect()->route('posts.index');
    }


    public function show(Post $post)
    {
        //
    }


    public function edit(Post $post)
    {
        return view('edit', compact('post'));
    }

   
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($request->file('file')) {      
            $path = parse_url($post->file);
            unlink($path['path']);
            $file = $request->file('file');
            $filename = $file->hashName();
            $file->move('file', $filename);
            $post->file = $request->getSchemeAndHttpHost() . '/file/' . $filename;
        }
        $post->title = $request->input('title');
        $post->description = $request->input(('description'));
        $post->save();

        return redirect()->route('posts.index');
    }

  
    public function destroy(Post $post)
    {
        $path = parse_url($post->file);
        unlink(public_path() . $path['path']);
        $post->delete();        
        return redirect()->route('posts.index');
    }
}
