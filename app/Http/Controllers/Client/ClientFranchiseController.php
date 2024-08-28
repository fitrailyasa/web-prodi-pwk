<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Data;
use App\Models\Category;
use App\Models\link;

class ClientlinkController extends Controller
{
    public function index()
    {
        $links = link::withoutTrashed()->paginate(12);
        return view('client.link.index', compact('links'));
    }

    public function show(string $category)
    {
        $link = link::where('slug', $category)->withoutTrashed()->firstOrFail();
        $categories = Category::where('link_id', $link->id)->withoutTrashed()->paginate(12);

        return view('client.link.show', compact('link', 'categories'));
    }

    public function category(string $category, string $data)
    {
        $category = Category::where('slug', $data)->withoutTrashed()->firstOrFail();
        $datas = Data::where('category_id', $category->id)->withoutTrashed()->paginate(30);
        $link = link::findOrFail($category->link_id);

        return view('client.link.category-detail', compact('datas', 'category', 'link'));
    }
}
