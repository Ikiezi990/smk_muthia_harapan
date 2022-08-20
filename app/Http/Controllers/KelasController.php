<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\Guru;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Kelas";
        $data['data'] =  Kelas::all();
        return view('admin.kelas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Kelas";
        $data['jurusan'] =  Jurusan::all();
        $data['guru'] =  Guru::all();
        $data['angkatan'] =  Angkatan::all();
        return view('admin.kelas.add', $data);
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
            'nama_kelas' => 'required',
            'id_guru' => 'required',
            'id_angkatan' => 'required',
            'id_jurusan' => 'required',
        ]);


        $details = [
            'nama_kelas' => $request->nama_kelas,
            'id_guru' => $request->id_guru,
            'id_jurusan' => $request->id_jurusan,
            'id_angkatan' => $request->id_angkatan,
        ];

        Kelas::create($details);
        notify()->success('Data Kelas Berhasil Di Tambah');
        return redirect(route('kelass.index'));
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
        $data['title'] = "Kelas";
        $data['jurusan'] =  Jurusan::all();
        $data['data'] = Kelas::where('id', $id)->first();
        $data['guru'] =  Guru::all();
        $data['angkatan'] =  Angkatan::all();
        return view('admin.kelas.edit', $data);
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
            'nama_kelas' => 'required',
            'id_guru' => 'required',
            'id_angkatan' => 'required',
            'id_jurusan' => 'required',
        ]);


        $details = [
            'nama_kelas' => $request->nama_kelas,
            'id_guru' => $request->id_guru,
            'id_jurusan' => $request->id_jurusan,
            'id_angkatan' => $request->id_angkatan,
        ];

        Kelas::where('id', $id)->update($details);
        notify()->success('Data Kelas Berhasil Di Update');
        return redirect(route('kelass.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
