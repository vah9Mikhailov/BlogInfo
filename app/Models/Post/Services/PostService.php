<?php


namespace App\Models\Post\Services;


use App\Models\Category\Entity\Category;
use App\Models\Post\Entity\Post;
use App\Models\Tag\Entity\Tag;
use DateTime;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\returnArgument;

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
     * @param int $id
     * @param array $ids
     * @return array
     */
    /*private function checkIdTagsForExistingIds(int $id, array $ids)
    {
        $tags = $this->getTagsPostsFromTablePostTag($id);
        $tages = array_flip($tags);
        $ides = array_flip($ids);
        if (count($ids) >= count($tags)) {
            foreach ($ids as $key => $id) {
                if (isset($tages[$id])) {
                    unset($ids[$key]);
                }
            }
            return $ids;
        } else {
            foreach ($tags as $key => $tag) {
                if (isset($ides[$tag])) {
                    unset($tags[$key]);
                }
            }
            $endIdes = array_flip($ides);
            return $endIdes;
        }

    }*/



    /*public function updateIdTagsToPosts(int $id, array $ids)
    {
        $ides = $this->checkIdTagsForExistingIds($id, $ids);
        if ($ides) {
            foreach ($ides as $value) {
                DB::table('post_tag')
                    ->insert([
                        'post_id' => $id,
                        'tag_id' => (int)$value,
                    ]);
            }
        }
    }*/


}
