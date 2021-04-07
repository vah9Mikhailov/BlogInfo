<?php


namespace App\Models\User\UseCase\Admin\Update;


use App\Models\User\Entity\User;
use App\Models\User\UseCase\Update\Command;

class Handler
{
    /**
     * @param Command $command
     * @return User
     */
    public function handle(Command $command)
    {
        $user = new User();
        $user = $user->updateById($command);
        return $user;
    }
}
