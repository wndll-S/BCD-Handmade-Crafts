<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Categories;
use App\Models\Bookmark;
use App\Models\Products;
use App\Models\Transactions;

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
        // View::composer([''], function($view){
        //     $seller = auth()->guard('seller')->user();

        // });
        View::composer('*', function ($view) {
            $categories = Categories::all();
            $orders = Transactions::whereIn('status', ['pending', 'processing', 'out-for-delivery'])->get();
            // $products = Products;
            // Filter categories with products
            $categoriesWithProducts = $categories->filter(function ($category) {
                return $category->products->where('status', 'Active')->isNotEmpty();
            });
            // $category->products->where('status', 'active')->isNotEmpty();
            $view->with(['categoriesWithProducts' => $categoriesWithProducts, 'categories' => $categories, 'orders' => $orders]);
        
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
