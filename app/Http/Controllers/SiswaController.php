<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Siswa Kelas";
        $data['data'] =  Kelas::all();
        return view('admin.siswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kelas'] = Kelas::all();
        $data['title'] = "Siswa";
        return view('admin.siswa.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nama_siswa' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'no_telp' => 'required',
            'id_kelas' => 'required',
            'image' => 'required',
        ]);




        $details = [
            'nama' => $request->nama_siswa,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'no_telp' => $request->no_telp,
            'id_kelas' => $request->id_kelas,
        ];
        if ($files = $request->file('image')) {
            $destinationPath = 'siswa';
            $siswaImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $siswaImage);
            $details['path'] = "$siswaImage";
        }
        Siswa::create($details);
        notify()->success('Data Siswa Berhasil Di Tambah');
        return redirect(route('siswass.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        if ((date('Y') - $kelas->angkatan->nama_angkatan) == 0) {
            $judul_kelas = "X-";
        } elseif ((date('Y') - $kelas->angkatan->nama_angkatan) == 1) {
            $judul_kelas = "XI-";
        } elseif ((date('Y') - $kelas->angkatan->nama_angkatan) == 2) {
            $judul_kelas = "XII-";
        } else {
            $judul_kelas = "Alumni-";
        }
        $data['title'] = "Siswa Kelas " . $judul_kelas . $kelas->nama_kelas . "-" . $kelas->angkatan->nama_angkatan;
        $data['data'] =  Siswa::where('id_kelas', $id)->get();
        return view('admin.siswa.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = "Siswa";
        $data['data'] = Siswa::where('id', $id)->first();
        $data['kelas'] =  Kelas::all();
        return view('admin.siswa.edit', $data);
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
        request()->validate([
            'nama_siswa' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'no_telp' => 'required',
            'id_kelas' => 'required',
            'image' => 'required',
        ]);




        $details = [
            'nama' => $request->nama_siswa,
            'nis' => $request->nis,
            'nisn' => $request->nisn,
            'no_telp' => $request->no_telp,
            'id_kelas' => $request->id_kelas,
        ];
        if ($files = $request->file('image')) {
            $destinationPath = 'siswa';
            $siswaImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $siswaImage);
            $details['path'] = "$siswaImage";
        }
        Siswa::where('id', $id)->update($details);
        notify()->success('Data Siswa Berhasil Di Update');
        return redirect(route('siswass.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        notify()->success('Data Siswa Berhasil Di Hapus');
        Siswa::where('id', $id)->delete();
        return redirect(route('siswass.index'));
    }
}
