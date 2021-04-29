<?php


namespace App\Models\Post\UseCase\Front\Show;


use App\Models\Category\Dto\Front\ShowCategory;
use App\Models\Category\Entity\Category;
use App\Models\Comment\Dto\Front\ShowComment;
use App\Models\Comment\Dto\Services\CommentService;
use App\Models\Comment\Entity\Comment;
use App\Models\Post\Dto\Front\ShowPost;
use App\Models\Post\Dto\Response\ShowPost as ShowPostResponse;
use App\Models\Post\Entity\Post;
use App\Models\Post\Services\PostService;
use App\Models\Tag\Dto\Front\ShowTag;
use App\Models\Tag\Entity\Tag;
use App\Models\User\Entity\User;

class Handler
{
    /**
     * @param Command $command
     * @return ShowPostResponse
     */
    public function handle(Command $command)
    {
        $post = new Post();
        $post = $post->getBySlug($command);
        $postService = new PostService(new Post(),new Category(),new Tag(),new Comment());
        $showPost = new ShowPost(
            $post->id,
            $post->name,
            $post->description,
            $post->slug,
            $post->getFormatUpdatedAt(),
            $post->getImage(),
            $post->getThreadedComments(),
            $postService->getRandomPost($post->id),
        );
        $category = new Category();
        $showCategory = new ShowCategory($category->getByPostId($post->id));
        $tag = new Tag();
        $showTag = new ShowTag($tag->getPostById($post->id));
        $showPostResponse = new ShowPostResponse($showPost,$showCategory,$showTag);
        return $showPostResponse;
    }
}
