<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Category;
use App\Models\Tag;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::orderBy('id', 'DESC')->get();
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('admin.items.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $new_item = Item::create($data);

        if ($request->has('tags')) {
            $new_item->tags()->attach($data['tags']);
        }

        return redirect()->route('admin.items.show', $new_item);
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $categories = Category::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();
        return view('admin.items.edit', compact('item', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $data = $request->validated();
        // dd($data);
        $item->update($data);

        if ($request->has('tags')) {
            $item->tags()->sync($data['tags']);
        } else {
            $item->tags()->detach();
        }
        return redirect()->route('admin.items.show', $item)->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->tags()->detach();
        $item->delete();
        return redirect()->route('admin.items.index')->with('danger', $item->name . ' has been destroyed!');
    }
}
