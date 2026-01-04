<?php

namespace App\Http\Controllers;

use App\Models\CategoryCollection;
use Illuminate\Http\Request;

class CategoryCollectionController extends Controller
{
    public function index()
    {
        // 10 item per halaman
        $category_collections = CategoryCollection::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.auth.category-collection.Index', [
            'category_collections' => $category_collections,
        ]);
    }


    public function create()
    {
        return view('pages.auth.category-collection.Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:category_collections,name',
        ]);

        CategoryCollection::create($data);

        return redirect()->route('category-collection.index')->with('success', 'Category Collection berhasil ditambahkan.');
    }

    public function update(Request $request, CategoryCollection $category_collection)
    {
         $data = $request->validate([
            'name' => 'required|string|max:255|unique:category_collections,name,' . $category_collection->id,
        ]);

        $category_collection->update($data);

        return redirect()->route('category-collection.index')->with('success', 'Category Collection berhasil diperbarui.');
    }

    public function destroy(CategoryCollection $category_collection)
    {

        $category_collection->delete();

        return redirect()->route('category-collection.index')->with('success', 'Category Collection berhasil dihapus.');
    }
}
