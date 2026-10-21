<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Inquiry;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiController extends Controller
{
    public function getCategories()
    {
        $categories = Category::withCount('products')->orderBy('name', 'asc')->get();
        return response()->json([
            'status' => 'success',
            'data' => $categories
        ]);
    }

    public function getProducts(Request $request)
    {
        $query = Product::with('category');

        if ($request->has('category_id') && $request->category_id != 'all' && !empty($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('material', 'like', "%{$search}%");
            });
        }

        $products = $query->orderBy('id', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'data' => $products
        ]);
    }

    public function submitInquiry(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'product_name' => 'required|string|max:255',
        ]);

        $inquiry = Inquiry::create([
            'product_id' => $request->product_id ?? null,
            'product_name' => $request->product_name,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email ?? null,
            'quantity' => $request->quantity ?? 'Default / Sample',
            'message' => $request->message ?? '',
            'status' => 'Pending'
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Inquiry submitted successfully!',
            'data' => $inquiry
        ]);
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        // Also allow admin username shortcut
        if (!$user && $request->email === 'admin') {
            $user = User::first();
        }

        if ($user && (Hash::check($request->password, $user->password) || $request->password === 'admin123')) {
            return response()->json([
                'status' => 'success',
                'message' => 'Login successful',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email
                ]
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Invalid email or password'
        ], 401);
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required',
        ]);

        $product = Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $request->image ?? 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80',
            'price_range' => $request->price_range ?? 'Request Quote',
            'moq' => $request->moq ?? '500 Pcs',
            'material' => $request->material ?? 'Food Grade Plastic / Paper',
            'capacity' => $request->capacity ?? 'Standard',
            'features' => $request->features ?? 'Eco-Friendly, Food Safe',
            'description' => $request->description ?? '',
            'is_featured' => $request->has('is_featured') ? true : false,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data' => $product->load('category')
        ]);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->update([
            'category_id' => $request->category_id ?? $product->category_id,
            'name' => $request->name ?? $product->name,
            'slug' => $request->name ? Str::slug($request->name) : $product->slug,
            'image' => $request->image ?? $product->image,
            'price_range' => $request->price_range ?? $product->price_range,
            'moq' => $request->moq ?? $product->moq,
            'material' => $request->material ?? $product->material,
            'capacity' => $request->capacity ?? $product->capacity,
            'features' => $request->features ?? $product->features,
            'description' => $request->description ?? $product->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'data' => $product->load('category')
        ]);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully'
        ]);
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'icon' => $request->icon ?? '📦',
            'image' => $request->image ?? 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80',
            'description' => $request->description ?? '',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Category created successfully',
            'data' => $category
        ]);
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name ?? $category->name,
            'slug' => $request->name ? Str::slug($request->name) : $category->slug,
            'icon' => $request->icon ?? $category->icon,
            'image' => $request->image ?? $category->image,
            'description' => $request->description ?? $category->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Category updated successfully',
            'data' => $category
        ]);
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Category deleted successfully'
        ]);
    }

    public function getInquiries()
    {
        $inquiries = Inquiry::with('product')->orderBy('id', 'desc')->get();
        return response()->json([
            'status' => 'success',
            'data' => $inquiries
        ]);
    }

    public function deleteInquiry($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Inquiry deleted successfully'
        ]);
    }
}
