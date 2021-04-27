<?php

namespace App\Models\Comment\Entity;

use App\Collection\CommentCollection;
use App\Models\Comment\Dto\Store;
use App\Models\Post\Entity\Post;
use App\Models\Post\UseCase\Front\Show\Command as ShowFrontCommand;
use App\Models\User\Entity\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function posts()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function newCollection(array $models = [])
    {
        return new CommentCollection($models);
    }

    /**
     * @param Store $dto
     * @return bool
     */
    public function addComment(Store $dto)
    {
        $this->body = $dto->getBody();
        $this->parent_id = $dto->getParentId();
        $this->user_id = auth()->id();
        $this->post_id = $dto->getPostId();
        return $this->save();
    }
}
