<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderItem extends Pivot
{
    use HasFactory;
    /*
المودل من نوع ال 
pivot
يمثل جدول وسيط بين جدولين
الجدول الوسيط هو جدول يحتوي على مفاتيح أجنبية من الجدولين المرتبطين
*/
    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'order_items';

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault([
            'name' => $this->product_name,
        ]);
    }
}
