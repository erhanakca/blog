<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('category_show', ['categories' => $categories]);
    }

    public function delete($category_id)
    {
        Category::find($category_id)->delete();
        $categories = Category::all();
        return view('category_show', ['categories' => $categories]);
    }

    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('category_edit', ['category' => $category]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|string',
            'category_id' => 'required'
        ]);

        $data = $validator->validated();
        Category::find($data['category_id'])->update([
            'name' => $data['name']
        ]);
        $categories = Category::all();
        return view('category_show', ['categories' => $categories]);
    }

    public function add()
    {
        return view('category_add');
    }

    public function creat(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20|string'
        ]);

        $data = $validator->validated();
        Category::create([
            'name' => $data['name']
        ]);
        $categories = Category::all();
        return view('category_show', ['categories'=>$categories]);
    }
}
