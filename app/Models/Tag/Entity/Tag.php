<?php

namespace App\Models\Tag\Entity;

use App\Models\Post\Entity\Post;
use App\Models\Tag\UseCase\Admin\Destroy\Command as DestroyCommand;
use App\Models\Tag\UseCase\Admin\Edit\Command as EditCommand;
use App\Models\Tag\UseCase\Admin\Store\Command;
use App\Models\Tag\UseCase\Admin\Update\Command as UpdateCommand;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use Sluggable;
    use HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class);
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
     * @param Command $command
     * @return $this
     */
    public function create(Command $command): Tag
    {
        $this->name = $command->getName();
        if ($this->save()) {
            return $this;
        } else {
            throw new \DomainException('Возникла ошибка при сохранении тега');
        }
    }

    /**
     * @param EditCommand $command
     * @return Tag
     */
    public function edit(EditCommand $command): Tag
    {
        /**
         * @var $tag Tag
         */
        $tag = $this->query()->find($command->getId());
        if (!is_null($tag)) {
            return $tag;
        } else {
            throw new \DomainException("Тега с id = {$command->getId()} не существует");
        }
    }

    /**
     * @param UpdateCommand $command
     * @return Tag
     */
    public function updateById(UpdateCommand $command): Tag
    {
        /**
         * @var $tag Tag
         */
        $tag = $this->query()->find($command->getId());
        if (!is_null($tag)) {
            $tag->name = $command->getName();
            $tag->update();
            return $tag;
        } else {
            throw new \DomainException("Тега с id = {$command->getId()} не существует");
        }
    }

    /**
     * @param DestroyCommand $command
     * @return Tag
     * @throws \Exception
     */
    public function deleteById(DestroyCommand $command): Tag
    {
        /**
         * @var $tag Tag
         */
        $tag = $this->query()->find($command->getId());
        if (!is_null($tag)) {
            $tag->delete();
            return $tag;
        } else {
            throw new \DomainException("Тега с id = {$command->getId()} не существует");
        }
    }
}
