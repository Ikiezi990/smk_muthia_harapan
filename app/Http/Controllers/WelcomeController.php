<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Prestasi;
use App\Models\Berita;
use App\Models\Jurusan;

class WelcomeController extends Controller
{
    public $data;
    public function __construct()
    {
        $this->getData();
    }
    public function getData()
    {
        $this->data['banner'] = Banner::all();
        $this->data['berita'] = Berita::all();
        $this->data['prestasi'] = Prestasi::all();
        $this->data['jurusan'] = Jurusan::all();
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
