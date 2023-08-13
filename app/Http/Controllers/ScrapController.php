<?php

namespace App\Http\Controllers;

use App\Models\Scrap;
use Illuminate\Http\Request;

class ScrapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scraps = Scrap::all();

        return view('scraps.index', compact('scraps'))->with('i', (request()->input('page',1) -1) *10);
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
            'name' => 'required',
            'shift' => 'required',
            'kg' => 'required',
            'so' => 'required',
            'karung' => 'required',
        ]);

        $nscrap = new Scrap;

        $nscrap->name = $request->get('name');
        $nscrap->shift = $request->get('shift');
        $nscrap->kg = $request->get('kg');
        $nscrap->so = $request->get('so');
        $nscrap->karung = $request->get('karung');

        $nscrap->save();

        return redirect()->route('scraps.index')->with('success', 'Scrap Fabrikasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $scrap = Scrap::findorfail($id);

        return view('scraps.detail',['scrap' => $scrap]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Scrap $scrap)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'shift' => 'required',
            'kg' => 'required',
            'so' => 'required',
            'karung' => 'required',
        ]);

        $nscrap = Scrap::findorfail($id);

        $nscrap->name = $request->get('name');
        $nscrap->shift = $request->get('shift');
        $nscrap->kg = $request->get('kg');
        $nscrap->so = $request->get('so');
        $nscrap->karung = $request->get('karung');

        $nscrap->save();

        return redirect()->route('scraps.index')->with('success', 'Scrap Fabrikasi berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dscrap = Scrap::findorfail($id);

        $dscrap->delete();

        return redirect()->route('scraps.index')->with('delete', 'Scrap berhasil dihapus');
    }
}
