<?php

namespace App\Http\Controllers;
use Storage;
use Illuminate\Http\Request;
use App\Artikel;
use App\Categori;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel=Artikel::latest()->get();
        
        return view ('artikel.index', compact('artikel')); /**menampung isi dari tabel artikel  */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categori = Categori::select('id','name_katagori')->get();

        return view('artikel.create', compact('categori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image=$request->file('gambar')->store('artikel');
        Artikel::create([
            'judul'=>\Str::slug($request->judul),
            'body'=>$request->body,
            'gambar'=>$image,
            'categoris_id'=>$request->categoris_id,
        ]);

        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categori=Categori::select('id','name_katagori')->get();
        $artikel=Artikel::find($id);
        return view('artikel.edit',compact('categori','artikel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $artikel=Artikel::find($id);
        Storage::delete($artikel->gambar);
        $artikel->update([
            'judul' => \Str::slug($request->judul),
            'body' => $request->body,
            'gambar' => $request->file('gambar')->store('artikel'),
            'categoris_id' => $request->categoris_id,
        ]);

        return redirect()-> route ('artikel.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel=Artikel::find($id);
            if(!$artikel){
                return redirect()->back();
            
            }
                Storage::delete($artikel->gambar);
                $artikel->delete();      
                return redirect()->route('artikel.index');    
    }
}
