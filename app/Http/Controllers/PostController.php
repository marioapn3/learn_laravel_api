<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResoure;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        //! JIKA HASIL LEBIH DARI 1 MAKA MENGGUNAKAN COLLECTION , NAMUN JIKA HASIL 1 MAKA PAKAI NEW "nm resource($data)"
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::with('writer:id,username')->findOrFail($id);
        //? kenapa ga pakai collection??
        //! Karena kalau hanya 1 array yang ditampilkan maka tidak bisa
        return new PostDetailResoure($post);
    }

    public function show2($id)
    {
        $post = Post::findOrFail($id);
        return new PostDetailResoure($post);
    }
}
