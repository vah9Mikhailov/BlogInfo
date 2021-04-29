<?php


namespace App\Models\Category\Dto\Front;


final class ShowCategory
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
