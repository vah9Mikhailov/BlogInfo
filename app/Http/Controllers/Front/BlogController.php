<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post\Entity\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $posts = new Post();
        $posts = $posts->getAll();
        return view('front.blog',compact('posts'));
    }
}
