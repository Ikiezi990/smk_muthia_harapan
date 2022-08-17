@extends('layouts.app')
@section('content')
    <section class="banner">
        <div class="container">
            <div id="carouselExampleControls" style="border:goldenrod 5px solid" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @php
                        $count = 1;
                    @endphp
                    @foreach ($banner as $rowBanner)
                        @if ($count == 1)
                            <div class="carousel-item active">
                                <img src="{{ asset('banner/' . $rowBanner->path) }}" class="d-block w-100"
                                    alt="https://www.nicesnippets.com/upload/bootstrap-4-header-section-with-background-banner-design-code.png">
                            </div>
                        @else
                            <div class="carousel-item">
                                <img src="{{ asset('banner/' . $rowBanner->path) }}" class="d-block w-100"
                                    alt="https://www.nicesnippets.com/upload/bootstrap-4-header-section-with-background-banner-design-code.png">
                            </div>
                        @endif
                        @php
                            $count++;
                        @endphp
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"
                        style="background-color:goldenrod 5px solid"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>


    <section class="jurusan">
        <div class="container mt-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <hr style="border:3px #3FA796 solid;width:50%">
                            <h3>Rekayasa Perangkat Lunak</h3>
                            <p>
                                Jurusan Teknik Komputer dan Informatika membekali siswa/i dengan pengetahuan, kemampuan dan
                                keterampila dalam dunia komputer dan informatika seperti : merakit komputer dan
                                mengoprasikan komputer, membuat program aplikasi dan menguasai bahasa pemrograman, membuat
                                website, membuat aplikasi mobile andr…
                            </p>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ asset('img/rpl.jpeg') }}" class="img-fluid"
                                alt="https://3.bp.blogspot.com/-Ct6q_xVbvDs/UVA4lb3Om0I/AAAAAAAAAXc/HF6viI0_CyA/s640/Rekayasa+Perangkat+Lunak.jpg"
                                class="gambar_jurusan">
                        </div>
                    </div>
                </div>
                <hr style="border:3px #FEC260 solid;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('img/tsm.jpeg') }}" class="img-fluid"
                                alt="https://3.bp.blogspot.com/-Ct6q_xVbvDs/UVA4lb3Om0I/AAAAAAAAAXc/HF6viI0_CyA/s640/Rekayasa+Perangkat+Lunak.jpg"
                                class="gambar_jurusan">
                        </div>
                        <div class="col-md-8">
                            <hr style="border:3px #3FA796 solid;width:50%">
                            <h3>Rekayasa Perangkat Lunak</h3>
                            <p>
                                Jurusan Teknik Komputer dan Informatika membekali siswa/i dengan pengetahuan, kemampuan dan
                                keterampila dalam dunia komputer dan informatika seperti : merakit komputer dan
                                mengoprasikan komputer, membuat program aplikasi dan menguasai bahasa pemrograman, membuat
                                website, membuat aplikasi mobile andr…
                            </p>
                        </div>
                    </div>
                </div>
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
    <section class="berita">
        <center>
            <hr style="border:3px #3FA796 solid;width: 250px;">
        </center>
        <h3 class="text-center">Berita Terbaru</h3>
        <center>
            <hr style="border:3px #3FA796 solid;width:250px;">
        </center>
        <div class="container">

            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('lks_prov.jpeg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Lomba Lks Provinsi Jawa Barat</h5>
                            <div style="height:73px;overflow:hidden;">

                                <p class="card-text" style="text-align:center;">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Perspiciatis reiciendis consequuntur autem architecto adipisci, sint
                                    recusandae? Sunt, fugiat totam consequuntur minima exercitationem, quaerat voluptate et
                                    in tempore doloribus esse saepe!</p>
                            </div>
                            <center>
                                <a href="#" class="btn btn-danger" style="background-color: #A10035;">Baca Cerita</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('lks_prov.jpeg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Lomba Lks Provinsi Jawa Barat</h5>
                            <div style="height:73px;overflow:hidden;">

                                <p class="card-text" style="text-align:center;">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Perspiciatis reiciendis consequuntur autem architecto adipisci, sint
                                    recusandae? Sunt, fugiat totam consequuntur minima exercitationem, quaerat voluptate et
                                    in tempore doloribus esse saepe!</p>
                            </div>
                            <center>
                                <a href="#" class="btn btn-danger" style="background-color: #A10035;"
                                    style="background-color: #A10035;">Baca Cerita</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('lks_prov.jpeg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Lomba Lks Provinsi Jawa Barat</h5>
                            <div style="height:73px;overflow:hidden;">

                                <p class="card-text" style="text-align:center;">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Perspiciatis reiciendis consequuntur autem architecto adipisci, sint
                                    recusandae? Sunt, fugiat totam consequuntur minima exercitationem, quaerat voluptate et
                                    in tempore doloribus esse saepe!</p>
                            </div>
                            <center>
                                <a href="#" class="btn btn-danger" style="background-color: #A10035;">Baca
                                    Cerita</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('lks_prov.jpeg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Lomba Lks Provinsi Jawa Barat</h5>
                            <div style="height:73px;overflow:hidden;">

                                <p class="card-text" style="text-align:center;">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Perspiciatis reiciendis consequuntur autem architecto adipisci, sint
                                    recusandae? Sunt, fugiat totam consequuntur minima exercitationem, quaerat voluptate et
                                    in tempore doloribus esse saepe!</p>
                            </div>
                            <center>
                                <a href="#" class="btn btn-danger" style="background-color: #A10035;">Baca
                                    Cerita</a>
                            </center>
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
        <h3 class="text-center">Prestasi Kami</h3>
        <center>
            <hr style="border:3px #3FA796 solid;width:250px;">
        </center>
        <div class="container">

            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('lks_prov.jpeg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Juara 1 LKS Tingkat Kab. Bandung</h5>
                            <div style="height:73px;overflow:hidden;">

                                <p class="card-text" style="text-align:center;">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Perspiciatis reiciendis consequuntur autem architecto adipisci, sint
                                    recusandae? Sunt, fugiat totam consequuntur minima exercitationem, quaerat voluptate et
                                    in tempore doloribus esse saepe!</p>
                            </div>
                            <center>
                                <a href="#" class="btn btn-danger" style="background-color: #A10035;">Baca
                                    Cerita</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('lks_prov.jpeg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Juara 1 LKS Tingkat Kab. Bandung</h5>
                            <div style="height:73px;overflow:hidden;">

                                <p class="card-text" style="text-align:center;">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Perspiciatis reiciendis consequuntur autem architecto adipisci, sint
                                    recusandae? Sunt, fugiat totam consequuntur minima exercitationem, quaerat voluptate et
                                    in tempore doloribus esse saepe!</p>
                            </div>
                            <center>
                                <a href="#" class="btn btn-danger" style="background-color: #A10035;">Baca
                                    Cerita</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('lks_prov.jpeg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Juara 1 LKS Tingkat Kab. Bandung</h5>
                            <div style="height:73px;overflow:hidden;">

                                <p class="card-text" style="text-align:center;">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Perspiciatis reiciendis consequuntur autem architecto adipisci, sint
                                    recusandae? Sunt, fugiat totam consequuntur minima exercitationem, quaerat voluptate et
                                    in tempore doloribus esse saepe!</p>
                            </div>
                            <center>
                                <a href="#" class="btn btn-danger" style="background-color: #A10035;">Baca
                                    Cerita</a>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('lks_prov.jpeg') }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">Juara 1 LKS Tingkat Kab. Bandung</h5>
                            <div style="height:73px;overflow:hidden;">

                                <p class="card-text" style="text-align:center;">Lorem ipsum dolor sit amet consectetur
                                    adipisicing elit. Perspiciatis reiciendis consequuntur autem architecto adipisci, sint
                                    recusandae? Sunt, fugiat totam consequuntur minima exercitationem, quaerat voluptate et
                                    in tempore doloribus esse saepe!</p>
                            </div>
                            <center>
                                <a href="#" class="btn btn-danger" style="background-color: #A10035;">Baca
                                    Cerita</a>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="footer mt-2">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Footer
                </div>
                <div class="card-body">
                    <h5 class="card-title">INI FOOTER</h5>
                </div>
            </div>
        </div>
    </section>
@endsection
