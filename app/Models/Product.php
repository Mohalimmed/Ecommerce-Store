<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }


    protected static function booted()
    {
        static::addGlobalScope('store', function (Builder $builder) {
            $user = auth()->user();
            if ($user->store_id) {
                $builder->where('store_id', '=', $user->store_id);
            }
        });
    }
}
