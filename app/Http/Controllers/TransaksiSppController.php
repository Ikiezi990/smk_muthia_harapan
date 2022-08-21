<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\TransaksiSpp;
use Illuminate\Support\Facades\DB;

class TransaksiSppController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Spp Siswa Kelas";
        $data['data'] =  Kelas::all();
        return view('admin.transaksi_spp.index
        ', $data);
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
        $data['title'] = "Spp Siswa Kelas " . $judul_kelas . $kelas->nama_kelas . "-" . $kelas->angkatan->nama_angkatan;
        $data['data'] =  Siswa::where('id_kelas', $id)->get();
        $data['spp'] =  DB::select("select sum(tot_bayar) as unpaid from spps where id_kelas='$id' Group By id_kelas limit 1");


        return view('admin.transaksi_spp.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Siswa::where('id', $id)->first();
        $kelas = Kelas::where('id',$data['data']->id )->first();
        if ((date('Y') - $kelas->angkatan->nama_angkatan) == 0) {
            $judul_kelas = "X-";
        } elseif ((date('Y') - $kelas->angkatan->nama_angkatan) == 1) {
            $judul_kelas = "XI-";
        } elseif ((date('Y') - $kelas->angkatan->nama_angkatan) == 2) {
            $judul_kelas = "XII-";
        } else {
            $judul_kelas = "Alumni-";
        }
        $data['title'] = "Detail Spp "."<br><small>". $data['data']->nama. "(".  $judul_kelas.$kelas->nama_kelas."-".$kelas->angkatan->nama_angkatan .")</small>";
        $data['kelas'] =  Kelas::all();
        return view('admin.transaksi_spp.edit', $data);
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
            'id_spp' => 'required',
        ]);




        $details = [
            'id_spp' => $request->id_spp,
            'id_siswa' => $id,
        ];
        TransaksiSpp::insert($details);
        notify()->success('Data Transaksi Spp Di Update');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TransaksiSpp::where('id', $id)->delete();
        notify()->success('TransaksiSpp Berhasil Di Cancel');
        return redirect()->back();
    }
    public function invoice($id){
        $data['data'] = Siswa::where('id', $id)->first();
        $kelas = Kelas::where('id',$data['data']->id )->first();
        if ((date('Y') - $kelas->angkatan->nama_angkatan) == 0) {
            $judul_kelas = "X-";
        } elseif ((date('Y') - $kelas->angkatan->nama_angkatan) == 1) {
            $judul_kelas = "XI-";
        } elseif ((date('Y') - $kelas->angkatan->nama_angkatan) == 2) {
            $judul_kelas = "XII-";
        } else {
            $judul_kelas = "Alumni-";
        }
        $data['title'] = "Invoice Spp "."<br><small>". $data['data']->nama. "(".  $judul_kelas.$kelas->nama_kelas."-".$kelas->angkatan->nama_angkatan .")</small>";
        $data['kelas'] =  Kelas::all();

      return view('admin.transaksi_spp.invoices', $data);
    }
}
