<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\Bookmark;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $categories = Categories::all();
            
            // Filter categories with products
            $categoriesWithProducts = $categories->filter(function ($category) {
                return $category->products->isNotEmpty();
            });
        
            $view->with('categoriesWithProducts', $categoriesWithProducts);
        
            // Check if there's an authenticated buyer user
            $buyerUser = auth('buyer')->user();
        
            if ($buyerUser) {
                $userId = $buyerUser->id;
        
                // Retrieve bookmarks associated with the authenticated user
                $bookmarks = Bookmark::where('buyer_id', $userId)->with('product')->get();
            
                // Pass the bookmarks to all views
                $view->with('bookmarks', $bookmarks);
            } else {
                // If no authenticated buyer user, you can pass an empty array or handle it as needed
                $view->with('bookmarks', []);
            }
        });
        
    }
}
