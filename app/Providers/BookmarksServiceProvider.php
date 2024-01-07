<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;

class BookmarksServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (auth('buyer')->check()) {
                $bookmarks = Bookmark::where('buyer_id', auth('buyer')->id())->with('product.category', 'product.craftspeople')->get();
                $view->with('bookmarks', $bookmarks);
            }
        });
    }
}
