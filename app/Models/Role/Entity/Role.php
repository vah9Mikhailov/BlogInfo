<?php

namespace App\Models\Role\Entity;

use App\Models\User\Entity\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return Collection
     */
    public function getName()
    {
        return $this->query()->pluck('name','id');
    }
}
