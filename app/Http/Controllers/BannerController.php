<?php

namespace App\Http\Controllers;

use App\Helpers\XOVideoHelper;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::first();
        return view('pages.auth.banner.index', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'video' => 'nullable|mimes:mp4,mov,avi,webm|max:2000', // maks 2MB
        ]);

        if ($request->hasFile('video')) {
            try {
                // Simpan dulu video mentah di storage sementara
                $tempPath = $request->file('video')->store('tmp/banner', 'public');
                $fullTempPath = storage_path('app/public/' . $tempPath);

                // Hapus video lama
                if ($banner->video && Storage::disk('public')->exists($banner->video)) {
                    Storage::disk('public')->delete($banner->video);
                }

                // Kompres langsung via helper
                $compressedPath = XOVideoHelper::compressVideo($fullTempPath, 'banner', 800);

                if (!$compressedPath || !Storage::disk('public')->exists($compressedPath)) {
                    throw new \Exception('Gagal mengompres video.');
                }

                // Simpan hasilnya ke database
                $banner->update([
                    'video' => $compressedPath,
                    'status' => 'done',
                ]);

                // Hapus file mentahan
                Storage::disk('public')->delete($tempPath);

                return redirect()->back()->with('success', 'Banner berhasil diperbarui.');
            } catch (\Exception $e) {
                Log::error('Gagal memperbarui banner: ' . $e->getMessage());
                return redirect()->back()->with('error', 'Gagal memperbarui banner: ' . $e->getMessage());
            }
        }

        return redirect()->back()->with('info', 'Tidak ada video yang diunggah.');
    }
}
