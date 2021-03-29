<?php


namespace App\Models\Category\UseCase\Admin\Index;


use App\Models\Category\Entity\Category;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class Handler
{
    /**
     * @return LengthAwarePaginator
     */
    public function handle()
    {
        $category = new Category();
        $category = $category->getAll();
        return $category;
    }
}
