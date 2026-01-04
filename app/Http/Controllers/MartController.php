<?php

namespace App\Http\Controllers;

use App\Helpers\XOImageHelper;
use App\Models\Mart;
use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MartController extends Controller
{
    public function index()
    {
        $marts = Mart::with('collection')->latest()->get();
        $collections = Collection::pluck('name', 'id')->toArray();
        return view('pages.auth.mart.index', compact('marts', 'collections'));
    }

    public function update(Request $request, Mart $mart)
    {
        $validated = $request->validate([
            'collection_id' => 'required|exists:collections,id',
            'product_name'  => 'required|string|max:255',
            'description'   => 'nullable|string',
            'price'         => 'required|numeric|min:0',
            'images'        => 'array',
            'images.*'      => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'is_available'  => 'sometimes|boolean',

            // size input: [ [name => 'L', stock => 10], ... ]
            'sizes'                 => 'array',
            'sizes.*.name'          => 'nullable|string|max:50',
            'sizes.*.stock'         => 'nullable|integer|min:0',
        ]);

        // 🔧 Data utama produk
        $data = [
            'collection_id' => $validated['collection_id'],
            'product_name'  => $validated['product_name'],
            'description'   => $validated['description'] ?? null,
            'price'         => $validated['price'],
            'is_available'  => $request->boolean('is_available'),
        ];

        // 🔁 Upload multiple image pakai XOImageHelper
        if ($request->hasFile('images')) {
            $images = [];
            foreach ($request->file('images') as $file) {
                $path = XOImageHelper::resizeCropSquareWebp($file, 'marts');
                $images[] = $path;
            }

            // Hapus gambar lama dari storage
            if (is_array($mart->image)) {
                foreach ($mart->image as $oldImg) {
                    Storage::disk('public')->delete($oldImg);
                }
            }

            $data['image'] = $images;
        }

        // 🚀 Update produk utama
        $mart->update($data);

        // 🧩 Update ukuran
        $mart->sizes()->delete(); // hapus ukuran lama
        if ($request->filled('sizes')) {
            foreach ($request->sizes as $sizeData) {
                if (!empty($sizeData['name'])) {
                    $mart->sizes()->create([
                        'size' => $sizeData['name'],
                        'stock' => $sizeData['stock'] ?? 0,
                    ]);
                }
            }
        }

        return redirect()->route('mart.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Mart $mart)
    {
        // 🗑️ Hapus gambar lama
        if (is_array($mart->image)) {
            foreach ($mart->image as $oldImg) {
                Storage::disk('public')->delete($oldImg);
            }
        }

        // 🧩 Hapus ukuran juga (cascade di DB)
        $mart->delete();

        return redirect()->route('mart.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function shop()
    {
        $marts = Mart::with('collection')
            ->where('is_available', true)
            ->latest()
            ->paginate(9);

        return view('pages.home.marts.Index', compact('marts'));
    }

    public function show(Mart $mart)
    {
        abort_unless($mart->is_available, 404);

        return view('pages.home.marts.Show', compact('mart'));
    }
}
