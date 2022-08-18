<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mapel;
use DB;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Guru";
        $data['data'] =  Guru::select("*", DB::raw("count(*) as total_guru"))->groupBy('id_mapel')->get();
        return view('admin.guru.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['mapel'] = Mapel::all();
        $data['title'] = "Tambah Data Guru";
        return view("admin.guru.add", $data);
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|required',
            'nama' => 'required',
            'id_card' => 'required',
            'jenis_kelamin' => 'required',
            'id_mapel' => 'required',
        ]);


        $details = [
            'nama' => $request->nama,
            'nip' => $request->nip,
            'id_card' => $request->id_card,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_mapel' => $request->id_mapel,
        ];

        if ($files = $request->file('image')) {
            $destinationPath = 'guru';
            $guruImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $guruImage);
            $details['path'] = "$guruImage";
        }

        $product   = Guru::create($details);
        notify()->success('Data guru Berhasil Di Tambah');
        return redirect(route('gurus.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data['data'] = Guru::where('id_mapel',$id)->get();
        $mapel = Mapel::where('id',$id)->first();
        $data['title'] = "Guru ". $mapel->nama_mapel;
        return view('admin.guru.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
               $data['mapel'] = Mapel::all();
        $data['data'] = Guru::where('id',$id)->first();
        $data['title'] = "Edit Guru";
        return view('admin.guru.edit', $data);
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|required',
            'nama' => 'required',
            'id_card' => 'required',
            'jenis_kelamin' => 'required',
            'id_mapel' => 'required',
        ]);


        $details = [
            'nama' => $request->nama,
            'nip' => $request->nip,
            'id_card' => $request->id_card,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_mapel' => $request->id_mapel,
        ];

        if ($files = $request->file('image')) {
            $destinationPath = 'guru';
            $guruImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $guruImage);
            $details['path'] = "$guruImage";
        }

        $product   = Guru::where('id',$id)->update($details);
        notify()->success('Data update Berhasil Di Tambah');
        return redirect(route('gurus.show',$request->id_mapel));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product   = Guru::where('id',$id)->first();
      $id_mapel = $product->id_mapel;
        $product->delete();
        notify()->success('Data update Berhasil Di Hapus');
        return redirect(route('gurus.show',$id_mapel));
    }
}
