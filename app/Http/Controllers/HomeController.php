<?php

namespace App\Http\Controllers;

use App\Models\Banner as ModelsBanner;
use App\Models\Berita;
use App\Models\Guru;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Prestasi;
use App\Models\Siswa;
use Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

        public $data;
    public function __construct()
    {
        $this->middleware('auth');
        $this->getData();
    }
    public function getData()
    {
        $this->data['banner'] = ModelsBanner::all();
        $this->data['berita'] = Berita::all();
        $this->data['prestasi'] = Prestasi::all();
        $this->data['jurusan'] = Jurusan::all();
        $this->data['siswa'] = Siswa::all();
        $this->data['guru'] = Guru::all();
        $this->data['jurusan'] = Guru::all();
        $this->data['kelas'] = Kelas::all();
        $this->data['title'] = "SMK MUTHIA HARAPAN CICALENGKA";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['title'] = "Dashboard Admin";
        return view('home', $this->data);
    }
}
