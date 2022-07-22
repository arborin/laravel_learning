<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){

        $categories = Category::orderBy('title')->get();

        $posts = Post::paginate(1);
        return view('pages.index', [
            'posts' => $posts
        ]);
    }


    public function getPostByCategory($slug){

        $current_category= Category::where('slug', $slug)->first();

        // dd($current_category->posts());

        return view('pages.index', [
            'posts' => $current_category->posts()->paginate(1)
        ]);
    }

    public function getPost($slug_category, $slug_post){
        $post = Post::where('slug', $slug_post)->first();

        return view('pages.show-post', [
            'post' => $post
        ]);
    }
}
