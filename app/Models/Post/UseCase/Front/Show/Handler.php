<?php


namespace App\Models\Post\UseCase\Front\Show;


use App\Models\Post\Entity\Post;
use App\Models\Post\UseCase\Front\Show\Command;

class Handler
{
    /**
     * @param Command $command
     * @return Post
     */
    public function handle(Command $command)
    {
        $post = new Post();
        $post = $post->getBySlug($command);
        return $post;
    }
}
