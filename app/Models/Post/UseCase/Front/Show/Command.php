<?php


namespace App\Models\Post\UseCase\Front\Show;


class Command
{
    /**
     * @var string
     */
    private $slug;

    /**
     * Handle constructor.
     * @param string $slug
     */
    public function __construct(string $slug)
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }
}
