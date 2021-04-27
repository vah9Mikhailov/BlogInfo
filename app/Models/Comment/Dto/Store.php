<?php


namespace App\Models\Comment\Dto;


final class Store
{
    /**
     * @var int
     */
    private $postId;

    /**
     * @var int|null
     */
    private $parentId;

    /**
     * @var string
     */
    private $body;

    /**
     * Store constructor.
     * @param int $postId
     * @param $parentId
     * @param string $body
     */
    public function __construct(int $postId, $parentId, string $body)
    {
        $this->postId = $postId;
        $this->parentId = $parentId;
        $this->body = $body;
    }


    /**
     * @return int|null
     */
    public function getParentId(): ?int
    {
        return $this->parentId;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }


}
