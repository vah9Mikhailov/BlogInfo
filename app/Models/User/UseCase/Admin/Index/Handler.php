<?php


namespace App\Models\User\UseCase\Admin\Index;


use App\Models\User\Entity\User;

class Handler
{
    public function handle()
    {
        $user = new User();
        $user = $user->getAll();
        return $user;
    }
}
