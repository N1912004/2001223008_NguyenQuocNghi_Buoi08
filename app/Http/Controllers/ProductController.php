<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }


    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product->update($data);
        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Đã xóa sản phẩm!');
    }
    public function advancedQueries()
    {
        $expensive = Product::where('price', '>', 100000)->get();
        $categories = Category::withCount('products')->get();
        $inStock = Product::where('stock', '>', 0)->get();
        return view('products.queries', compact('expensive', 'categories', 'inStock'));
    
    }
}
