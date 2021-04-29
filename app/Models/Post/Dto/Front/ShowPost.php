<?php


namespace App\Models\Post\Dto\Front;


use phpDocumentor\Reflection\Types\Collection;

final class ShowPost
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
     * @var string
     */
    private $slug;

    /**
     * @var string
     */
    private $updatedAt;

    /**
     * @var string
     */
    private $image;

    /**
     * @var mixed
     */
    private $threadedComments;

    /**
     * @var array
     */
    private $recommendPosts;



    /**
     * ShowPost constructor.
     * @param int $id
     * @param string $name
     * @param string $description
     * @param string $slug
     * @param string $updatedAt
     * @param string $image
     * @param $threadedComments
     * @param array $recommendPosts
     */
    public function __construct(
        int $id,
        string $name,
        string $description,
        string $slug,
        string $updatedAt,
        string $image,
        $threadedComments,
        array $recommendPosts
    )
    {
        $this->name = $name;
        $this->description = $description;
        $this->updatedAt = $updatedAt;
        $this->image = $image;
        $this->threadedComments = $threadedComments;
        $this->recommendPosts = $recommendPosts;
        $this->id = $id;
        $this->slug = $slug;
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
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getThreadedComments()
    {
        return $this->threadedComments;
    }

    /**
     * @return array
     */
    public function getRecommendPosts(): array
    {
        return $this->recommendPosts;
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
    public function getSlug(): string
    {
        return $this->slug;
    }


}
