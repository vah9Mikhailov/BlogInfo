<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment\Entity\Comment;
use App\Models\Post\Entity\Post;
use App\Models\Post\UseCase\Front\Show\Command;
use App\Models\Post\UseCase\Front\Show\Handler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = new Post();
        $posts = $posts->getAll();
        return view('front.blog', compact('posts'));
    }

    /**
     * @param $slug
     * @return Application|Factory|View|RedirectResponse
     */
    public function show($slug)
    {
        try {
            $command = new Command((string)$slug);
            $handle = new Handler();
            $post = $handle->handle($command);
            $posts = new Post();
            $comments = $post->getThreadedComments();
            $posts = $posts->getRandom($command);
            return view('front.blog-details', compact('post', 'posts', 'comments'));
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    public function storeComment($slug)
    {
        $attributes = ([
            'body' => request('body'),
            'parent_id' => request('parent_id', null),
        ]);
        $command = new Command((string)$slug);
        $comment = new Comment();
        $comment->addComment($attributes,$command);
        return back();
    }
}
