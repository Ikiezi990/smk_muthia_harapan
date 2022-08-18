<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
class PrestasiController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Prestasi";
        $data['data'] =  Prestasi::all();
        return view('admin.prestasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah prestasi";
        return view('admin.prestasi.add', $data);
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
            'judul_prestasi' => 'required',
            'isi_prestasi' => 'required',
        ]);


        $details = [
            'judul_prestasi' => $request->judul_prestasi,
            'isi_prestasi' => $request->isi_prestasi,
            'id_user' => auth()->user()->id,
        ];

        if ($files = $request->file('image')) {
            $destinationPath = 'prestasi';
            $prestasiImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $prestasiImage);
            $details['path'] = "$prestasiImage";
        }

        $product   = Prestasi::create($details);
        notify()->success('Data prestasi Berhasil Di Tambah');
        return redirect(route('prestasis.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Prestasi::where('id',$id)->first();
        $data['title'] = "Prestasi";
        return view('admin.prestasi.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Prestasi::where('id',$id)->first();
        $data['title'] = "Prestasi";
        return view('admin.prestasi.edit', $data);
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
            'judul_prestasi' => 'required',
            'isi_prestasi' => 'required',
        ]);


        $details = [
            'judul_prestasi' => $request->judul_prestasi,
            'isi_prestasi' => $request->isi_prestasi,
            'id_user' => auth()->user()->id,
        ];

        if ($files = $request->file('image')) {
            $destinationPath = 'prestasi';
            $prestasiImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $prestasiImage);
            $details['path'] = "$prestasiImage";
        }

        $product   = Prestasi::where('id',$id)->update($details);
        notify()->success('Data prestasi Berhasil Di Update');
        return redirect(route('prestasis.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Prestasi::where('id',$id)->delete();
       notify()->success('Data prestasi Berhasil Di Hapus');
       return redirect(route('prestasis.index'));
    }
}
