<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::latest()->paginate(10);

        return view('produks.index', compact('produks'))->with('i',(request()->input('page',1) -1) *10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'item' => 'required',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'lbahan' => 'required',
            'routing' => 'required',
            'kg' => 'required',
            'drawing' => 'required|mimes:pdf',
        ]);

        $nproduk = new Produk;
        $nproduk->item = $request->item;
        $nproduk->deskripsi = $request->deskripsi;
        $nproduk->bahan = $request->bahan;
        $nproduk->lbahan = $request->lbahan;
        $nproduk->routing = $request->routing;
        $nproduk->kg = $request->kg;

        $gambar = time().'.'.$request->drawing->getClientOriginalExtension();
        $request->drawing->move(public_path('draw_produk'), $gambar);
        $nproduk->drawing = $gambar;

        $nproduk->save();

        return redirect()->route('produks.index')->with('succcess', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::findorfail($id);

        return view('produks\detail', ['produk' => $produk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'item' => 'required',
            'deskripsi' => 'required',
            'bahan' => 'required',
            'lbahan' => 'required',
            'routing' => 'required',
            'kg' => 'required',
            // 'drawing' => 'required|mimes:pdf',
        ]);

        $uproduk = Produk::findorfail($id);

        $uproduk->item = $request->input('item');
        $uproduk->deskripsi = $request->input('deskripsi');
        $uproduk->bahan = $request->input('bahan');
        $uproduk->lbahan = $request->input('lbahan');
        $uproduk->routing = $request->input('routing');
        $uproduk->kg = $request->input('kg');

        if($request->hasFile('drawing')){
            if($uproduk->drawing){
                Storage::disk('public')->delete('draw_produk/'.$uproduk->drawing);
            }
            $gambar = $request->file('drawing')->store('draw_produk','public');
            $uproduk->drawing = basename($gambar);
        }

        $uproduk->save();

        return redirect()->route('produks.index')->with('succcess', 'Produk berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dproduk = Produk::findorfail($id);

        if($dproduk->drawing){
            $imagePath = public_path('draw_produk/'.$dproduk->drawing);
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }

        $dproduk->delete();

        return redirect()->route('produks.index')->with('delete','Data produk berhasil dihapus');
    }
}
