@extends('layouts.appAdmin')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data {{ $title }}</h3>

        <div class="card-tools">
            <a href="{{ route('spps.index') }}" class="btn btn-danger">
                <i class="fa fa-arrow-left"></i>&nbsp;Kembali
            </a>
        </div>

    </div>
    <div class="card-body">
        <form action="{{ route('spps.update', $data->id) }}" method="post" enctype="multipart/form-data">

            <!-- Default box -->
            <div class="card">

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    @csrf
                                    @method('PUT')
                                    <h3 class="card-title">Form {{ $title }}</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
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
                                        <label for="nama_spp">Nama spp</label>
                                        <input type="text" id="nama_spp" value="{{ $data->nama_spp }}" name="nama_spp" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas"></label>
                                        <select name="id_kelas" id="" class="form-control">
                                            @foreach($kelas as $kelasRow)
                                            <option value="{{$kelasRow->id}}" @if($kelasRow->id == $data->id_kelas) selected @endif>{{$kelasRow->nama_kelas}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tot_bayar">Total Tagihan</label>
                                        <input type="text" id="tot_bayar" value="{{ $data->tot_bayar }}" name="tot_bayar" class="form-control">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">

                            <button type="submit" value="" class="btn btn-success float-right">Tambah
                                Siswa</button>
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
