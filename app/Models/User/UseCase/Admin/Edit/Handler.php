<?php


namespace App\Models\User\UseCase\Admin\Edit;


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
        $user = $user->edit($command);
        return $user;
    }
}
