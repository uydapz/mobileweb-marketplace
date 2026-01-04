<?php

namespace App\Http\Controllers;

use App\Helpers\XOImageHelper;
use App\Models\{CategoryCollection, Collection, FeaturedDesign,};
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        // 10 item per halaman
        $collections = Collection::orderBy('created_at', 'desc')->paginate(6);
        $category_collections = CategoryCollection::orderBy('created_at', 'desc')
            ->pluck('name', 'id');
        $featured_designs = FeaturedDesign::orderBy('created_at', 'desc')
            ->pluck('theme', 'id');
        return view('pages.auth.collection.Index', [
            'collections' => $collections,
            'category_collections' => $category_collections,
            'featured_designs' => $featured_designs,
        ]);
    }


    public function create()
    {
        $category_collections = CategoryCollection::orderBy('created_at', 'desc')
            ->pluck('name', 'id');
        $featured_designs = FeaturedDesign::orderBy('created_at', 'desc')
            ->pluck('theme', 'id');
        return view('pages.auth.collection.Create', [
            'category_collections' => $category_collections,
            'featured_designs' => $featured_designs,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:collections,name',
            'category_id' => 'required',
            'featured_design_id' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'description' => 'nullable|string',
        ]);


        if ($request->hasFile('image')) {
            try {
                $data['image'] = XOImageHelper::resizeCropSquareWebp(
                    $request->file('image'),
                    'collection' // folder penyimpanan
                );
            } catch (\Exception $e) {
                return back()->withInput()->withErrors([
                    'image' => 'Gagal memproses gambar. Pastikan file JPG/PNG valid.',
                ]);
            }
        }

        Collection::create($data);

        return redirect()->route('collection.index')->with('success', 'Collection berhasil ditambahkan.');
    }

    public function update(Request $request, Collection $collection)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:collections,name,' . $collection->id,
            'category_id' => 'required',
            'featured_design_id' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'description' => 'nullable|string',
        ]);


        if ($request->hasFile('image')) {
            try {
                $data['image'] = XOImageHelper::resizeCropSquareWebp(
                    $request->file('image'),
                    'collection' // folder penyimpanan
                );

                if ($collection->image && file_exists(storage_path('app/public/' . $collection->image))) {
                    unlink(storage_path('app/public/' . $collection->image));
                }
            } catch (\Exception $e) {
                return back()->withInput()->withErrors([
                    'image' => 'Gagal memproses gambar. Pastikan file JPG/PNG valid.',
                ]);
            }
        }

        $collection->update($data);

        return redirect()->route('collection.index')->with('success', 'Collection berhasil diperbarui.');
    }


    // Delete data
    public function destroy(Collection $collection)
    {
        // Hapus gambar jika ada
        if ($collection->image && file_exists(storage_path('app/public/' . $collection->image))) {
            unlink(storage_path('app/public/' . $collection->image));
        }

        $collection->delete();

        return redirect()->route('collection.index')->with('success', 'Collection berhasil dihapus.');
    }
}
