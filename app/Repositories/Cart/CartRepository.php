<?php

namespace App\Repositories\Cart;

use App\Models\Product;
use Illuminate\Support\Collection;

interface CartRepository
{
    public function get(): Collection;
    public function add(Product $product, $quantity = 1);
    public function update(Product $product, $quantity);
    public function delete(Product $product);
    public function empty();
    public function total(): float;
}
