<?php


namespace App\Models\Category\UseCase\Admin\Destroy;


use App\Models\Category\Entity\Category;
use Exception;

class Handler
{
    /**
     * @param Command $command
     * @return Category
     * @throws Exception
     */
    public function handle(Command $command)
    {
        $category = new Category();
        $category = $category->deleteById($command);
        return $category;
    }
}
