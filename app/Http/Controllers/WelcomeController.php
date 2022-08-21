<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Prestasi;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\TransaksiSpp;

class WelcomeController extends Controller
{
    public $data;
    public function __construct()
    {
        $this->getData();
    }
    public function getData()
    {
        $this->data['banner'] = Banner::paginate(8);
        $this->data['berita'] = Berita::paginate(8);
        $this->data['prestasi'] = Prestasi::paginate(8);
        $this->data['jurusan'] = Jurusan::paginate(2);
        $this->data['prestasi'] = Prestasi::all();
        $this->data['siswa'] = Siswa::all();
        $this->data['guru'] = Guru::all();

        $this->data['kelas'] = Kelas::all();
        $this->data['title'] = "SMK MUTHIA HARAPAN CICALENGKA";
    }
    public function index()
    {
        return view('welcome', $this->data);
    }
    public function berita()
    {
        return view('berita', $this->data);
    }
    public function findBerita($id){
        $data['data'] = Berita::where('id', $id)->first();

    }
    public function findPrestasi($id){
        $data['data'] = Prestasi::where('id', $id)->first();

    }
    public function findSpp($nis){
        $data['data'] = Siswa::where('nis', $nis)->first();
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

      return view('spp', $data);

    }
    public function prestasi()
    {
        return view('prestasi', $this->data);
    }
    public function visi()
    {
        return view('visi_misi', $this->data);
    }
    public function fasilitas()
    {
        return view('fasilitas', $this->data);
    }
}
