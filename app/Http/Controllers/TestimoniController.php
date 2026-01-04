<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
  public function index()
  {
    $testimonis = Testimoni::orderBy('created_at', 'desc')->paginate(9);

    return view('pages.auth.testimoni.Index', compact(['testimonis']));
  }

  public function store(Request $request)
  {
    $request->validate([
      'quote' => 'required|string|max:200',
    ]);

    $user = auth()->user();

    // Ambil text tanpa tag HTML
    $cleanQuote = strip_tags($request->quote);

    $user->testimoni()->updateOrCreate(
      ['user_id' => $user->id],
      [
        'quote' => $cleanQuote,
        'status' => 'active',
        'show' => 0,
      ]
    );

    return redirect()->route('testimoni.index')->with('success', 'Testimoni berhasil disimpan.');
  }

  public function toggle($id)
  {
    $testimonis = Testimoni::findOrFail($id);

    // Toggle nilai boolean
    $testimonis->show = !$testimonis->show;
    $testimonis->save();

    return redirect()->back()->with('success', 'Status testimoni berhasil diperbarui.');
  }
}
