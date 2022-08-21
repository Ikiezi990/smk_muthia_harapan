@extends('layouts.appAdmin')

@section('content')

<div class="card">
    <div class="card-header bg-secondary">
        <h3 class="card-title">Data {{ $title }}</h3>

        <div class="card-tools">
            <a href="{{ route('transakisspp.index') }}" class="btn btn-danger">
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
                    <th>Nis</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>no_telp</th>
                    <th>Paid</th>
                    <th>Unpaid</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->nis }}</td>
                        <td>{{$row->nisn}}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ $row->no_telp }}</td>
                        <td>
                            @php
                             $paid = \App\Models\TransaksiSpp::where(['id_siswa' => $row->id])->get();
                             $paided = 0;
                            @endphp
                            @if($paid->count() > 0)
                                @foreach ($paid as $paideds)
                                    @php
                                        $paided += $paideds->spp->tot_bayar;
                                    @endphp
                                @endforeach
                                <span class="badge badge-success">

                                    Rp.{{ number_format($paided) }};
                                </span>
                            @else
                                Rp.{{ number_format($paided) }};
                            @endif

                        </td>
                        <td>
                            @if( ($tunggakan = $spp[0]->unpaid-$paided) ==0)
                                <div class="badge badge-info">
                                    Lunas
                                </div>
                            @else
                                <div class="badge badge-danger">
                                    Rp.{{ number_format($tunggakan) }};
                                </div>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">

                                <a href="{{ route('transakisspp.edit', $row->id) }}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i>&nbsp;Lihat Detail Spp</a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                   <th>No</th>
                    <th>Nis</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>no_telp</th>
                    <th>Paid</th>
                    <th>Unpaid</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
