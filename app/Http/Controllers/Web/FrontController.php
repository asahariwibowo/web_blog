<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Categori;
use App\Artikel;

class FrontController extends Controller
{
    function index()
    {
        $categori = Categori::all();
        $artikel = Artikel::latest()->get()->random(2);
        $artikelall = Artikel::latest()->get();
        $artikelterkait = Artikel::latest()->limit(5)->get();

        return view('front',compact('categori', 'artikel', 'artikelall', 'artikelterkait'));
    }

    public function show(Artikel $artikel)
    {
        $artikel_detail=$artikel;
        $categori= Categori::withCount('Artikel')->get();
        
       

        return view('front.artikel_detail', compact('artikel_detail','categori'));
    }

    public function artikel_kategori(Categori $kategori){
        {
           
            $categori = Categori::all();
            $artikel = Artikel::latest()->get()->random(2);
            $artikelall = $kategori->Artikel()->get();
            $artikelterkait = Artikel::latest()->limit(5)->get();

        return view('front',compact('categori', 'artikel', 'artikelall', 'artikelterkait'));
            return $artikelall;
        }

    }
}
