<?php

namespace App\Models\Post\Entity;

use App\Models\Category\Entity\Category;
use App\Models\Post\UseCase\Admin\Store\Command;
use App\Models\Tag\Entity\Tag;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Collection;
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

    /**
     * @return LengthAwarePaginator
     */
    public function getAll()
    {
        return $this->query()->paginate(5);
    }

    /**
     * @param $thumbnail
     * @param $name
     * @param null $image
     * @return bool|null
     */
    private function uploadImage($thumbnail, $name, $image = null)
    {
        if ($thumbnail) {
            if ($image) {
                Storage::delete($image);
            }
            $folder = date('Y-m-d');
            $uploadFolder = "public/{$folder}/{$name}";
            $thumbnail->store($uploadFolder);
            return true;
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
        $this->thumbnail = $this->uploadImage($command->getThumbnail(),$command->getName());
        if ($this->save()) {
            return $this;
        } else {
            throw new \DomainException('Ошибка при сохранении поста');
        }
    }

}
