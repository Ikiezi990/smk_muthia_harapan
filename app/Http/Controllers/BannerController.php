<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use File;
use Redirect, Response, DB;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Banner";
        $data['data'] =  Banner::all();
        return view('admin.banner.banner', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Tambah Banner";
        $data['data'] =  Banner::all();
        return view('admin.banner.addbanner', $data);
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
            'judul_banner' => 'required',
        ]);


        $details = [
            'judul_banner' => $request->judul_banner
        ];

        if ($files = $request->file('image')) {
            $destinationPath = 'banner';
            $bannerImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $bannerImage);
            $details['path'] = "$bannerImage";
        }

        $product   = Banner::insert($details);
        notify()->success('Data Banner Berhasil Di Tambah');
        return redirect(route('banners.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['data'] = Banner::where('id',$id)->first();
        $data['title'] = "Banner";
        return view('admin.banner.detailbanner', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data['data'] = Banner::where('id',$id)->first();
        $data['title'] = "Banner";
        return view('admin.banner.editbanner', $data);
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
            'judul_banner' => 'required',
        ]);


        $details = [
            'judul_banner' => $request->judul_banner
        ];

        if ($files = $request->file('image')) {
            $destinationPath = 'banner';
            $bannerImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $bannerImage);
            $details['path'] = "$bannerImage";
        }

        $product   = Banner::where('id',$id)->update($details);
        notify()->success('Data Banner Berhasil Di Update');
        return redirect(route('banners.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Banner::where('id',$id)->delete();
       notify()->success('Data Banner Berhasil Di Hapus');
       return redirect(route('banners.index'));
    }
}
