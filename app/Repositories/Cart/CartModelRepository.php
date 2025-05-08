<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class CartModelRepository implements CartRepository
{
    public function get(): Collection
    {
        return Cart::where('cookie_id', '=', '')->get();
    }

    public function add(Product $product, $quantity = 1)
    {


        return Cart::create([
            'user_id' => auth()->id(),
            'cookie_id' => Str::uuid(),
            'product_id' => $product->id,
            'quantity' => $quantity,
        ]);
    }
    public function update(Product $product, $quantity)
    {
        Cart::where('product_id', $product->id)->update([
            'quantity' => $quantity,
        ]);
    }
    public function delete(Product $product)
    {
        Cart::where('product_id', $product->id)->delete();
    }
    public function empty()
    {
        Cart::where('cookie_id', '')->delete();
    }
    public function total(): float
    {



        // return Cart::where('cookie_id', ' ')
        //     ->join('products', 'products.id', '=', 'carts.product_id')
        //     ->selectRaw('SUM(products.price * carts.quantity) as total')
        //     ->value('total');
        return Cart::where('cookie_id', ' ')
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->sum('products.price * carts.quantity');
    }
}
