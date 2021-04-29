<?php

namespace App\Models\Category\Entity;

use App\Models\Category\UseCase\Admin\Destroy\Command as DestroyCommand;
use App\Models\Category\UseCase\Admin\Edit\Command as EditCommand;
use App\Models\Category\UseCase\Admin\Store\Command;
use App\Models\Category\UseCase\Admin\Update\Command as UpdateCommand;
use App\Models\Post\Entity\Post;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\DB;

class Category extends Model
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
        return $this->query()->pluck('name', 'id');
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
    public function create(Command $command)
    {
        $this->name = $command->getName();
        if ($this->save()) {
            return $this;
        } else {
            throw new \DomainException('Возникла ошибка при сохранении категории');
        }
    }

    /**
     * @param DestroyCommand $command
     * @return Category
     * @throws Exception
     */
    public function deleteById(DestroyCommand $command): Category
    {
        /**
         * @var $category Category
         */
        $category = $this->query()->find($command->getId());
        if (!is_null($category)) {
            $category->delete();
            DB::table('category_post')->where('category_id', '=', $command->getId())->delete();
            return $category;
        } else {
            throw new \DomainException("Категории с id = {$command->getId()} не существует");
        }
    }

    /**
     * @param EditCommand $command
     * @return Category
     */
    public function edit(EditCommand $command): Category
    {
        /**
         * @var $category Category
         */
        $category = $this->query()->find($command->getId());
        if (!is_null($category)) {
            return $category;
        } else {
            throw new \DomainException("Категории с id = {$command->getId()} не существует");
        }
    }

    /**
     * @param UpdateCommand $command
     * @return Category
     */
    public function updateById(UpdateCommand $command): Category
    {
        /**
         * @var $category Category
         */
        $category = $this->query()->find($command->getId());
        if (!is_null($category)) {
            $category->name = $command->getName();
            $category->update();
            return $category;
        } else {
            throw new \DomainException("Категории с id = {$command->getId()} не существует");
        }
    }

    /**
     * @param $id
     * @return array
     */
    public function getByPostId($id)
    {
        $categories = DB::table('categories')
            ->select('categories.name')
            ->join('category_post','category_post.category_id','=','categories.id')
            ->where('category_post.post_id','=',"{$id}")
            ->get();
        $result = [];
        foreach ($categories as $category) {
            $result[] = $category->name;
        }
        return $result;
    }


}
