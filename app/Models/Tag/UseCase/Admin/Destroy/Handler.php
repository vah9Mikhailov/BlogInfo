<?php


namespace App\Models\Tag\UseCase\Admin\Destroy;


use App\Models\Tag\Entity\Tag;

class Handler
{
    /**
     * @return Tag
     * @throws \Exception
     */
    public function handle(Command $command)
    {
        $tag = new Tag();
        $tag = $tag->deleteById($command);
        return $tag;
    }
}
