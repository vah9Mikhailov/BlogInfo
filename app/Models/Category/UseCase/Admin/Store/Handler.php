<?php


namespace App\Models\Category\UseCase\Admin\Store;


use App\Models\Category\Entity\Category;

class Handler
{
    /**
     * @param Command $command
     * @return Category
     */
    public function handle(Command $command)
    {
        $category = new Category();
        $category = $category->create($command);
        return $category;
    }
}
