<?php


namespace App\Models\Post\Dto;


final class Insert
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $userId;

    /**
     * @var array
     */
    private $tagIds;

    /**
     * @var array
     */
    private $categoryIds;

    /**
     * @var object
     */
    private $thumbnail;

    /**
     * Insert constructor.
     * @param string $name
     * @param string $description
     * @param int $userId
     * @param array $tagIds
     * @param array $categoryIds
     * @param object $thumbnail
     */
    public function __construct(
        string $name,
        string $description,
        int $userId,
        array $tagIds,
        array $categoryIds,
        object $thumbnail
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->userId = $userId;
        $this->tagIds = $tagIds;
        $this->categoryIds = $categoryIds;
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    public function getTagIds(): array
    {
        return $this->tagIds;
    }

    /**
     * @return array
     */
    public function getCategoryIds(): array
    {
        return $this->categoryIds;
    }

    /**
     * @return object
     */
    public function getThumbnail(): object
    {
        return $this->thumbnail;
    }
}
