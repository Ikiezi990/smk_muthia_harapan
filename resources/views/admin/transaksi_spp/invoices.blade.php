@extends('layouts.appAdmin')

@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                <img src="{{asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="width: 50px" style="opacity: .8">
                <hr>
             SMK MUTHIA HARAPAN CICALENGKA
                    <small class="float-right">Tanggal: {{ date('d-m-Y') }}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Dari
                  <address>
                    <strong>Admin Tata Usaha</strong><br>
                     Jl. Babakan Peuteuy No.300<br>
                    Babakan Peuteuy, Kecamatan<br>
                    Cicalengka, Kabupaten Bandung, Jawa Barat<br>
                    smkmuthiaharapan.scholl@gmail.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">

                  <address>
                    <strong></strong><br>


                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                       Kepada
                  <address>
                    <strong>{{ $data->nama }}</strong><br>

                    No Telpon: {{ $data->no_telp }}
                  </address>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Transaction Id</th>
                      <th>Nama Spp</th>
                      <th>Status</th>
                      <th>Tanggal Bayar</th>
                      <th>Sub Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
            @php
            $spp = \App\Models\Spp::where(['id_kelas' => $data->id_kelas])->get();
            $datasubtagihan = 0;
            $lunas = 0;
            @endphp


            @foreach ($spp as $rowTagihan)
            <tr>


            @php
                $transaksi_spp = \App\Models\TransaksiSpp::where(['id_siswa' => $data->id, 'id_spp'=>$rowTagihan->id])->get();
            @endphp
            @if(count($transaksi_spp)>0)
                <td>trx-000{{ $transaksi_spp[0]->id }}</td>
                <td>{{ $rowTagihan->nama_spp }}</td>
                <td> <div class="badge badge-success">Lunas</div> </td>
                <td>{{ $rowTagihan->updated_at }}@php
                    $lunas += $rowTagihan->tot_bayar;
                @endphp</td>
                <td>Rp.{{ number_format($datasubtagihan += $rowTagihan->tot_bayar) }};</td>
            @else
                <td> Data pembayaran belum ada</td>
                <td>{{ $rowTagihan->nama_spp }}</td>
                <td> <div class="badge badge-danger">Belum Lunas</div> </td>
                <td>{{ $rowTagihan->updated_at }}</td>
                <td>Rp.{{ number_format($datasubtagihan += $rowTagihan->tot_bayar) }};</td>
            @endif
            @endforeach
                    </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-4">
                </div>
                <!-- /.col -->
                <div class="col-8">

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:100%">Subtotal Tagihan: Rp. {{ number_format($datasubtagihan) }};</th>
                        <td></td>
                      </tr>
                      <tr>
<th style="width:100%">Pembayaran Lunas: Rp. {{ number_format($lunas) }};</th>
                        <td></td>
                      </tr>
                      <tr>
@if($lunas - $datasubtagihan==0)
<th style="width:100%">Status <div class="badge badge-success">Lunas</div> </th>
@else
<th style="width:100%">Sisa Tagihan : Rp. {{ number_format( $datasubtagihan-$lunas) }};</th>
@endif
                        <td></td>
                      </tr>

                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection
