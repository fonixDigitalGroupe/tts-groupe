<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with('category');

        if ($request->has('category') && $request->category !== '') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        if ($request->has('search') && $request->search !== '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        if ($request->has('min_price') && $request->min_price !== '') {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'price_asc': $query->orderBy('price', 'asc'); break;
                case 'price_desc': $query->orderBy('price', 'desc'); break;
                default: $query->latest(); break;
            }
        } else {
            $query->latest();
        }

        $isFiltered = $request->anyFilled(['category', 'search', 'min_price', 'max_price']);
        $currentCategory = null;
        if ($request->has('category') && $request->category !== '') {
            $currentCategory = Category::where('slug', $request->category)->first();
        }

        $featuredProducts = Product::where('is_active', true)->where('is_featured', true)->with('category')->latest()->take(10)->get();
        $newProducts = Product::where('is_active', true)->where('is_new', true)->with('category')->latest()->take(10)->get();
        
        $products = $query->paginate(12)->withQueryString();
        $categories = Category::where('is_active', true)->get();

        return view('pages.shop', compact('products', 'categories', 'featuredProducts', 'newProducts', 'isFiltered', 'currentCategory'));
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('is_active', true)
            ->take(6)
            ->get();

        return view('pages.product-show', compact('product', 'relatedProducts'));
    }
}
