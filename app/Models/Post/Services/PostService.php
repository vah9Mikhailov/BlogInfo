<?php


namespace App\Models\Post\Services;


use App\Models\Category\Entity\Category;
use App\Models\Post\Entity\Post;
use App\Models\Tag\Entity\Tag;
use DateTime;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PostService
{
    /**
     * @var Post
     */
    private $post;

    /**
     * @var Category
     */
    private $category;

    /**
     * @var Tag
     */
    private $tag;

    /**
     * PostService constructor.
     * @param Post $post
     * @param Category $category
     * @param Tag $tag
     */
    public function __construct(Post $post, Category $category, Tag $tag)
    {
        $this->post = $post;
        $this->category = $category;
        $this->tag = $tag;
    }

    /**
     * @param Post $post
     * @param array $categories
     */
    public function addCategoriesToPost(Post $post, array $categories)
    {
        if (!is_null($categories)) {
            foreach ($categories as $v) {
                DB::table('category_post')
                    ->updateOrInsert([
                        'post_id' => $post->id,
                        'category_id' => (int)$v,
                    ]);
            }
        }
    }

    /**
     * @param Post $post
     * @param array $tags
     */
    public function addTagsToPost(Post $post, array $tags)
    {
        if (!is_null($tags)) {
            foreach ($tags as $v) {
                DB::table('post_tag')
                    ->updateOrInsert([
                        'post_id' => $post->id,
                        'tag_id' => (int)$v,
                    ]);
            }
        }
    }



}
