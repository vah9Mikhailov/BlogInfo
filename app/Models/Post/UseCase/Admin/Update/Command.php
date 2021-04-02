<?php


namespace App\Models\Post\UseCase\Admin\Update;


use App\Models\Post\Dto\Update;

class Command
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
    private $tagIds;

    /**
     * @var array
     */
    private $categoryIds;

    /**
     * @var null|object
     */
    private $thumbnail;

    public function __construct(Update $dto)
    {
        $this->validate($dto);
        $this->id = $dto->getId();
        $this->name = $dto->getName();
        $this->description = $dto->getDescription();
        $this->userId = $dto->getUserId();
        $this->categoryIds = $dto->getCategoryIds();
        $this->tagIds = $dto->getTagIds();
        $this->thumbnail = $dto->getThumbnail();
    }

    public function validate(Update $dto)
    {
        if ($dto->getId() === 0) {
            throw new \DomainException("Некорректный id");
        }
        if (is_numeric($dto->getName())) {
            throw new \DomainException("Поле name должно быть строкой");
        }

        if (is_numeric($dto->getDescription())) {
            throw new \DomainException("Поле description должно быть строкой");
        }
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
     * @return null|object
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
