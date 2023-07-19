<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('users.index',compact('users'))
        ->with('i', (request()->input('page', 1) -1) *10);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('users\create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'dept' => 'required',
            'jabatan' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
            'poto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = new User;


        $user->nik = $request->get('nik');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->dept = $request->get('dept');
        $user->jabatan = $request->get('jabatan');
        $user->telepon = $request->get('telepon');
        $user->alamat = $request->get('alamat');

        $fileName = time().'.'.$request->poto->getClientOriginalExtension();
        $request->poto->move(public_path('avatar'),$fileName);
        $user->poto=$fileName;

        $user->save();

        return redirect()->route('users.index')->with('input', 'Karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('users\detail',['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nik' => 'required|unique:users',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'dept' => 'required',
            'jabatan' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::findOrFail($id);


        $user->nik = $request->get('nik');
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->dept = $request->get('dept');
        $user->jabatan = $request->get('jabatan');
        $user->telepon = $request->get('telepon');
        $user->alamat = $request->get('alamat');

        // Periksa apakah ada file gambar yang diunggah
        if($request->hasFile('poto')){
            // validasi Poto
            $request->validate([
            'poto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $fileName = time().'.'.$request->poto->getClientOriginalName();

            $request->poto->move(public_path('avatar'),$fileName);

            // Hapus poto lama jika ada
            if($user->poto){
                $oldImagePath = public_path('avatar/'.$user->poto);
                if(file_exists($oldImagePath)){
                    unlink($oldImagePath);
                }
            }

            $user->poto = $fileName;
        }

        $user->save();

        return redirect()->route('users.show', [$id])->with('edit', 'Karyawan berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if($user->poto){
            $imagePath = public_path('avatar/'.$user->poto);
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }

        $user->delete();

        return redirect()->route('users.index')->with('delete', 'User berhasil dihapus!');
    }
}
