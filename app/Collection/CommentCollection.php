<?php


namespace App\Collection;


use App\Models\Comment\Entity\Comment;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CommentCollection extends Collection
{
    /**
     * @return Builder[]|Collection
     */
    public function threaded()
    {
        $comments = parent::groupBy('parent_id');

        if (count($comments)) {
            $comments['root'] = $comments[''];
            unset($comments['']);
        }
        else
        {
            $comments['root'] = new static();
        }
        return $comments;
    }
}
