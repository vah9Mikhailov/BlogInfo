<?php


namespace App\Models\User\UseCase\Admin\Destroy;


use App\Models\User\Entity\User;

class Handler
{
    public function handle(Command $command)
    {
        $user = new User();
        $user = $user->deleteById($command);
        return $user;
    }
}
