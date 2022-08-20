@extends('layouts.app')
@section('content')
<section class="prestasi">
    <center>
        <hr style="border:3px #3FA796 solid;width: 250px;">
    </center>
    <h3 class="text-center">Berita Terbaru</h3>
    <center>
        <hr style="border:3px #3FA796 solid;width:250px;">
    </center>
    <div class="container">

        <div class="row">
            @foreach ($berita as $beritaRow)

            <div class="col-md-3 mt-3">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('berita/'. $beritaRow->path ) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">{{ $beritaRow->judul_berita }}</h5>
                        <div style="height:73px;overflow:hidden;">

                            <p class="card-text" style="text-align:center;">{!! $beritaRow->isi_berita !!}</p>
                        </div>
                        <center>
                            <hr>
                            <p class="card-text" style="text-align:center;"><b>Author : {{ $beritaRow->user->name  }}</b> </p>
                            <p class="card-text" style="text-align:center;"><b>Tgl. : {{ $beritaRow->updated_at  }}</b> </p>
                            <a href="#" class="btn btn-danger" style="background-color: #A10035;">Baca Berita</a>
                        </center>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

@endsection