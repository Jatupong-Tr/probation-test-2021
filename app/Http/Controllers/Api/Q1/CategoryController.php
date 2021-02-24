<?php

namespace App\Http\Controllers\Api\Q1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function getCategories()
    {
        $categories = Category::all();
        return response()->json([
            'categories' => $categories
        ], 200);
    }
}
