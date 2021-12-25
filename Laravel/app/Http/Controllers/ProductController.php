<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::with('category')->get());
    }

    public function store(Request $request)
    {
        $data = $this->check($request->all(), [
            'name' => ['required', 'unique:products,name', 'max:255'],
            'category_id' => ['required', 'numeric'],
            'price' => ['required'],
        ]);

        Product::create($data);
        return $this->json_res(['message' => "Product Added"]);
    }

    public function show(Product $product)
    {
        return new ProductResource($product->with('category'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->check($request->all(), [
            'name' => ['required', Rule::unique('products', 'name')->ignore($product)],
            'price' => ['required'],
            'category_id' => ['required', 'numeric'],
        ]);

        $product->update($data);
        return $this->json_res(['message' => 'Product Updated']);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return $this->json_res(['message' => "Product Deleted"]);
    }
}
