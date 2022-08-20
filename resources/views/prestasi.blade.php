@extends('layouts.app')
@section('content')
<section class="prestasi" style="background-color:#eeee ">
    <center>
        <hr style="border:3px #3FA796 solid;width: 250px;">
    </center>
    <h3 class="text-center">Prestasi Kami</h3>
    <center>
        <hr style="border:3px #3FA796 solid;width:250px;">
    </center>
    <div class="container">
        <div class="row">
            @foreach ($prestasi as $prestasiRow)

            <div class="col-md-3 mt-4">
                <div class="card">
                    <img class="card-img-top" src="{{ asset('prestasi/'. $prestasiRow->path ) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center">{{ $prestasiRow->judul_prestasi }}</h5>
                        <div style="height:73px;overflow:hidden;">

                            <p class="card-text" style="text-align:center;">{!! $prestasiRow->isi_prestasi !!}</p>
                        </div>
                        <center>
                            <hr>
                            <p class="card-text" style="text-align:center;"><b>Author : {{ $prestasiRow->user->name  }}</b> </p>
                            <p class="card-text" style="text-align:center;"><b>Tgl. : {{ $prestasiRow->updated_at  }}</b> </p>
                            <a href="#" class="btn btn-danger" style="background-color: #A10035;">Lihat Prestasi</a>
                        </center>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection