<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veri;

class VeriController extends Controller
{
    public function create()
    {
        return view('urun_ekle');
    }

    public function store(Request $request)
    {
        $veriler = $request->all();

        $veri = new Veri();
        $veri->baslik = $veriler['baslik'];
        $veri->icerik = $veriler['icerik'];
        // Gorsel is nullable, so we check if it exists
        if (isset($veriler['gorsel'])) {
            $veri->gorsel = $veriler['gorsel'];
        }
        $veri->save();

        return "Veri başarıyla kaydedildi.";
    }
}
