<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;
class JurusanController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "jurusan";
        $data['data'] =  Jurusan::all();
        return view('admin.jurusan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah jurusan";
        return view('admin.jurusan.add', $data);
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
            'judul_jurusan' => 'required',
            'isi_jurusan' => 'required',
        ]);


        $details = [
            'judul_jurusan' => $request->judul_jurusan,
            'isi_jurusan' => $request->isi_jurusan,
            'id_user' => auth()->user()->id,
        ];

        if ($files = $request->file('image')) {
            $destinationPath = 'jurusan';
            $jurusanImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $jurusanImage);
            $details['path'] = "$jurusanImage";
        }

        $product   = Jurusan::create($details);
        notify()->success('Data jurusan Berhasil Di Tambah');
        return redirect(route('jurusans.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Jurusan::where('id',$id)->first();
        $data['title'] = "jurusan";
        return view('admin.jurusan.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['data'] = Jurusan::where('id',$id)->first();
        $data['title'] = "jurusan";
        return view('admin.jurusan.edit', $data);
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
            'judul_jurusan' => 'required',
            'isi_jurusan' => 'required',
        ]);


        $details = [
            'judul_jurusan' => $request->judul_jurusan,
            'isi_jurusan' => $request->isi_jurusan,
            'id_user' => auth()->user()->id,
        ];

        if ($files = $request->file('image')) {
            $destinationPath = 'jurusan';
            $jurusanImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $jurusanImage);
            $details['path'] = "$jurusanImage";
        }

        $product   = Jurusan::where('id',$id)->update($details);
        notify()->success('Data jurusan Berhasil Di Update');
        return redirect(route('jurusans.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Jurusan::where('id',$id)->delete();
       notify()->success('Data jurusan Berhasil Di Hapus');
       return redirect(route('jurusans.index'));
    }
}
