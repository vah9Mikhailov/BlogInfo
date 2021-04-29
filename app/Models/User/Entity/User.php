<?php

namespace App\Models\User\Entity;

use App\Models\Post\Entity\Post;
use App\Models\Role\Entity\Role;
use App\Models\User\UseCase\Admin\Destroy\Command as DestroyCommand;
use App\Models\User\UseCase\Admin\Edit\Command;
use App\Models\User\UseCase\Admin\ProfileThumbnail\Command as ProfileThumbCommand;
use App\Models\User\UseCase\Admin\Update\Command as UpdateCommand;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getNameById()
    {
        return $this->query()->pluck('name', 'id');
    }

    /**
     * @return User[]|Collection
     */
    public function getAll()
    {
        return $this->all();
    }

    /**
     * @param Command $command
     * @return User
     */
    public function edit(Command $command): User
    {
        /**
         * @var $user User
         */
        $user = $this->query()->find($command->getId());
        if (!is_null($user)) {
            return $user;
        } else {
            throw new \DomainException("Пользователя с id = {$command->getId()} не существует");
        }
    }

    /**
     * @param UpdateCommand $command
     * @return User
     */
    public function updateById(UpdateCommand $command): User
    {
        /**
         * @var $user User
         */
        $user = $this->query()->find($command->getId());
        if (!is_null($user)) {
            $user->role_id = $command->getRoleId();
            $user->update();
            return $user;
        } else {
            throw new \DomainException("Пользователя с id = {$command->getId()} не существует");
        }
    }

    /**
     * @param DestroyCommand $command
     * @return |null
     */
    public function deleteById(DestroyCommand $command)
    {
        $user = $this->query()->find($command->getId());
        if (is_null($user)) {
            $user->delete();
            return $user;
        } else {
            throw new \DomainException("Пользователя с id = {$command->getId()} не существует");
        }
    }

    /**
     * @param $thumbnail
     * @param $name
     * @param null $image
     * @return string|null
     */
    private function uploadImage($thumbnail, $name, $image = null)
    {
        if ($thumbnail) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            $uploadFolder = "images/{$folder}/users/{$name}";
            return $thumbnail->store($uploadFolder);
        } else {
            return null;
        }
    }

    /**
     * @return string
     */
    public function getImage()
    {
        if (!is_null($this->thumbnail)) {
            return asset("uploads/{$this->thumbnail}");
        }
        return asset("uploads/images/no-image.png");
    }

    /**
     * @param ProfileThumbCommand $command
     * @return User
     */
    public function updateImage(ProfileThumbCommand $command): User
    {
        /**
         * @var $user User
         */
        $user = $this->query()->find($command->getId());
        if (!is_null($user)) {
            $user->thumbnail = $this->uploadImage($command->getThumbnail(), $user->name, $user->thumbnail);
            $user->update();
            return $user;
        } else {
            throw new \DomainException("Пользователя с id = {$command->getId()} не существует");
        }
    }


}
