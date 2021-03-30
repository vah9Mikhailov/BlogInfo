<?php


namespace App\Models\Post\UseCase\Admin\Index;


use App\Models\Category\Entity\Category;
use App\Models\Post\Entity\Post;
use App\Models\Post\Services\PostService;
use App\Models\Tag\Entity\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Handler
{
    /**
     * @return LengthAwarePaginator
     */
    public function handle()
    {
        $post = new Post();
        $posts = $post->getAll();
        return $posts;
    }
}
