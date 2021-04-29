<?php

namespace App\Models\Tag\Entity;

use App\Models\Post\Entity\Post;
use App\Models\Tag\UseCase\Admin\Destroy\Command as DestroyCommand;
use App\Models\Tag\UseCase\Admin\Edit\Command as EditCommand;
use App\Models\Tag\UseCase\Admin\Store\Command;
use App\Models\Tag\UseCase\Admin\Update\Command as UpdateCommand;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Support\Collection
     */
    public function getAllById()
    {
        return $this->query()->pluck('name','id');
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
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
            DB::table('post_tag')->where('tag_id','=',$command->getId())->delete();
            return $tag;
        } else {
            throw new \DomainException("Тега с id = {$command->getId()} не существует");
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function getPostById($id)
    {
        $tags = DB::table('tags')
            ->select('tags.name')
            ->join('post_tag','post_tag.tag_id','=','tags.id')
            ->where('post_tag.post_id','=',"{$id}")
            ->get();
        $result = [];
        foreach ($tags as $tag) {
            $result[] = $tag->name;
        }
        return $result;
    }

}
