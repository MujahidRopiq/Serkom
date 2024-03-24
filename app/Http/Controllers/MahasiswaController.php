<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request )
    {
        $orderBy = 'nim';
        $order = 'desc';
    
        if ($request->has('search')) {
            // get query search
            $searchQuery = $request->input('search');
    
            // cari berdasarkan nim menggunakan like operator
            $mahasiswa = Mahasiswa::where('nim', 'like', "%$searchQuery%")
                ->orderBy($orderBy, $order)
                ->get();
        } else {
            // jika search tidak ada query maka munculkan semua
            $mahasiswa = Mahasiswa::orderBy($orderBy, $order)
                ->get();
        }
    
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //menuju ke halaman create mahasiswa 
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi data yang diperlukan
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'gender' => 'required',
        ]);

        // buat data mahasiswa baru di database
        Mahasiswa::create($validatedData);
        
        //menuju ke halaman index dengan notifikasi
        return redirect()->route('mahasiswa.index')->with('success', 'Item created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        // return view('Mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data= Mahasiswa::find($id);
        //menuju halaman edit mahasiswa dengan membawa data mahasiswa yang dituju
        return view('mahasiswa.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data= Mahasiswa::find($id);

        //validasi data yang diupdate
        $validatedData = $request->validate([
            'nama' => 'required',
            'gender' => 'required',
        ]);

        //melakukan update ke database
        $data->update($validatedData);

        //menuju ke halaman index dengan notifikasi
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //melakukan delete mahasiswa
        $data= Mahasiswa::find($id);
        $data->delete();
        //menuju ke halaman index dengan notifikasi
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa deleted successfully');
    }
    
}
