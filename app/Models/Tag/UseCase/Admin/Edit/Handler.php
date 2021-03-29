<?php


namespace App\Models\Tag\UseCase\Admin\Edit;


use App\Models\Tag\Entity\Tag;

class Handler
{
    public function handle(Command $command)
    {
        $tag = new Tag();
        $tag = $tag->edit($command);
        return $tag;
    }
}
