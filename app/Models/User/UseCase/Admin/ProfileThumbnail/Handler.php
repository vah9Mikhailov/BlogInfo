<?php


namespace App\Models\User\UseCase\Admin\ProfileThumbnail;


use App\Models\User\Entity\User;

class Handler
{
    /**
     * @param Command $command
     * @return User
     */
    public function handle(Command $command)
    {
        $user = new User();
        $user = $user->updateImage($command);
        return $user;
    }
}
