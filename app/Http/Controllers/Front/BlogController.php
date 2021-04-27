<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Comment\Dto\Store;
use App\Models\Comment\Entity\Comment;
use App\Models\Post\Entity\Post;
use App\Models\Post\UseCase\Front\Show\Command;
use App\Models\Post\UseCase\Front\Show\Handler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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



    public function storeComment(Request $request)
    {
        try {
            $request->validate([
                'body' => 'required',
            ]);

            if ($request->post('parent_id', null) == 0) {
                $parentId = null;
            } else {
                $parentId = $request->post('parent_id', null);
            }

            $comment = new Comment();
            $comment->addComment(new Store(
                $request->post('post_id'),
                $parentId,
                $request->post('body'),
            ));
            $command = new Command((string)$request->post('slug'));
            $handle = new Handler();
            $post = $handle->handle($command);
            $comments = $post->getThreadedComments();
            return view('front.comments_layouts.post-comments',compact("comments"))->render();

        } catch (\DomainException $e) {
            return back()->with('error',$e->getMessage());
        }

    }
}
