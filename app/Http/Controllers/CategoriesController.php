<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $topics = Topic::with('user', 'category')->where('category_id', $category->id)->paginate(15);
        return view('categories.index', compact('topics', 'category'));
    }
}
