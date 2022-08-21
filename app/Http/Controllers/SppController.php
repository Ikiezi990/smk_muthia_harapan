<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $data['title'] = "Spp Kelas";
        $data['data'] =  Kelas::all();
        return view('admin.spp.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                $data['kelas'] = Kelas::all();
        $data['title'] = "Spp";
        return view('admin.spp.add', $data);
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
            'nama_spp' => 'required',
            'id_kelas' => 'required',
            'tot_bayar' => 'required',
        ]);


        $details = [
            'nama_spp' => $request->nama_spp,
            'id_kelas' => $request->id_kelas,
            'tot_bayar' => $request->tot_bayar,
        ];

        Spp::create($details);
        notify()->success('Data Spp Berhasil Di Tambah');
        return redirect(route('spps.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function show($spp)
    {
        $data['title'] = "Spp";
        $data['data'] = Spp::where('id_kelas', $spp)->get();
        $data['kelas'] =  Spp::all();
        return view('admin.spp.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function edit($spp)
    {
            $data['title'] = "Spp";
        $data['data'] = Spp::where('id', $spp)->first();
        $data['kelas'] =  Kelas::all();
        return view('admin.spp.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $spp)
    {
      request()->validate([
            'nama_spp' => 'required',
            'id_kelas' => 'required',
            'tot_bayar' => 'required',
        ]);


        $details = [
            'nama_spp' => $request->nama_spp,
            'id_kelas' => $request->id_kelas,
            'tot_bayar' => $request->tot_bayar,
        ];

        Spp::where('id', $spp)->update($details);
        notify()->success('Data Spp Berhasil Di Update');
        return redirect(route('spps.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Spp  $spp
     * @return \Illuminate\Http\Response
     */
    public function destroy($spp)
    {
        notify()->success('Data Spp Berhasil Di Hapus');
        Spp::where('id', $spp)->delete();
        return redirect(route('siswass.index'));
    }
}
