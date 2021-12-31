<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::withCount('products')->get());
    }

    public function store()
    {
        $data = $this->check(request()->all(), [
            'name' => ['required', Rule::unique('categories')],
        ]);

        Category::create($data);
        return $this->json_res(['message' => "Category Added"]);
    }

    public function show(Category $category)
    {
        return new CategoryResource($category->withCount('products'));
    }

    public function update(Category $category)
    {
        $data = $this->check(request()->all(), [
            'name' => ['required', Rule::unique('categories')->ignore($category)],
        ]);

        $category->update($data);
        return $this->json_res(['message' => "Category Updated"]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return $this->json_res(['message' => "Category Deleted"]);
    }
}
