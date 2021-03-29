<?php


namespace App\Models\Category\UseCase\Admin\Update;


use App\Models\Category\Entity\Category;

class Handler
{
    /**
     * @param Command $command
     */
    public function handle(Command $command)
    {
        $category = new Category();
        $category->updateById($command);
    }
}