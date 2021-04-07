<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role\Entity\Role;
use App\Models\User\UseCase\Admin\Destroy\Command as DestroyCommand;
use App\Models\User\UseCase\Admin\Destroy\Handler as DestroyHandler;
use App\Models\User\UseCase\Admin\Edit\Command;
use App\Models\User\UseCase\Admin\Edit\Handler as EditHandler;
use App\Models\User\UseCase\Admin\Index\Handler;
use App\Models\User\UseCase\Admin\Update\Command as UpdateCommand;
use App\Models\User\UseCase\Admin\Update\Handler as UpdateHandler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $handle = new Handler();
        $users = $handle->handle();
        return view('admin.users.index', compact('users'));
    }

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {
        try {
            $command = new Command((int)$id);
            $handle = new EditHandler();
            $user = $handle->handle($command);
            $roles = new Role();
            $roles = $roles->getName();
            return view('admin.users.edit', compact('user', 'roles'));
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
            $command = new UpdateCommand(
                (int)$id,
                (int)$request->input('role_id')
            );
            $handle = new UpdateHandler();
            $user = $handle->handle($command);
            return redirect()->route('users.index')->with('success',"Роль пользователя {$user->name} успешно изменена");
        } catch (\DomainException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $command = new DestroyCommand((int)$id);
            $handle = new DestroyHandler();
            $user = $handle->handle($command);
            return redirect()->back()->with('success',"Пользователь '{$user->name}' успешно удалён");
        } catch (\DomainException $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
