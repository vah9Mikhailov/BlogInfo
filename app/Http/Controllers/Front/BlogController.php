<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post\Entity\Post;
use App\Models\Post\UseCase\Front\Command;
use App\Models\Post\UseCase\Front\Handler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = new Post();
        $posts = $posts->getAll();
        return view('front.blog',compact('posts'));
    }

    public function show($slug)
    {
        $command = new Command((string)$slug);
        $handle = new Handler();
        $post = $handle->handle($command);
        return \view('front.blog-details',compact('post'));
    }
}
