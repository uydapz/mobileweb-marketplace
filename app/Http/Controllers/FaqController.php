<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // 9 item per halaman
        $faqs = Faq::orderBy('created_at', 'desc')->paginate(9);
        return view('pages.auth.faq.Index', compact('faqs'));
    }

    public function create()
    {
        return view('pages.auth.faq.Create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255|unique:faqs,question',
            'answer'   => 'required|string',
        ]);

        Faq::create($data);

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil ditambahkan.');
    }

    public function update(Request $request, Faq $faq)
    {
        $data = $request->validate([
            'question' => 'required|string|max:255|unique:faqs,question,' . $faq->id,
            'answer'   => 'required|string',
        ]);

        $faq->update($data);

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ berhasil dihapus.');
    }
}
