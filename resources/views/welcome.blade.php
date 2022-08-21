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
                <span class="visually-hidden"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"></span>
            </button>
        </div>
    </div>
</section>


<section class="jurusan">
    <center>
        <hr style="border:3px #3FA796 solid;width: 250px;">
    </center>
    <h3 class="text-center"><ion-icon name="clipboard-outline"></ion-icon>&nbsp;Jurusan</h3>
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
                <div class="card" data-aos="zoom-in-down"
>
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
                <h3 class="text-center"><ion-icon name="stats-chart-outline"></ion-icon>&nbsp;Statistik</h3>
  <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine"class="small-box bg-info">
              <div class="inner">
                <h3>{{ $siswa->count() }}</h3>

                <p>Siswa</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine"class="small-box bg-success">
              <div class="inner">
                <h3>{{ $guru->count() }}</h3>

                <p>Guru</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine"class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $kelas->count() }}</h3>

                <p>Kelas</p>
              </div>
              <div class="icon">
                <i class="ion ion-home"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine"class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $jurusan->count() }}</h3>

                <p>Prestasi</p>
              </div>
              <div class="icon">
               <i class="ion ion-trophy"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
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
    <h3 class="text-center"><ion-icon name="newspaper-outline"></ion-icon>&nbsp;Berita Terbaru</h3>
    <center>
        <hr style="border:3px #3FA796 solid;width:250px;">
    </center>
    <div class="container">

        <div class="row">
            @foreach ($berita as $beritaRow)

            <div class="col-md-3 mt-3">
                <div class="card" data-aos="fade-up"
     data-aos-anchor-placement="top-center">
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
                            <a href="#" class="btn btn-danger" style="background-color: #A10035;"><ion-icon name="book-outline"></ion-icon>&nbsp;Baca Berita</a>
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
    <h3 class="text-center"><ion-icon name="trophy-outline"></ion-icon>&nbsp;Prestasi Kami</h3>
    <center>
        <hr style="border:3px #3FA796 solid;width:250px;">
    </center>
    <div class="container">
        <div class="row">
            @foreach ($prestasi as $prestasiRow)

            <div class="col-md-3 mt-4">
                <div class="card" data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">
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
