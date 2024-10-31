<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $table = 'table_siswas';

    public function index()
    {
        $siswas = Siswa::all();
        return view('siswas.index', [
            'siswas' => $siswas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siswas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required|numeric|unique:siswas,nis',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|string',
            'id_kelas' => 'required|string'
        ]);

        $array = $request->only([
            'nama_siswa',
            'nis',
            'jenis_kelamin',
            'tanggal_lahir',
            'id_kelas'
        ]);

        $siswa = Siswa::create($array);

        return redirect()->route('siswas.index')
            ->with('success_message', 'Berhasil menambah siswa baru');
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
        $siswa = Siswa::find($id);
        if (!$siswa) return redirect()->route('siswas.index')
            ->with('error_message', 'Siswa dengan id ' . $id . ' tidak ditemukan');
        return view('siswas.edit', [
            'siswa' => $siswa
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
            'nama_siswa' => 'required',
            'nis' => 'required|numeric|unique:siswas,nis,' . $id,  // Pastikan NIS unik, kecuali untuk record saat ini
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|string',
            'id_kelas' => 'required|string'
        ]);

        // Cari siswa berdasarkan ID
        $siswa = Siswa::find($id);

        // Update field yang diterima dari form
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->nis = $request->nis;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->id_kelas = $request->id_kelas;

        // Jika ada input password baru, update password
        if ($request->password) {
            $siswa->password = bcrypt($request->password);
        }

        // Simpan perubahan ke database
        $siswa->save();

        // Redirect dengan pesan sukses
        return redirect()->route('siswas.index')
            ->with('success_message', 'Berhasil mengubah siswa');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        // $siswa = Siswa::find($id);
        // if ($id == $request->siswa()->id) return redirect()->route('siswas.index')
        //     ->with('error_message', 'Anda tidak dapat menghapus diri sendiri.');
        // if ($siswa) $siswa->delete();
        // return redirect()->route('siswas.index')
        //     ->with('success_message', 'Berhasil menghapus siswa');
        $siswa = Siswa::findOrFail($id);
            $siswa->delete();
    
            return redirect()->route('siswas.index')->with('success', 'siswa deleted successfully.');
    }
}
