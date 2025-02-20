<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the category.
     */
    public function update(User $user, Category $category)
    {
        return $user->hasRole('admin') || $user->id === $category->user_id;
    }

    /**
     * Determine whether the user can delete the category.
     */
    public function delete(User $user, Category $category)
    {
        return $user->hasRole('admin') || $user->id === $category->user_id;
    }
}
