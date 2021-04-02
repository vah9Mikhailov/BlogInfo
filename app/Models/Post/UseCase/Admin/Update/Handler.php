<?php


namespace App\Models\Post\UseCase\Admin\Update;


use App\Models\Category\Entity\Category;
use App\Models\Post\Entity\Post;
use App\Models\Post\Services\PostService;
use App\Models\Tag\Entity\Tag;

class Handler
{
    /**
     * @param Command $command
     * @return Post
     */
    public function handle(Command $command)
    {
        $post = new Post();
        $post = $post->updateById($command);
        $postService = new PostService(new Post(),new Category(),new Tag());
        $postService->deleteIdTagsToPosts($command->getId());
        $postService->addTagsToPost($post,$command->getTagIds());
        $postService->deleteIdCategoriesToPosts($command->getId());
        $postService->addCategoriesToPost($post,$command->getCategoryIds());
        return $post;
    }
}
