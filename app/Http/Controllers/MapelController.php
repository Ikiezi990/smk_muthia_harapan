<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Mapel";
        $data['data'] =  Mapel::all();
        return view('admin.mapel.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Mapel";
        return view('admin.mapel.add', $data);
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
            'nama_mapel' => 'required',
            'kategori_mapel' => 'required',
        ]);


        $details = [
            'nama_mapel' => $request->nama_mapel,
            'kategori_mapel' => $request->kategori_mapel,
        ];

        Mapel::create($details);
        notify()->success('Data mapel Berhasil Di Tambah');
        return redirect(route('mapels.index'));
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
        $data['data'] = Mapel::where('id',$id)->first();
        $data['title'] = "Mapel";
        return view('admin.mapel.edit', $data);
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
            'nama_mapel' => 'required',
            'kategori_mapel' => 'required',
        ]);


        $details = [
            'nama_mapel' => $request->nama_mapel,
            'kategori_mapel' => $request->kategori_mapel,
        ];

        Mapel::where('id', $id)->update($details);
        notify()->success('Data mapel Berhasil Di Update');
        return redirect(route('mapels.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Guru::where('id_mapel', $id)->count()>0) {
            notify()->error('Data mapel Tidak Bisa Di Hapus');
            return redirect(route('mapels.index'));
        }else{
            Mapel::where('id',$id)->delete();
            notify()->success('Data mapel Berhasil Di Hapus');
            return redirect(route('mapels.index'));
        }

    }
}
