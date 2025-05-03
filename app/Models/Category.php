<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'description',
        'image',
        'status',
    ];

    public function scopeFilter(Builder $builder, $filters)
    {

        $builder->when($filters['search'] ?? false, function ($builder, $value) {
            $builder->where('categories.name', 'like', '%' . $value . '%');
        });

        $builder->when($filters['status'] ?? false, function ($builder, $value) {
            $builder->where('categories.status', $value);
        });
    }
}
