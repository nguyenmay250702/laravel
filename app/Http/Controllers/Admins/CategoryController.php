<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $data = Category::all();
        return view("admins/categories/index",compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view("admins/categories/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'          =>  'required',
        ]);

        $category = new Category;

        $category->ten_tloai = $request->category_name;

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Student Added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("admins/categories/show",compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admins/categories/edit",compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name'      =>  'required'
        ]);

        // $student = Student::find($request->hidden_id);

        $category->ten_tloai= $request->category_name;

        $category->save();

        return redirect()->route('categories.index')->with('success', 'Category Data has been updated successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route("categories.index")->with('success',"Category data deleted successfully");
    }

}
