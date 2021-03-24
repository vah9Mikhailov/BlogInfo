<?php

namespace App\Models\Post\Entity;

use App\Models\Category\Entity\Category;
use App\Models\Tag\Entity\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;
    use HasFactory;

    protected $fillable = ['name', 'description','slug'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getAll()
    {
        return $this->query()->paginate(5);
    }
}
