@extends('layouts.app')
@section('content')
<section class="banner">
    <div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                $count = 1;
                @endphp
                @foreach ($banner as $rowBanner)
                @if ($count == 1)
                <div class="carousel-item active">
                    <img src="{{ asset('banner/' . $rowBanner->path) }}" class="d-block w-100" alt="https://www.nicesnippets.com/upload/bootstrap-4-header-section-with-background-banner-design-code.png">
                </div>
                @else
                <div class="carousel-item">
                    <img src="{{ asset('banner/' . $rowBanner->path) }}" class="d-block w-100" alt="https://www.nicesnippets.com/upload/bootstrap-4-header-section-with-background-banner-design-code.png">
                </div>
                @endif
                @php
                $count++;
                @endphp
                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark" aria-hidden="true" style="background-color:goldenrod 5px solid"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>


<section class="jurusan">
    <center>
        <hr style="border:3px #3FA796 solid;width: 250px;">
    </center>
    <h3 class="text-center">Jurusan</h3>
    <center>
        <hr style="border:3px #3FA796 solid;width:250px;">
    </center>
    <div class="container mt-3">
        <div class="row">
            @php
            $count=1;
            @endphp
            @foreach ($jurusan as $jurusanRow )
            <div class="col-md-6 mt-2 pt-3">
                <div class="card">
                    <center><img class="img-thumbnail mt-2" width="120px" src="{{ asset('jurusan/'.$jurusanRow->path)  }}" alt="Card image cap"></center>
                    <div class="card-body pt-3">
                        <h5 class="text-center">{{$jurusanRow->judul_jurusan }}</h5>
                    </div>
                </div>
            </div>
            @php
            $count++;
            @endphp
            @endforeach
        </div>


    </div>
</section>
<section class="fasilitas mt-3">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Fasilitas</h3>
                <div class="row">
                    <div class="col-md-3 col-6 mb-2">
                        <div class="card" style="background-color:#3FA796">
                            <div class="card-body">
                                <center><i class="fa fa-wifi fa-5x "></i></center>
                                <h3 class="text-center">Wifi</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-2">
                        <div class="card" style="background-color:#3FA796">
                            <div class="card-body">
                                <center><i class="fa fa-camera fa-5x "></i></center>
                                <h3 class="text-center">CCTV</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-2">
                        <div class="card" style="background-color:#3FA796">
                            <div class="card-body">
                                <center><i class="fa fa-desktop fa-5x "></i></center>
                                <h3 class="text-center">Lab. Komp</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-6 mb-2">
                        <div class="card" style="background-color:#3FA796">
                            <div class="card-body">
                                <center><i class="fa fa-cog fa-5x "></i></center>
                                <h3 class="text-center">BENGKEL</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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