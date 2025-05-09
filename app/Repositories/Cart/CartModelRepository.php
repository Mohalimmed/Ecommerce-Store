<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartModelRepository implements CartRepository
{
    public function get(): Collection
    {
        return Cart::with('product')->where('cookie_id', '=', $this->getCookieId())->get();
    }

    public function add(Product $product, $quantity = 1)
    {
        $item = Cart::where('product_id', $product->id)
            ->where('cookie_id', '=', $this->getCookieId())
            ->first();
        if (!$item) {

            return Cart::create([
                'user_id' => auth()->id(),
                'cookie_id' => $this->getCookieId(),
                'product_id' => $product->id,
                'quantity' => $quantity,
            ]);
        }

        $item->increment('quantity', $quantity);
    }
    public function update(Product $product, $quantity)
    {
        Cart::where('product_id', $product->id)
            ->where('cookie_id', '=', $this->getCookieId())
            ->update([
                'quantity' => $quantity,
            ]);
    }
    public function delete($id)
    {
        Cart::where('id', $id)
            ->where('cookie_id', '=', $this->getCookieId())
            ->delete();
    }
    public function empty()
    {
        Cart::where('cookie_id', '=', $this->getCookieId())->delete();
    }
    public function total(): float
    {
        return Cart::where('cookie_id', $this->getCookieId())
            ->join('products', 'products.id', '=', 'carts.product_id')
            ->selectRaw('SUM(products.price * carts.quantity) as total')
            ->value('total') ?? 0;
    }

    protected function getCookieId()
    {
        $cookie_id = Cookie::get('cart_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id, 60 * 24 * 30); // ✅ 30 days in minutes
        }
        return $cookie_id;
    }
}
