<?php


namespace App\Models\Post\Dto;


final class Update
{
    /**
     * @var int
     */
    private $id;

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
    private $categoryIds;

    /**
     * @var array
     */
    private $tagIds;

    /**
     * @var null|object
     */
    private $thumbnail;

    /**
     * Update constructor.
     * @param int $id
     * @param string $name
     * @param string $description
     * @param int $userId
     * @param array $categoryIds
     * @param array $tagIds
     * @param object|null $thumbnail
     */
    public function __construct(
        int $id,
        string $name,
        string $description,
        int $userId,
        array $categoryIds,
        array $tagIds,
        ?object $thumbnail
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->userId = $userId;
        $this->categoryIds = $categoryIds;
        $this->tagIds = $tagIds;
        $this->thumbnail = $thumbnail;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function getCategoryIds(): array
    {
        return $this->categoryIds;
    }

    /**
     * @return array
     */
    public function getTagIds(): array
    {
        return $this->tagIds;
    }

    /**
     * @return object
     */
    public function getThumbnail(): ?object
    {
        return $this->thumbnail;
    }

}
