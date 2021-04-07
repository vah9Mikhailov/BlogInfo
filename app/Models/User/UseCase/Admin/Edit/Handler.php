<?php


namespace App\Models\User\UseCase\Admin\Edit;


use App\Models\User\Entity\User;
use App\Models\User\UseCase\Edit\Command;

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
