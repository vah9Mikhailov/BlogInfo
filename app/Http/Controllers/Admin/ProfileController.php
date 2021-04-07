<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Models\User\UseCase\Admin\ProfileThumbnail\Command as ProfileThumbCommand;
use App\Models\User\UseCase\Admin\ProfileThumbnail\Handler;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function edit()
    {
        return view('admin.users.profile.edit');
    }

    /**
     * @param ProfileRequest $request
     * @return mixed
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * @param PasswordRequest $request
     * @return mixed
     */
    public function password(PasswordRequest $request)
    {

        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function thumbnail(Request $request)
    {
        try {
            $request->validate([
                'thumbnail' => 'image'
            ]);
            $command = new ProfileThumbCommand(
                (int)auth()->user()->id,
                $request->file('thumbnail')
            );
            $handle = new Handler();
            $handle->handle($command);
            return redirect()->back()->with('success','Фото успешно обновлено');
        } catch (\DomainException $e) {
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
