<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'price',
        'compare_price',
        'options',
        'rating',
        'featured',
        'category_id',
        'store_id',
        'status',
    ];

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
            if ($user && $user->store_id) {
                $builder->where('store_id', '=', $user->store_id);
            }
        });
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'product_tag',
            'product_id',
            'tag_id',
            'id',
            'id'
        );
    }

    /*
هذا يعتبر لوكال سكوب ولها تسميه مثلها مثل غيرها مثل الكامل كيس عشان بتم الاستدعاء 
->active
تستخدم في الاستعلام على المعلومات من قواعد البيانات لل 
Eloquent 
وهي محليه تستخدم مع المودل تبعها
*/


    public function scopeActive(Builder $query)
    {
        return $query->where('status', '=', 'active');
    }


    /*
هذا يعتبر ملحق او 
accessor 
يسهل من الحصول على الصوره حسب الشرط المطلوب ولها تسميه خاصه وهي ال 
camelCase  
وعند الاستدعاء بهذا الشكل حسب التسميه كما في هذا المثال 
  image_url 
*/

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return 'https://th.bing.com/th/id/OIP.WY1Cfj2Z-1qQI6ofFSE-QAHaFj?rs=1&pid=ImgDetMain.png';
        }
        if (Str::startsWith($this->image, ['http://', 'https://'])) {
            return $this->image;
        }
        return asset('storage/' . $this->image);
    }

    // accessor

    public function getSalePercentAttribute()
    {

        if (!$this->compare_price) {
            return 0;
        }
        return 100 - (100 * $this->price / $this->compare_price);
    }
}
