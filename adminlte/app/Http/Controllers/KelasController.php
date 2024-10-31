<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $table = 'table_kelases';

    public function index()
    {
        $kelases = Kelas::all();
        return view('kelases.index', [
            'kelases' => $kelases
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelases.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'id_kelas' => 'required|string',
            'nama_kelas' => 'required|string'
        ]);

        $array = $request->only([
            'id_kelas',
            'nama_kelas'
        ]);

        $kelas = Kelas::create($array);

        return redirect()->route('kelases.index')
            ->with('success_message', 'Berhasil menambah kelas baru');
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
        $kelas = Kelas::find($id);
        if (!$kelas) return redirect()->route('kelases.index')
            ->with('error_message', 'Kelas dengan id ' . $id . ' tidak ditemukan');
        return view('kelases.edit', [
            'kelas' => $kelas
        ]);
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
        // Validasi input
        $request->validate([
            'id_kelas' => 'required|string',
            'nama_kelas' => 'required'
        ]);

        // Cari kelas berdasarkan ID
        $kelas = Kelas::find($id);

        // Update field yang diterima dari form
        $kelas->id_kelas = $request->id_kelas;
        $kelas->nama_kelas = $request->nama_kelas;

        // Jika ada input password baru, update password
        if ($request->password) {
            $kelas->password = bcrypt($request->password);
        }

        // Simpan perubahan ke database
        $kelas->save();

        // Redirect dengan pesan sukses
        return redirect()->route('kelases.index')
            ->with('success_message', 'Berhasil mengubah kelas');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $kelas = Kelas::find($id);
        // if ($id == $request->Kelas()->id) return redirect()->route('kelases.index')
        //     ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        // if ($kelas) $kelas->delete();
        // return redirect()->route('kelases.index')
        //     ->with('success_message', 'Berhasil menghapus kelas');

            $kelas = Kelas::findOrFail($id);
            $kelas->delete();
    
            return redirect()->route('kelases.index')->with('success', 'kelas deleted successfully.');
    
    }
}
