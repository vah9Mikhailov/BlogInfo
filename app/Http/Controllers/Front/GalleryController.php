<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category\Entity\Category;
use App\Models\Post\Entity\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class GalleryController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $post = new Post();
        $posts = $post->getAll();

        $category = new Category();
        $categories = $category->getAllById();
        return view('front.gallery',compact('posts','categories'));
    }
}
