@extends('layouts.test', ['title' => 'Detail Pembayaran'])

@section('content')
<div class="page-detail">
    <section class="section-detail">
        <div class="container">
             <h5 class=" py-3 px-4">
                        Detail Penyewaan    
                    </h5>
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex my-3 mb-3">
                        <div class="col-md-4">
                            <div class="detail-title">
                                Bukti Bayar
                            </div>
                            <img src="{{$detail->pembayaran->paid()}}" alt="" class="w-100" style="width: max-content; height:40vh">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Phone</th>
                                        <th>Tanggal Main</th>
                                        <th>Waktu Main</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $detail->user->name }}</td>
                                        <td>{{ $detail->user->phone_number }}</td>
                                        <td>{{ $detail->jadwal->tanggal_main }}</td>
                                        <td>{{ $detail->jadwal->jam_mulai }}</td>

                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="detail-title">
                                        Kode Jadwal
                                    </div>
                                    <div class="detail-subtitle">
                                        {{ $detail->jadwal->kode_jadwal }}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                     <div class="detail-title">
                                        Kode Sewa
                                    </div>
                                    <div class="detail-subtitle">
                                        {{ $detail->kode_sewa }}
                                    </div>
                                </div>
                                <div class="col-md-5">
                                     <div class="detail-title">
                                        Status Penyewaan
                                    </div>
                                    <div class="detail-subtitle text-success">
                                        {{ $detail->status_penyewaan }}
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        
                        <div class="col-md-12 col-sm-10">
                            <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                
                                        
                                                    
                                                <th>Tanggal Sewa</th>
                                                <th>Tanggal Bayar</th>
                                               <th>Kode Pembayaran</th>
                                                <th>Total Bayar</th>
                                                <th>Status Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       
                                        
                                            <tr>
                                                
                                                <td>{{ $detail->created_at }}</td>
                                                <td>{{ $detail->pembayaran->created_at }}</td>

                                                <td>
                                                    
                                                    {{ $detail->pembayaran->kode_pembayaran }}
                                                </td>
                                                <td>{{$detail->pembayaran->total_bayar  }}</td>
                                                
                                                @if ($detail->pembayaran->status_pembayaran === 'SUCCESS')
                                                    
                                                <td>
                                                    <div class="text-success">

                                                        {{$detail->pembayaran->status_pembayaran  }}
                                                    </div>
                                                </td>
                                                @else
                                                <td>
                                                    <div class="text-warning">

                                                        {{$detail->pembayaran->status_pembayaran  }}

                                                    </div>
                                                    <div class="text-secondary">
                                                        (On Progress)
                                                    </div>
                                                </td>
                                                @endif

                                            </tr>
                                            
                                        </tbody>
                                    </table>   
                            
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
