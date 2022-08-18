@extends('layouts.appAdmin')

@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data {{ $title }}</h3>

            <div class="card-tools">
                <a href="{{ route('gurus.index') }}" class="btn btn-danger">
                    <i class="fa fa-arrow-left"></i>&nbsp;Kembali
                </a>
            </div>

        </div>
        <div class="card-body">
            <form action="{{ route('gurus.store') }}" method="post" enctype="multipart/form-data">

                <!-- Default box -->
                <div class="card">

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        @csrf
                                        @method('POST')
                                        <h3 class="card-title">FORM {{ $title }}</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul class="list-unstyled">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label for="judul_prestasi">ID Card</label>
                                            <input type="text" id="id_card" name="id_card"
                                                class="form-control" value="{{ "G". rand(10000, 1999) }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="judul_prestasi">NIP</label>
                                            <input type="text" id="nip" name="nip"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="judul_prestasi">Nama</label>
                                            <input type="text" id="nama" name="nama"
                                                class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                <option value="L">L</option>
                                                <option value="P">P</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select name="id_mapel" id="id_mapel" class="form-control">
                                                @foreach ($mapel as $mapelRow)

                                                <option value="{{ $mapelRow->id }}">{{ $mapelRow->nama_mapel }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="file">File Image</label>
                                            <input type="file" id="file" name="image" id="image"
                                                class="form-control" onchange="previewFile(this);">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="btn btn-secondary">Cancel</a>
                                <button type="submit" value="" class="btn btn-success float-right">Tambah
                                    prestasi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script>
        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $("#previewImg").attr("src", reader.result);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
