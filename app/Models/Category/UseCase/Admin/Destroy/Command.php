<?php


namespace App\Models\Category\UseCase\Admin\Destroy;


class Command
{
    /**
     * @var int
     */
    private $id;

    /**
     * Command constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        if ($this->id !== 0) {
            $this->id = $id;
        } else {
            throw new \DomainException('Некорректный id');
        }
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}
