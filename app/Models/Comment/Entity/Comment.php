<?php

namespace App\Models\Comment\Entity;

use App\Collection\CommentCollection;
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
        return $this->belongsTo(Post::class,'post_id');
    }

    public function newCollection(array $models = [])
    {
        return new CommentCollection($models);
    }

    /**
     * @param $attributes
     * @param ShowFrontCommand $command
     * @return bool
     */
    public function addComment($attributes,ShowFrontCommand $command)
    {
        $post = Post::query()->where('slug', '=', $command->getSlug())->first();
        $comment = (new Comment)->forceFill($attributes);
        $comment->user_id = auth()->id();
        $comment->post_id = $post->id;

        return $comment->save();
    }
}
