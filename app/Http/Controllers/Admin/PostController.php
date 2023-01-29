<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    private $checkValidation = [
        'slug' => 'required|string|max:100',
        'title' => 'required|string|max:100',
        'file_path' => 'image|max:2048',
        'image' => 'string|max:100',
        'content' => 'string',
        'excerpt' => 'string'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(10);

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->checkValidation);
        $data = $request->all();

        $fileImg = Storage::put('uploads', $data['file_path']);

        $post = new Post();
        $post->slug = $data['slug'];
        $post->title = $data['title'];
        $post->file_path = $fileImg;
        $post->image = $data['image'];
        $post->content = $data['content'];
        $post->excerpt = $data['excerpt'];
        $post->save();

        return redirect()->route('admin.posts.show', ['post' => $post])->with('success_created', $post);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->checkValidation);
        $data = $request->all();

        $fileImg = Storage::put('uploads', $data['file_path']);
        Storage::delete($post->file_path);

        $post->slug = $data['slug'];
        $post->title = $data['title'];
        $post->file_path = $fileImg;
        $post->image = $data['image'];
        $post->content = $data['content'];
        $post->excerpt = $data['excerpt'];
        $post->update();

        return redirect()->route('admin.posts.show', ['post' => $post])->with('success_updated', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success_deleted', $post);
    }
}
