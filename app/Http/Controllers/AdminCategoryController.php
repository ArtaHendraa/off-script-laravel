<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.admin.category-form");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::create([
            "name" => $request->name,
            "slug" => $request->slug,
        ]);
        return redirect()
            ->route("admin.category.add")
            ->with("success", "Product created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function editList()
    {
        $categories = Category::get();
        return view("pages.admin.edit-category", compact("categories"));
    }

    public function edit(string $slug)
    {
        $category = Category::where("slug", $slug)->firstOrFail();
        return view("pages.admin.category-form", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $category = Category::where("slug", $slug)->firstOrFail();
        $data = $request->validate([
            "name" => "required|string|max:255",
            "slug" => "required|string|max:255",
        ]);

        $category->update($data);

        return redirect()
            ->route("admin.category.edit.list")
            ->with("success", "Category updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category = Category::where("slug", $slug)->firstOrFail();
        $category->delete();
        return redirect()
            ->route("admin.category.edit.list")
            ->with("success", "Category deleted!");
    }
}
