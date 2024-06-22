<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('book-categories/add-category');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],

        ]);

        $category = Category::create([
            'name' => $validatedData['name'],
            'created_by' => auth()->id(),

        ]);

        return redirect()->route('category.all')->with(
            'status',
            'New Category was added successfully.'
        );
    }

    public function index()
    {
        $categories = Category::select('id', 'name', 'slug')->get();
        return view('book-categories/category-index', ['categories' => $categories]);
    }

    public function view($slug)
    {
        // $category = Category::findOrFail($id);

        // Find the category by slug
        $category = Category::where('slug', $slug)->firstOrFail();

        return view('book-categories.view-category', ['category' => $category]);
    }

    public function edit(int $id)
    {
        $category = Category::findOrFail($id);
        return view(
            'book-categories.edit-category',
            ['category' => $category]
        );
    }

    public function update(int $id, Request $request)
    {


        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $category = Category::findOrFail($id);


        $category->name = $validatedData['name'];

        $category->save();

        return redirect()->route('category.all')->with(
            'status',
            'Category was updated successfully.'
        );
    }

    public function delete(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.all')->with(
            'status',
            'Category was deleted successfully.'
        );
    }

    public function toggleStatus($id)
    {
        $category = Category::findOrFail($id);

        $category->active = !$category->active;
        $category->save();

        return redirect()->route('category.all')->with('status', 'Category status updated successfully.');
    }
}
