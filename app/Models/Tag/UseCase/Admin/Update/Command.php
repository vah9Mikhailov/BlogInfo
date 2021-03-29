<?php


namespace App\Models\Tag\UseCase\Admin\Update;


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
     * Command constructor.
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->validate();
    }

    private function validate()
    {
        if (is_numeric($this->name)) {
            throw new \DomainException('Название категории должно быть строкой');
        }

        if ($this->id === 0){
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

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

}
