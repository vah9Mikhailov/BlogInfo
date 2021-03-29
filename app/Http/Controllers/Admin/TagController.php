<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag\UseCase\Admin\Destroy\Command as DestroyCommand;
use App\Models\Tag\UseCase\Admin\Destroy\Handler as DestroyHandler;
use App\Models\Tag\UseCase\Admin\Edit\Command as EditCommand;
use App\Models\Tag\UseCase\Admin\Edit\Handler as EditHandler;
use App\Models\Tag\UseCase\Admin\Index\Handler;
use App\Models\Tag\UseCase\Admin\Store\Command;
use App\Models\Tag\UseCase\Admin\Store\Handler as StoreHandler;
use App\Models\Tag\UseCase\Admin\Update\Command as UpdateCommand;
use App\Models\Tag\UseCase\Admin\Update\Handler as UpdateHandler;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $handle = new Handler();
        $tags = $handle->handle();
        $count = count($tags);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:tags'
            ]);
            $command = new Command((string)$request->post('name'));
            $handle = new StoreHandler();
            $tag = $handle->handle($command);
            return redirect()->route('tags.index')->with('success', "Тег '{$tag->name}' успешно сохранён");
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    /*public function show($id)
    {
        //
    }*/

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {
        try {
            $command = new EditCommand((int)$id);
            $handle = new EditHandler();
            $tag = $handle->handle($command);
            return \view('admin.tags.edit', compact('tag'));
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|unique:tags'
            ]);
            $command = new UpdateCommand(
                (int)$id,
                (string)$request->get('name')
            );
            $handle = new UpdateHandler();
            $tag = $handle->handle($command);
            return redirect()->route('tags.index')->with('success', "Тег '{$tag->name}' успешно обновлён");
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
            $tag = $handle->handle($command);
            return redirect()->back()->with('success', "Тег '{$tag->name}' успешно удалён");
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
