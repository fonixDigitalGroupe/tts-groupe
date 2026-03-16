<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
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
            'images'         => 'nullable|array|max:3',
            'images.*'       => 'image|max:4096',
            'classification' => 'nullable|string|in:featured,new,none',
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
            'is_featured' => $request->classification === 'featured',
            'is_new'      => $request->classification === 'new',
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
            'images.*'       => 'image|max:4096',
            'deleted_images' => 'nullable|array',
            'classification' => 'nullable|string|in:featured,new,none',
        ]);

        $currentImages = $product->images ?? [];
        
        // 1. Handle Deletions
        if ($request->has('deleted_images')) {
            foreach ($request->deleted_images as $path) {
                if (in_array($path, $currentImages)) {
                    Storage::disk('public')->delete($path);
                    $currentImages = array_filter($currentImages, fn($img) => $img !== $path);
                }
            }
        }

        // 2. Handle New Uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                if (count($currentImages) < 3) {
                    $currentImages[] = $image->store('products', 'public');
                }
            }
        }

        $product->update([
            'name'        => $request->name,
            'slug'        => Str::slug($request->name),
            'category_id' => $request->category_id,
            'price'       => $request->price,
            'stock'       => $request->stock ?? 0,
            'description' => $request->description,
            'images'      => array_values($currentImages),
            'is_featured' => $request->classification === 'featured',
            'is_new'      => $request->classification === 'new',
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produit modifié.');
    }

    // ───── SETTINGS & USERS ─────
    public function settings()
    {
        $users = \App\Models\User::latest()->get();
        $whatsapp_number = Setting::get('whatsapp_number');
        return view('admin.settings', compact('users', 'whatsapp_number'));
    }

    public function settingsUpdate(Request $request)
    {
        $request->validate([
            'whatsapp_number' => 'nullable|string|max:20',
        ]);

        Setting::set('whatsapp_number', $request->whatsapp_number);

        return back()->with('success', 'Paramètres mis à jour avec succès.');
    }

    public function usersCreate()
    {
        return view('admin.users.create');
    }

    public function usersStore(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'role'       => 'required|string|in:admin,chef_equipe,chef_projet,grh',
            'password'   => 'required|string|min:8',
        ]);

        \App\Models\User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'name'       => $request->first_name . ' ' . $request->last_name,
            'email'      => $request->email,
            'role'       => $request->role,
            'password'   => \Illuminate\Support\Facades\Hash::make($request->password),
        ]);

        return redirect()->route('admin.settings')->with('success', 'Utilisateur créé avec succès.');
    }

    public function usersEdit(\App\Models\User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function usersUpdate(Request $request, \App\Models\User $user)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,'.$user->id,
            'role'       => 'required|string|in:admin,chef_equipe,chef_projet,grh',
            'password'   => 'nullable|string|min:8',
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'name'       => $request->first_name . ' ' . $request->last_name,
            'email'      => $request->email,
            'role'       => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = \Illuminate\Support\Facades\Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.settings')->with('success', 'Utilisateur mis à jour.');
    }

    public function usersDestroy(\App\Models\User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }
        
        $user->delete();
        return back()->with('success', 'Utilisateur supprimé.');
    }

    public function productsDestroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Produit supprimé.');
    }
}
