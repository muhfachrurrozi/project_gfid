<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesins = Mesin::latest()->paginate(10);

        $cek = Mesin::count();
        if($cek == 0){
            $asetAwal = 111001;
            $autoAset = 'F-'.$asetAwal;
        }else{
            $ambil = Mesin::all()->last();
            $berAset = (int)substr($ambil->aset, -6) + 1;
            $autoAset = 'F-'.$berAset;
        }
        return view('mesins.index',compact('mesins', 'autoAset'))
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
        $request->validate([
            'aset' => 'required|unique:mesins',
            'name' => 'required',
            'label' => 'required',
            'spek' => 'required',
            'wi' => 'required|mimes:pdf',
        ]);

        $nmesin = new Mesin;
        $nmesin->aset = $request->aset;
        $nmesin->name = $request->name;
        $nmesin->label = $request->label;
        $nmesin->spek = $request->spek;

        $pdf_wi = time().'.'.$request->wi->getClientOriginalExtension();
        $request->wi->move(public_path('pdfs_wi'), $pdf_wi);
        $nmesin->wi = $pdf_wi;

        $nmesin->save();

        return redirect()->route('mesins.index')
                ->with('Succcess', 'Mesin berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mesin = Mesin::findOrFail($id);

        return view('mesins.detail',['mesin' => $mesin]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mesin $mesin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'aset' => 'required|unique:mesins,aset,'.$id,
            'name' => 'required',
            'label' => 'required',
            'spek' => 'required',
            'pdf_wi' => 'nullable|mimes:pdf|max:2048', // Optional: Validasi file PDF jika diunggah
        ]);

        $umesin = Mesin::findOrFail($id);

        $umesin->aset = $request->input('aset');
        $umesin->name = $request->input('name');
        $umesin->label = $request->input('label');
        $umesin->spek = $request->input('spek');

        if ($request->hasFile('pdf_wi')) {
            // Hapus file PDF lama jika ada
            if ($umesin->wi) {
                Storage::disk('public')->delete('pdfs_wi/' . $umesin->wi);
            }

            // Unggah file PDF baru
            $pdf_wi = $request->file('pdf_wi')->store('pdfs_wi', 'public');
            $umesin->wi = basename($pdf_wi);
        }

        $umesin->save();

        return redirect()->route('mesins.index')->with('success', 'Data mesin berhasil diperbarui.');
        // dd($request->all());
        // $request->validate([
        //     'aset' => 'required|unique:mesins',
        //     'name' => 'required',
        //     'label' => 'required',
        //     'spek' => 'required',
        //     'wi' => 'required|mimes:pdf',
        // ]);

        // $umesin = Mesin::findOrFail($id);

        // $umesin->aset = $request->get('aset');
        // $umesin->name = $request->get('name');
        // $umesin->label = $request->get('label');
        // $umesin->spek = $request->get('spek');

        // if($request->hasfile('wi')){
        //     $pdf_wi = time().'.'.$request->wi->getClientOriginalExtension();
        //     $request->wi->move(public_path('pdfs_wi'), $pdf_wi);

        //     if($umesin->wi){
        //         $oldPdf = public_path('pdfs_wi/'.$umesin->wi);
        //         if(file_exists($oldPdf)){
        //             unlink($oldPdf);
        //         }
        //     }
        //     $umesin->wi = $pdf_wi;
        // }

        // $umesin->save();

        // return redirect()->route('mesins.index')
        //         ->with('succcess', 'Mesin berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dmesin = Mesin::findOrFail($id);

        if($dmesin->wi){
            $imagePath = public_path('pdfs_wi/'.$dmesin->wi);
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }

        $dmesin->delete();

        return redirect()->route('mesins.index')->with('delete', 'Data Mesin berhasil dihapus!');
    }
}