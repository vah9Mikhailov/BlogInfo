<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category\Entity\Category;
use App\Models\Post\Dto\Insert;
use App\Models\Post\Dto\Update;
use App\Models\Post\Entity\Post;
use App\Models\Post\UseCase\Admin\Destroy\Command as DestroyCommand;
use App\Models\Post\UseCase\Admin\Destroy\Handler as DestroyHandler;
use App\Models\Post\UseCase\Admin\Edit\Command as EditCommand;
use App\Models\Post\UseCase\Admin\Edit\Handler as EditHandler;
use App\Models\Post\UseCase\Admin\Store\Command;
use App\Models\Post\UseCase\Admin\Store\Handler as StoreHandler;
use App\Models\Post\UseCase\Admin\Update\Command as UpdateCommand;
use App\Models\Post\UseCase\Admin\Update\Handler as UpdateHandler;
use App\Models\Tag\Entity\Tag;
use App\Models\User\Entity\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;


class PostController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $post = new Post();
        $posts = $post->getAllWithPaginate();
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
        $users = $users->getNameById();
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
            return redirect()->route('posts.index')->with('success', "Пост '{$post->name}' успешно сохранён");
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {
        try {
            $command = new EditCommand((int)$id);
            $handle = new EditHandler();
            $post = $handle->handle($command);
            $tags = new Tag();
            $tags = $tags->getAllById();
            $categories = new Category();
            $categories = $categories->getAllById();
            $users = new User();
            $users = $users->getNameById();
            return view('admin.posts.edit', compact('post', 'tags', 'categories', 'users'));
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * @param PostRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(PostRequest $request, $id)
    {
        try {
            $requestCategsId = $request->input('categories');
            $requestTagsId = $request->input('tags');
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

            $command = new UpdateCommand(new Update(
                (int)$id,
                (string)$request->input('name'),
                (string)$request->input('description'),
                (int)$request->input('user_id'),
                $categories,
                $tags,
                $request->file('thumbnail')
            ));
            $handle = new UpdateHandler();
            $post = $handle->handle($command);
            return redirect()->route('posts.index')->with('success', "Пост '{$post->name}' успешно обновлён");
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        try {
            $command = new DestroyCommand((int)$id);
            $handle = new DestroyHandler();
            $post = $handle->handle($command);
            return redirect()->back()->with('success', "Пост '{$post->name}' успешно удалён");
        } catch (\DomainException $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
