<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category\Entity\Category;
use App\Models\Category\Services\CategoryService;
use App\Models\Post\Entity\Post;
use App\Models\Post\UseCase\Front\Index\Handler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $post = new Post();
        $posts = $post->getLimitFive();
        return view('front.index',compact('posts'));
    }
}
