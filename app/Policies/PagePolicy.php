<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Page;
use App\Models\User;

class PagePolicy
{
    public function update(User $user, Page $page)
    {
        return $user->hasRole('admin') || $user->id === $page->user_id;
    }

    /**
     * Determine whether the user can delete the category.
     */
    public function delete(User $user, Page $page)
    {
        return $user->hasRole('admin') || $user->id === $page->user_id;
    }
}
