<?php


namespace App\Collection;



use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CommentCollection extends Collection
{
    /**
     * @return Builder[]|Collection
     */
    public function threaded()
    {
        $comment = parent::groupBy('parent_id');


        if (count($comment)) {
            $comment['root'] = $comment[''];
            unset($comment['']);
        }
        else
        {
            $comment['root'] = new static();
        }

        return $comment;
    }
}
