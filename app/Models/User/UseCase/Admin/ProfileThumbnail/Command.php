<?php


namespace App\Models\User\UseCase\Admin\ProfileThumbnail;


class Command
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var null|object
     */
    private $thumbnail;

    /**
     * Command constructor.
     * @param int $id
     * @param $thumbnail
     */
    public function __construct(int $id,$thumbnail)
    {
        $this->thumbnail = $thumbnail;
        $this->id = $id;
    }

    /**
     * @return object|null
     */
    public function getThumbnail(): ?object
    {
        return $this->thumbnail;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
