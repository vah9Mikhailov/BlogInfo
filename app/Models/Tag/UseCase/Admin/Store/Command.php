<?php


namespace App\Models\Tag\UseCase\Admin\Store;


class Command
{
    /**
     * @var string
     */
    private $name;

    /**
     * Command constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
        $this->validate();
    }

    private function validate()
    {
        if (is_numeric($this->name)) {
            throw new \DomainException('Поле name должно быть строкой');
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
