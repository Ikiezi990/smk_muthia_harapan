<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Berita";
        $data['data'] =  Berita::all();
        return view('admin.berita.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Berita";
        return view('admin.berita.add', $data);
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul_berita' => 'required',
            'isi_berita' => 'required',
        ]);


        $details = [
            'judul_berita' => $request->judul_berita,
            'isi_berita' => $request->isi_berita,
            'id_user' => auth()->user()->id,
        ];

        if ($files = $request->file('image')) {
            $destinationPath = 'berita';
            $beritaImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $beritaImage);
            $details['path'] = "$beritaImage";
        }

        $product   = Berita::create($details);
        notify()->success('Data Berita Berhasil Di Tambah');
        return redirect(route('beritas.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Berita::where('id',$id)->first();
        $data['title'] = "Berita";
        return view('admin.berita.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Berita::where('id',$id)->first();
        $data['title'] = "Berita";
        return view('admin.berita.edit', $data);
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul_berita' => 'required',
            'isi_berita' => 'required',
        ]);


        $details = [
            'judul_berita' => $request->judul_berita,
            'isi_berita' => $request->isi_berita,
            'id_user' => auth()->user()->id,
        ];

        if ($files = $request->file('image')) {
            $destinationPath = 'berita';
            $beritaImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $beritaImage);
            $details['path'] = "$beritaImage";
        }

        $product   = Berita::where('id',$id)->update($details);
        notify()->success('Data Berita Berhasil Di Update');
        return redirect(route('beritas.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Berita::where('id',$id)->delete();
       notify()->success('Data Berita Berhasil Di Hapus');
       return redirect(route('beritas.index'));
    }
}
