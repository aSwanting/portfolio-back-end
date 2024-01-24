<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Item::orderBy('id', 'DESC')->get();
        return response()->json([
            'results' => $items,
            'success' => true
        ]);
    }
}
