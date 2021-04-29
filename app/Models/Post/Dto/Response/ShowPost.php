<?php


namespace App\Models\Post\Dto\Response;

use App\Models\Category\Dto\Front\ShowCategory;
use App\Models\Comment\Dto\Front\ShowComment;
use App\Models\Post\Dto\Front\ShowPost as FrontShowPost;
use App\Models\Tag\Dto\Front\ShowTag;

final class ShowPost
{
    /**
     * @var object
     */
    private $post;

    /**
     * @var object
     */
    private $tag;

    /**
     * @var object
     */
    private $category;

    /**
     * @var object
     */
    private $comment;

    /**
     * ShowPost constructor.
     * @param FrontShowPost $post
     * @param ShowCategory $category
     * @param ShowTag $tag
     */
    public function __construct(FrontShowPost $post, ShowCategory $category, ShowTag $tag)
    {
        $this->post = $post;
        $this->category = $category;
        $this->tag = $tag;
    }

    /**
     * @return object
     */
    public function getPost(): object
    {
        return $this->post;
    }

    /**
     * @return object
     */
    public function getTag(): object
    {
        return $this->tag;
    }

    /**
     * @return object
     */
    public function getCategory(): object
    {
        return $this->category;
    }

    /**
     * @return object
     */
    public function getComment(): object
    {
        return $this->comment;
    }

}
