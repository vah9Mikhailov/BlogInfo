<?php


namespace App\Models\Post\UseCase\Admin\Index;


use App\Models\Post\Entity\Post;

class Handler
{
    public function handle()
    {
        $posts = new Post();
        $posts = $posts->getAll();
        return $posts;
    }
}
