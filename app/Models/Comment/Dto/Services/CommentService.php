<?php


namespace App\Models\Comment\Dto\Services;


use App\Models\Comment\Entity\Comment;
use App\Models\User\Entity\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CommentService
{
    /**
     * @var Comment
     */
    private $comment;

    /**
     * @var User
     */
    private $user;

    /**
     * CommentService constructor.
     * @param Comment $comment
     * @param User $user
     */
    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    /**
     * @param $id
     * @return array
     */
    public function getByPostId($id)
    {
        $comments = DB::table('comments')
            ->select('id','body','created_at')
            ->where('post_id','=',"{$id}")
            ->get();
        $result = [];
        foreach ($comments as $comment) {
            $result[] = [
                'id' => $comment->id,
                'body' => $comment->body,
                'created_at' => Carbon::createFromFormat('Y-m-d H:i:s',$comment->created_at)->format('F d, Y'),
                'image' => $this->user->getNameAndImageByCommentId($comment->id)->image,
                'nameUser' => $this->user->getNameAndImageByCommentId($comment->id)->image,
            ];
        }
        return $result;
    }

}
