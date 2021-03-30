<?php


namespace App\Models\Post\UseCase\Admin\Store;


use App\Models\Post\Dto\Insert;

class Command
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


    private $thumbnail;

    public function __construct(Insert $dto)
    {
        $this->validate($dto);
        $this->name = $dto->getName();
        $this->description = $dto->getDescription();
        $this->userId = $dto->getUserId();
        $this->categoryIds = $dto->getCategoryIds();
        $this->tagIds = $dto->getTagIds();
        $this->thumbnail = $dto->getThumbnail();
    }

    public function validate(Insert $dto)
    {
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


    public function getThumbnail()
    {
        return $this->thumbnail;
    }
}
