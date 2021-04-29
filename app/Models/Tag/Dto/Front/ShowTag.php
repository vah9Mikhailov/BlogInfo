<?php


namespace App\Models\Tag\Dto\Front;


final class ShowTag

{
    /**
     * @var array
     */
    private $names;

    /**
     * ShowCategory constructor.
     * @param array $names
     */
    public function __construct(array $names)
    {
        $this->names = $names;
    }

    /**
     * @return array
     */
    public function getNames(): array
    {
        return $this->names;
    }

}

