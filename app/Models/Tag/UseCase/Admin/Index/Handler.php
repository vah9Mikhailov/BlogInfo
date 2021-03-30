<?php


namespace App\Models\Tag\UseCase\Admin\Index;


use App\Models\Tag\Entity\Tag;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Handler
{
    /**
     * @return LengthAwarePaginator
     */
    public function handle()
    {
        $tags = new Tag();
        $tags = $tags->getAllWithPaginate();
        return $tags;
    }
}
