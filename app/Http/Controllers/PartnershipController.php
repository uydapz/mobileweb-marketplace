<?php

namespace App\Http\Controllers;

use App\Helpers\XOImageHelper;
use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function index()
    {
        $partnerships = Partnership::orderBy('created_at', 'desc')->paginate(6);
        return view('pages.auth.partnership.Index', compact('partnerships'));
    }

    public function create()
    {
        return view('pages.auth.partnership.Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'partner_name' => 'required|string|max:255|unique:partnerships,partner_name',
            'website'      => 'nullable|url|max:255',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('logo')) {
            try {
                $data['logo'] = XOImageHelper::resizeWebp(
                    $request->file('logo'),
                    'part' // folder penyimpanan
                );
            } catch (\Exception $e) {
                return back()->withInput()->withErrors([
                    'logo' => 'Gagal memproses gambar. Pastikan file JPG/PNG valid.',
                ]);
            }
        }

        Partnership::create($data);

        return redirect()->route('partnership.index')->with('success', 'Partnership berhasil ditambahkan.');
    }

    public function update(Request $request, Partnership $partnership)
    {
        $data = $request->validate([
            'partner_name' => 'required|string|max:255|unique:partnerships,partner_name,' . $partnership->id,
            'website'      => 'nullable|url|max:255',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);
        if ($request->hasFile('logo')) {
            try {
                $data['logo'] = XOImageHelper::resizeWebp(
                    $request->file('logo'),
                    'partnership' // folder penyimpanan
                );

                if ($partnership->logo && file_exists(storage_path('app/public/' . $partnership->logo))) {
                    unlink(storage_path('app/public/' . $partnership->logo));
                }
            } catch (\Exception $e) {
                return back()->withInput()->withErrors([
                    'logo' => 'Gagal memproses gambar. Pastikan file JPG/PNG valid.',
                ]);
            }
        }

        $partnership->update($data);

        return redirect()->route('partnership.index')->with('success', 'Partnership berhasil diperbarui.');
    }

    public function destroy(Partnership $partnership)
    {
        if ($partnership->logo && file_exists(storage_path('app/public/' . $partnership->logo))) {
            unlink(storage_path('app/public/' . $partnership->logo));
        }

        $partnership->delete();

        return redirect()->route('partnership.index')->with('success', 'Partnership berhasil dihapus.');
    }
}
