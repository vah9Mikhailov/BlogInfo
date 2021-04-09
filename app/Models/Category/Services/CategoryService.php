<?php


namespace App\Models\Category\Services;


use App\Models\Category\Entity\Category;
use App\Models\Post\Entity\Post;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    /**
     * @var Category
     */
    private $category;

    /**
     * @var Post
     */
    private $post;

    /**
     * CategoryService constructor.
     * @param Category $category
     * @param Post $post
     */
    public function __construct(Category $category, Post $post)
    {
        $this->category = $category;
        $this->post = $post;
    }

}
