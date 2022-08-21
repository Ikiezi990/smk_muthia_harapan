@extends('layouts.appAdmin')

@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header bg-secondary">
        <h3 class="card-title">Data {!! $title !!}</h3>

        <div class="card-tools">
            <a href="{{ route('transakisspp.index') }}" class="btn btn-danger">
                <i class="fa fa-arrow-left"></i>&nbsp;Kembali
            </a>
        </div>

    </div>
    <div class="card-body">
        <form action="{{ route('transakisspp.update', $data->id) }}" method="post" enctype="multipart/form-data">

            <!-- Default box -->
            <div class="card">

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header bg-secondary">
                                    @csrf
                                    @method('PUT')
                                    <h3 class="card-title">Form {!! $title !!}</h3>

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
                                        <label for="nama_siswa">Nama Siswa</label>
                                        <input type="text" id="nama_siswa" name="nama_siswa" value="{{$data->nama}}" readonly class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Pilih Jenis Spp</label>
                                            @php
                                            $spp = \App\Models\Spp::where(['id_kelas' => $data->id])->get();
                                            @endphp
                                        <select name="id_spp" id="" readonly class="form-control">
                                            @foreach($spp as $sppRow)
                                            <option value="{{$sppRow->id}}">{{$sppRow->nama_spp}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                                                <button type="submit" value="" class="btn btn-success float-right">Bayar</button>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                                       </form>                 <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header bg-secondary">
                                    <h3 class="card-title">List Tagihan</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">

                                            @php
                                            $spp = \App\Models\Spp::where(['id_kelas' => $data->id_kelas])->get();
                                            @endphp
                                            <ul class="list-group">

                                                @foreach ($spp as $rowTagihan)
                                                @php
                                                    $transaksi_spp = \App\Models\TransaksiSpp::where(['id_siswa' => $data->id, 'id_spp'=>$rowTagihan->id])->get();
                                                @endphp
                                                @if(count($transaksi_spp)>0)

                                                <li class="list-group-item list-group-item-secondary"> <div class="badge badge-primary">Transaction Id : {{ "trx-000".$transaksi_spp[0]['id']}}</div> <br>{{ $rowTagihan->nama_spp }} - {{ number_format($rowTagihan->tot_bayar) }}- <div class="badge badge-success">Lunas</div>-
                                                    <br>
                                                    <form action="{{ route('transakisspp.destroy', $transaksi_spp[0]['id']) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Cancel</button>
                                </form></li>
                                                @else
                                                <li class="list-group-item list-group-item-secondary">{{ $rowTagihan->nama_spp }} - {{ number_format($rowTagihan->tot_bayar) }}- <div class="badge badge-danger">Belum Lunas</div></li>
                                                @endif
                                                @endforeach
                                            </ul>
                                            <a href="{{ route('transakisspp.invoices', $data->id) }}" class="btn btn-success mt-3">Print Invoices</a>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">


                        </div>
                    </div>
                </div>
            </div>

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
