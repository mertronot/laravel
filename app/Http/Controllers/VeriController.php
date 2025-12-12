<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veri;

class VeriController extends Controller
{
    public function index()
    {
        $veriler = Veri::all();
        return view('urunler.index', compact('veriler'));
    }

    public function create()
    {
        return view('urunler.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'baslik' => 'required',
            'icerik' => 'required',
            'gorsel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $veri = new Veri();
        $veri->baslik = $request->baslik;
        $veri->icerik = $request->icerik;

        if ($request->hasFile('gorsel')) {
            $imageName = time() . '.' . $request->gorsel->extension();
            $request->gorsel->move(public_path('images'), $imageName);
            $veri->gorsel = $imageName;
        }

        $veri->save();

        return redirect()->route('urunler.index')->with('success', 'Veri başarıyla kaydedildi.');
    }

    public function edit($id)
    {
        $veri = Veri::findOrFail($id);
        return view('urunler.edit', compact('veri'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'baslik' => 'required',
            'icerik' => 'required',
            'gorsel' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $veri = Veri::findOrFail($id);
        $veri->baslik = $request->baslik;
        $veri->icerik = $request->icerik;

        if ($request->hasFile('gorsel')) {
            $imageName = time() . '.' . $request->gorsel->extension();
            $request->gorsel->move(public_path('images'), $imageName);
            $veri->gorsel = $imageName;
        }

        $veri->save();

        return redirect()->route('urunler.index')->with('success', 'Veri başarıyla güncellendi.');
    }

    public function destroy($id)
    {
        $veri = Veri::findOrFail($id);
        $veri->delete();

        return redirect()->route('urunler.index')->with('success', 'Veri başarıyla silindi.');
    }
}
