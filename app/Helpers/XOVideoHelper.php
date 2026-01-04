<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class DasVideoHelper
{
    public static function compressVideo($file, $folder = 'banner', $bitrate = 800)
    {
        try {
            // Tentukan path input (boleh objek, boleh string)
            $inputPath = is_string($file) ? $file : $file->getRealPath();

            // Nama file unik untuk output
            $filename = Str::uuid() . '.mp4';
            $outputPath = "videos/{$folder}/{$filename}";

            Storage::disk('public')->makeDirectory("videos/{$folder}");
            $fullOutputPath = storage_path("app/public/{$outputPath}");

            // Cek apakah ffmpeg tersedia
            $ffmpegExists = shell_exec('which ffmpeg') || shell_exec('where ffmpeg');

            if ($ffmpegExists) {
                // Kompres pakai ffmpeg
                $cmd = "ffmpeg -y -i \"{$inputPath}\" -b:v {$bitrate}k -preset ultrafast -threads 2 -movflags +faststart \"{$fullOutputPath}\"";
                exec($cmd, $output, $code);

                if ($code !== 0) {
                    Log::warning("⚠️ FFmpeg gagal, fallback copy file asli.");
                    Storage::disk('public')->put($outputPath, file_get_contents($inputPath));
                }
            } else {
                // Jika ffmpeg gak ada → langsung copy file asli
                Storage::disk('public')->put($outputPath, file_get_contents($inputPath));
            }

            return $outputPath;
        } catch (\Throwable $e) {
            Log::error("❌ DasVideoHelper error: " . $e->getMessage());
            return null;
        }
    }
}
