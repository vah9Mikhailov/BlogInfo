<?php


namespace App\Models\Post\UseCase\Admin\Edit;


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
        $post = $post->edit($command);
        return $post;
    }
}
