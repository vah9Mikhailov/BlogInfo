<?php

namespace App\Models\Post\Entity;

use App\Models\Category\Entity\Category;
use App\Models\Comment\Entity\Comment;
use App\Models\Post\UseCase\Admin\Destroy\Command as DestroyCommand;
use App\Models\Post\UseCase\Admin\Edit\Command as EditCommand;
use App\Models\Post\UseCase\Admin\Store\Command;
use App\Models\Post\UseCase\Admin\Update\Command as UpdateCommand;
use App\Models\Post\UseCase\Front\Show\Command as ShowFrontCommand;
use App\Models\Tag\Entity\Tag;
use App\Models\User\Entity\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = ['name', 'description', 'slug'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('commentCount', function ($builder) {
            $builder->withCount('comments');
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function getThreadedComments()
    {
        return $this->comments()->with('owner')->get()->threaded();
    }



    /**
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        return $this->query()->paginate(5);
    }

    /**
     * @param $thumbnail
     * @param $slug
     * @param null $image
     * @return string|null
     */
    private function uploadImage($thumbnail, $image = null)
    {
        if ($thumbnail) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            $uploadFolder = "images/{$folder}";
            return $thumbnail->store($uploadFolder);
        } else {
            return null;
        }
    }

    /**
     * @param Command $command
     * @return $this
     */
    public function create(Command $command)
    {
        $this->name = $command->getName();
        $this->description = $command->getDescription();
        $this->user_id = $command->getUserId();
        $this->thumbnail = $this->uploadImage($command->getThumbnail());
        if ($this->save()) {
            return $this;
        } else {
            throw new \DomainException('Ошибка при сохранении поста');
        }
    }

    /**
     * @param EditCommand $command
     * @return Post
     */
    public function edit(EditCommand $command): Post
    {
        /**
         * @var $post Post
         */
        $post = $this->query()->find($command->getId());
        if (!is_null($post)) {
            return $post;
        } else {
            throw new \DomainException("Поста с id = {$command->getId()} не существует");
        }
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return asset("uploads/{$this->thumbnail}");
    }

    /**
     * @param $image
     * @return |null
     */
    private function deleteImage($image)
    {
        if ($image) {
            Storage::delete($image);
        }
        return null;
    }

    /**
     * @param UpdateCommand $command
     * @return Post
     */
    public function updateById(UpdateCommand $command): Post
    {
        /**
         * @var $post Post
         */
        $post = $this->query()->find($command->getId());
        if (!is_null($post)) {
            $post->name = $command->getName();
            $post->description = $command->getDescription();
            $post->user_id = $command->getUserId();
            $post->thumbnail = $this->uploadImage($command->getThumbnail(), $post->thumbnail);
            $post->update();
            return $post;
        } else {
            throw new \DomainException("Поста с id = {$command->getId()} не существует");
        }
    }

    /**
     * @param DestroyCommand $command
     * @return Post
     * @throws Exception
     */
    public function deleteById(DestroyCommand $command): Post
    {
        /**
         * @var $post Post
         */
        $post = $this->query()->find($command->getId());
        if (!is_null($post)) {
            $post->deleteImage($post->thumbnail);
            $post->delete();
            DB::table('category_post')->where('post_id', '=', $command->getId())->delete();
            DB::table('post_tag')->where('post_id', '=', $command->getId())->delete();
            return $post;
        } else {
            throw new \DomainException("Поста с id = {$command->getId()} не существует");
        }
    }

    /**
     * @return Builder[]|Collection
     */
    public function getLimitFive()
    {
        return $this->query()->orderBy('id', 'desc')->limit(5)->get();
    }

    /**
     * @return Post[]|Collection
     */
    public function getAll()
    {
        return $this->all();
    }

    /**
     * @param ShowFrontCommand $command
     * @return Post
     */
    public function getBySlug(ShowFrontCommand $command): Post
    {
        /**
         * @var $post Post
         */
        $post = $this->query()->where('slug', '=', $command->getSlug())->first();
        if (!is_null($post)) {
            return $post;
        } else {
            throw new \DomainException("Поста со slug = '{$command->getSlug()}' не существует");
        }
    }


    /**
     * @return mixed
     */
    public function getFormatUpdatedAt()
    {
        return $this->updated_at->format('F d, Y');
    }
}
