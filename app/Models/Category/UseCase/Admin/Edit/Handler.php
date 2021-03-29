<?php


namespace App\Models\Category\UseCase\Admin\Edit;


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
        $category =$category->edit($command);
        return $category;
    }
}
