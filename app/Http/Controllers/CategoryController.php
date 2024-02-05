<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function newCategory(Request $request)
    {
        $validate = $request->validate([
            'name_category' => 'required|string',
        ]);

        $category = category::create($validate);

        if ($category){
        return response()->json(['message' => 'new category has been created', 'data' => $category], 201);
        } else {
            return response()->json(['message' => 'something went wrong'], 500);
        }
    }

    public function displayCategory(){
        $category = Category::all();

        if ($category){
            return response()->json(['data' => $category], 200);
        } else{
            return response()->json(['message' => 'something went wrong'], 500);
        }
    }

    public function deleteCategory(Request $request)
    {
        $id = $request->input('category_id');
        $category = Category::find($id);
        if ($category->delete()){
            return response()->json(['message' => 'category has been deleted'], 200);
        } else{
            return response()->json(['message' => 'something went wrong'], 500);
        }
    }
}
