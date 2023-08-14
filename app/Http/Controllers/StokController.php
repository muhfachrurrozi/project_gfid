<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stoks = Stok::latest()->paginate(10);

        return view('stoks.index',compact('stoks'))
        ->with('i', (request()->input('page', 1) -1) *10);
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
            'dept' => 'required',
            'pic' => 'required',
            'deskripsi' => 'required',
            'size' => 'required',
            'qty' => 'required',
            'mesin' => 'required',
            'lokasi' => 'required',
            'remak' => 'required',
            'poto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $nstok = new Stok;


        $nstok->dept = $request->get('dept');
        $nstok->pic = $request->get('pic');
        $nstok->deskripsi = $request->get('deskripsi');
        $nstok->size = $request->get('size');
        $nstok->qty = $request->get('qty');
        $nstok->mesin = $request->get('mesin');
        $nstok->lokasi = $request->get('lokasi');
        $nstok->remak = $request->get('remak');

        $fileName = time().'.'.$request->poto->getClientOriginalExtension();
        $request->poto->move(public_path('estok'),$fileName);
        $nstok->poto=$fileName;

        $nstok->save();

        return redirect()->route('stoks.index')->with('success', 'Stok Equitment berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $stok = Stok::findorfail($id);

        return view('stoks\detail',['stok'=>$stok]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
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
            'pic' => 'required',
            'deskripsi' => 'required',
            'size' => 'required',
            'qty' => 'required',
            'mesin' => 'required',
            'lokasi' => 'required',
            'remak' => 'required',
        ]);

        $ustok = Stok::findorfail($id);

        $ustok->pic = $request->get('pic');
        $ustok->deskripsi = $request->get('deskripsi');
        $ustok->size = $request->get('size');
        $ustok->qty = $request->get('qty');
        $ustok->mesin = $request->get('mesin');
        $ustok->lokasi = $request->get('lokasi');
        $ustok->remak = $request->get('remak');

        // Periksa apakah ada file gambar yang diunggah
        if($request->hasFile('poto')){

            $fileName = time().'.'.$request->poto->getClientOriginalName();

            $request->poto->move(public_path('estok'),$fileName);

            // Hapus poto lama jika ada
            if($ustok->poto){
                $oldImagePath = public_path('estok/'.$ustok->poto);
                if(file_exists($oldImagePath)){
                    unlink($oldImagePath);
                }
            }

            $ustok->poto = $fileName;
        }

        $ustok->save();

        return redirect()->route('stoks.show',[$id])->with('success', 'Stok Equitment berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dstok = Stok::findOrFail($id);

        if($dstok->poto){
            $imagePath = public_path('estok/'.$dstok->poto);
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }

        $dstok->delete();

        return redirect()->route('stoks.index')->with('delete', 'Stok berhasil dihapus!');
    }
}
