<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'))
        ->with('i', (request()->input('page',1) -1) *10);
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
            'cs_name' => 'required',
            'cs_email' => 'required',
            'cs_phone' => 'required',
            'cs_alamat' => 'required',
            'cs_pax' => 'required',
        ]);

        $nCs = new Customer;

        $nCs->cs_name = $request->get('cs_name');
        $nCs->cs_email = $request->get('cs_email');
        $nCs->cs_phone = $request->get('cs_phone');
        $nCs->cs_alamat = $request->get('cs_alamat');
        $nCs->cs_pax = $request->get('cs_pax');

        $nCs->save();

        return redirect()->route('customers.index')->with('success', 'Customer berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cs = Customer::findorfail($id);

        return view('customers.detail',['cs' =>$cs]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'cs_name' => 'required',
            'cs_email' => 'required',
            'cs_phone' => 'required',
            'cs_alamat' => 'required',
            'cs_pax' => 'required',
        ]);

        $uCs = Customer::findorfail($id);

        $uCs->cs_name = $request->get('cs_name');
        $uCs->cs_email = $request->get('cs_email');
        $uCs->cs_phone = $request->get('cs_phone');
        $uCs->cs_alamat = $request->get('cs_alamat');
        $uCs->cs_pax = $request->get('cs_pax');

        $uCs->save();

        return redirect()->route('customers.index')->with('success', 'Customer berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dCs = Customer::findorfail($id);

        $dCs->delete();

        return redirect()->route('customers.index')->with('delete', 'Customer berhasil dihapus');
    }
}