<?php


namespace App\Models\Tag\UseCase\Admin\Store;


use App\Models\Tag\Entity\Tag;

class Handler
{
    /**
     * @param Command $command
     * @return Tag
     */
    public function handle(Command $command)
    {
        $tags = new Tag();
        $tags = $tags->create($command);
        return $tags;
    }
}
