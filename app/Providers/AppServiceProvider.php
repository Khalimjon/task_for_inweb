<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Policies\CategoryPolicy;
use App\Policies\PagePolicy;
use App\Policies\ProductPolicy;
use Illuminate\Pagination\Paginator;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     */
    protected $policies = [
        Category::class => CategoryPolicy::class,
        Page::class => PagePolicy::class,
        Product::class => ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();
        Paginator::useBootstrapFive();
    }
}
