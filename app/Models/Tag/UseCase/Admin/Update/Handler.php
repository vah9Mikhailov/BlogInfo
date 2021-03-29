<?php


namespace App\Models\Tag\UseCase\Admin\Update;


use App\Models\Tag\Entity\Tag;

class Handler
{
    /**
     * @param Command $command
     * @return Tag
     */
    public function handle(Command $command)
    {
        $tag = new Tag();
        $tag = $tag->updateById($command);
        return $tag;
    }
}
