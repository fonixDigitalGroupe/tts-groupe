<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // ───── DASHBOARD ─────
    public function dashboard()
    {
        return redirect()->route('admin.categories.index');
    }

    // ───── CATEGORIES ─────
    public function categoriesIndex()
    {
        $categories = Category::latest()->paginate(50);
        return view('admin.categories', compact('categories'));
    }

    public function categoriesCreate()
    {
        return view('admin.categories.create');
    }

    public function categoriesStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Category::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'is_active'   => true,
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    public function categoriesEdit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function categoriesUpdate(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);
        return redirect()->route('admin.categories.index')->with('success', 'Catégorie modifiée.');
    }

    public function categoriesDestroy(Category $category)
    {
        $category->delete();
        return back()->with('success', 'Catégorie supprimée.');
    }

    // ───── PRODUCTS ─────
    public function productsIndex()
    {
        $products = Product::with('category')->latest()->paginate(25);
        return view('admin.products', compact('products'));
    }

    public function productsCreate()
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.products.create', compact('categories'));
    }

    public function productsStore(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price'       => 'nullable|numeric',
            'stock'       => 'nullable|integer',
            'description' => 'nullable|string',
            'images'      => 'nullable|array|max:3',
            'images.*'    => 'image|max:4096',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
        }

        Product::create([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'category_id' => $request->category_id,
            'price'       => $request->price,
            'stock'       => $request->stock ?? 0,
            'description' => $request->description,
            'images'      => $imagePaths,
            'is_active'   => true,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès.');
    }

    public function productsEdit(Product $product)
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function productsUpdate(Request $request, Product $product)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price'       => 'nullable|numeric',
            'stock'       => 'nullable|integer',
            'description' => 'nullable|string',
            'images'      => 'nullable|array|max:3',
            'images.*'    => 'image|max:4096',
        ]);

        $imagePaths = $product->images ?? [];
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('products', 'public');
            }
        }

        $product->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'category_id' => $request->category_id,
            'price'       => $request->price,
            'stock'       => $request->stock ?? 0,
            'description' => $request->description,
            'images'      => $imagePaths,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produit modifié.');
    }

    // ───── SETTINGS ─────
    public function settings()
    {
        return view('admin.settings');
    }

    public function productsDestroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Produit supprimé.');
    }
}
