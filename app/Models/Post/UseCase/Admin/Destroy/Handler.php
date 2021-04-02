<?php


namespace App\Models\Post\UseCase\Admin\Destroy;


use App\Models\Post\Entity\Post;
use Exception;

class Handler
{
    /**
     * @param Command $command
     * @return Post
     * @throws Exception
     */
    public function handle(Command $command)
    {
        $post = new Post();
        $post = $post->deleteById($command);
        return $post;
    }
}
