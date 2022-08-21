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
        <x:notify-messages />
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID SPP</th>
                    <th>Nama Spp</th>
                    <th>Total Bayar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->id }}</td>
                        <td>{{$row->nama_spp}}</td>
                        <td>Rp. {{ number_format($row->tot_bayar) }};</td>
                        <td>
                            <div class="btn-group">

                                <form action="{{ route('spps.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i></button>
                                </form>
                                <a href="{{ route('spps.edit', $row->id) }}" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>ID SPP</th>
                    <th>Nama Spp</th>
                    <th>Total Bayar</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
