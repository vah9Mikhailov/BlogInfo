<?php


namespace App\Models\Post\UseCase\Front;


use App\Models\Post\Entity\Post;

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
