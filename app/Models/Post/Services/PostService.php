<?php


namespace App\Models\Post\Services;


use App\Models\Category\Entity\Category;
use App\Models\Comment\Entity\Comment;
use App\Models\Post\Entity\Post;
use App\Models\Post\UseCase\Front\Show\Command as ShowFrontCommand;
use App\Models\Tag\Entity\Tag;
use Carbon\Carbon;
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
                    ->insert([
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
                    ->insert([
                        'post_id' => $post->id,
                        'tag_id' => (int)$v,
                    ]);
            }
        }
    }

    /**
     * @param int $idd
     */
    public function deleteIdTagsToPosts(int $idd)
    {
        $ids = $this->getTagsPostsFromTablePostTag($idd);
        foreach ($ids as $id) {
            DB::table('post_tag')
                ->where('tag_id','=',$id)
                ->delete();
        }
    }

    /**
     * @param int $id
     * @return array
     */
    private function getTagsPostsFromTablePostTag(int $id)
    {
        $tags = DB::table('post_tag')
            ->select('tag_id')
            ->where('post_id', '=', $id)
            ->get();
        $result = [];
        foreach ($tags as $key => $value) {
            $result[$key] = $value->tag_id;
        }
        return $result;
    }

    /**
     * @param int $idd
     */
    public function deleteIdCategoriesToPosts(int $idd)
    {
        $ids = $this->getCategoriesPostsFromTableCategoryPost($idd);
        foreach ($ids as $id) {
            DB::table('category_post')
                ->where('category_id','=',$id)
                ->delete();
        }
    }

    /**
     * @param int $id
     * @return array
     */
    private function getCategoriesPostsFromTableCategoryPost(int $id)
    {
        $categs = DB::table('category_post')
            ->select('category_id')
            ->where('post_id', '=', $id)
            ->get();
        $result = [];
        foreach ($categs as $key => $value) {
            $result[$key] = $value->category_id;
        }
        return $result;
    }

    public function getPostsCategories()
    {
        $categories = $this->post->categories()->get();
    }


    /**
     * @param $id
     * @return array
     */
    public function getRandomPost($id)
    {
        $posts = DB::table('posts')
            ->select('id','name','updated_at','thumbnail')
            ->where('id','!=',$id)
            ->inRandomOrder()
            ->limit(3)
            ->get();
        $result = [];
        foreach ($posts as $post) {
            $result[] = [
                'categoryIds' => $this->category->getByPostId($post->id),
                'name' => $post->name,
                'updated_at' => Carbon::createFromFormat('Y-m-d H:i:s',$post->updated_at)->format('F d, Y'),
                'thumbnail' => asset("uploads/{$post->thumbnail}")
            ];
        }
        return $result;
    }


}
