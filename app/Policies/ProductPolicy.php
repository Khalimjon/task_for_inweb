<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function update(User $user, Product $product)
    {
        return $user->hasRole('admin') || $user->id === $product->user_id;
    }

    /**
     * Determine whether the user can delete the category.
     */
    public function delete(User $user, Product $product)
    {
        return $user->hasRole('admin') || $user->id === $product->user_id;
    }
}
