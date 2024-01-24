<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Tag;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Item::paginate(10, ['*'], 'items');
        $categories = Category::paginate(10, ['*'], 'categories');
        $tags = Tag::paginate(10, ['*'], 'tags');
        return view('admin.dashboard', compact('items', 'categories', 'tags'));
    }
}
