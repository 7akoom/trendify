<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CartRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \App\Repositories\CartRepositoryInterface::class,
            \App\Repositories\CartRepository::class,
        );
    }

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('*', function ($view) {
            $cartRepo = app(CartRepositoryInterface::class);

            $view->with([
                'cartCount' => $cartRepo->count(),
                'cartTotal' => $cartRepo->total(),
            ]);
        });
    }
}
