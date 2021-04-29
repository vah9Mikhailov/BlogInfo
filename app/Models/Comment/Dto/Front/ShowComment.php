<?php


namespace App\Models\Comment\Dto\Front;


final class ShowComment
{
    /**
     * @var array
     */
    private $comments;


    /**
     * ShowComment constructor.
     * @param array $comments
     */
    public function __construct(array $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }


}
