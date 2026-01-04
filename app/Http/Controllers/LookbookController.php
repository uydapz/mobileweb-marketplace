<?php

namespace App\Http\Controllers;

use App\Helpers\XOImageHelper;
use App\Models\{Collection, Lookbook};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class LookbookController extends Controller
{
    public function index()
    {
        $lookbooks = Lookbook::with('collections.featuredDesign')
            ->orderByDesc('period_year')
            ->orderByDesc('period_month')
            ->paginate(6);

        return view('pages.auth.lookbook.index', compact('lookbooks'));
    }

    /**
     * Generate otomatis per triwulan
     */
    public function generateQuarterlyLookbooks($year = null)
    {
        $year = $year ?? now()->year;
        $quarters = [
            1 => [1, 2, 3],
            2 => [4, 5, 6],
            3 => [7, 8, 9],
            4 => [10, 11, 12],
        ];

        foreach ($quarters as $q => $months) {
            $slug = "q{$q}-{$year}";
            if (Lookbook::where('slug', $slug)->exists()) continue;

            $collections = Collection::whereYear('created_at', $year)
                ->whereIn(DB::raw('MONTH(created_at)'), $months)
                ->get();

            if ($collections->isEmpty()) continue;

            $lookbook = Lookbook::create([
                'title' => "Lookbook Triwulan {$q} {$year}",
                'slug' => $slug,
                'description' => "Kumpulan karya dan desain yang dirilis di Triwulan {$q} Tahun {$year}.",
                'cover_image' => null,
                'period_month' => $months[0],
                'period_year' => $year,
            ]);

            $lookbook->collections()->attach($collections->pluck('id'));
        }

        return redirect()->route('lookbook.index')->with('success', 'Lookbook triwulan berhasil dibuat.');
    }

    public function create()
    {
        $collections = Collection::with('featuredDesign')->get();
        return view('pages.auth.lookbook.create', compact('collections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp',
            'collections' => 'array',
        ]);

        $slug = Str::slug($request->title);
        $baseSlug = $slug;
        $counter = 1;
        while (Lookbook::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        $coverPath = null;
        if ($request->hasFile('cover_image')) {
            try {
                $coverPath = XOImageHelper::resizeCropSquareWebp(
                    $request->file('cover_image'),
                    'lookbooks'
                );
            } catch (\Exception $e) {
                return back()->withInput()->withErrors([
                    'cover_image' => 'Gagal memproses gambar, pastikan file valid.',
                ]);
            }
        }

        $lookbook = Lookbook::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'cover_image' => $coverPath,
            'period_month' => now()->month,
            'period_year' => now()->year,
        ]);

        if ($request->filled('collections')) {
            $lookbook->collections()->sync($request->collections);
        }

        return redirect()->route('lookbook.index')->with('success', 'Lookbook berhasil ditambahkan!');
    }

    public function updateCover(Request $request, Lookbook $lookbook)
    {
        $request->validate([
            'cover_image' => 'required|image|mimes:jpeg,png,webp',
        ]);

        try {
            // Hapus gambar lama jika ada
            if ($lookbook->cover_image && Storage::disk('public')->exists($lookbook->cover_image)) {
                Storage::disk('public')->delete($lookbook->cover_image);
            }

            // Resize pakai helper XOImageHelper
            $newImage = XOImageHelper::resizeCropSquareWebp(
                $request->file('cover_image'),
                'lookbooks'
            );

            // Update data
            $lookbook->update([
                'cover_image' => $newImage,
            ]);

            return back()->with('success', 'Sampul berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->withErrors(['cover_image' => 'Gagal memperbarui sampul. Pastikan file valid.']);
        }
    }

    public function destroy(Lookbook $lookbook)
    {
        if ($lookbook->image && Storage::disk('public')->exists($lookbook->image)) {
            Storage::disk('public')->delete($lookbook->image);
        }

        $lookbook->delete();

        return redirect()->route('lookbook.index')->with('success', 'Lookbook berhasil dihapus.');
    }
}
