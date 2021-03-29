<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category\UseCase\Admin\Destroy\Command as DestroyCommand;
use App\Models\Category\UseCase\Admin\Destroy\Handler as DestroyHandler;
use App\Models\Category\UseCase\Admin\Edit\Command as EditCommand;
use App\Models\Category\UseCase\Admin\Edit\Handler as EditHandler;
use App\Models\Category\UseCase\Admin\Index\Handler;
use App\Models\Category\UseCase\Admin\Store\Command;
use App\Models\Category\UseCase\Admin\Store\Handler as StoreHandler;
use App\Models\Category\UseCase\Admin\Update\Command as UpdateCommand;
use App\Models\Category\UseCase\Admin\Update\Handler as UpdateHandler;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $handle = new Handler();
        $categories = $handle->handle();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:categories',
            ]);
            $command = new Command((string)$request->post('name'));
            $handle = new StoreHandler();
            $handle->handle($command);
            return redirect()->route('categories.index')->with('success', 'Категория сохранена');
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
    /* public function show($id)
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
            $command = new EditCommand($id);
            $handle = new EditHandler();
            $category = $handle->handle($command);
            return view('admin.categories.edit', compact('category'));
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
                'name' => 'required|unique:categories'
            ]);

            $command = new UpdateCommand(
                (int)$id,
                (string)$request->get('name')
            );
            $handle = new UpdateHandler();
            $handle->handle($command);
            return redirect()->route('categories.index')->with('success', 'Категория обновлена');
        } catch (\DomainException $e) {

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
            $command = new DestroyCommand($id);
            $handle = new DestroyHandler();
            $category = $handle->handle($command);
            return redirect()->back()->with('success', "Категория '{$category->name}' успешно удалена");
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
