<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category\Entity\Category;
use App\Models\Post\Dto\Insert;
use App\Models\Post\Entity\Post;
use App\Models\Post\Services\PostService;
use App\Models\Post\UseCase\Admin\Index\Handler;
use App\Models\Post\UseCase\Admin\Store\Command;
use App\Models\Post\UseCase\Admin\Store\Handler as StoreHandler;
use App\Models\Tag\Entity\Tag;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $post = new Post();
        $posts = $post->getAll();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $tags = new Tag();
        $tags = $tags->getAllById();
        $categories = new Category();
        $categories = $categories->getAllById();
        $users = new User();
        $users = $users->getAllById();
        return view('admin.posts.create', compact('tags', 'categories', 'users'));
    }

    /**
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request)
    {
        try {

            $requestCategsId = $request->post('categories');
            $requestTagsId = $request->post('tags');
            $categories = [];
            $tags = [];

            if (is_array($requestCategsId)) {
                $categories = $requestCategsId;
            } else {
                $categories[] = $requestCategsId;
            }

            if (is_array($requestTagsId)) {
                $tags = $requestTagsId;
            } else {
                $tags[] = $requestTagsId;
            }

            $command = new Command(
                new Insert(
                    (string)$request->post('name'),
                    (string)$request->post('description'),
                    (int)$request->post('user_id'),
                    $tags,
                    $categories,
                    $request->file('thumbnail'),
                )
            );
            $handle = new StoreHandler();
            $post = $handle->handle($command);
            return redirect()->route('admin.posts.index')->with('success',"Пост '{$post->name}' успешно сохранён");
        } catch (\DomainException $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
