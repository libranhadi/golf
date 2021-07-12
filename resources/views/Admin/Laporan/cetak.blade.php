<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
    <title>PRINT</title>
</head>
<body>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                    
                    <h5 class="py-3">LAPORAN SAWANGAN GOLF COURSE</h5>
                </div>
                <table class="table table-bordered" >
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                         <th>Name</th>
                                                         <th>No Phone</th>
                                                         <th>Kode Pembayaran</th>
                                                         <th>Tanggal Main</th> 
                                                         <th>Status Pembayaran</th>
                                                         <th>Harga</th> 
                                                    </tr>

                                                </thead>
                                                    <tbody id="laporan">
                                                          
                                                            @php
                                                                
                                                                $nomor = 0;
                                                            @endphp
                                                                @foreach ($laporan as $item)
                                                        <tr>
                                                                
                                                            <td>{{ $nomor += 1}}</td>
                                                            <td>{{$item->user->name}}</td>
                                                            <td>{{ $item->user->phone_number}}</td>
                                                            <td>{{  $item->kode_pembayaran}}</td>
                                                            <td>{{  $item->jadwal->tanggal_main}}</td>
                                                            <td>{{ $item->status_pembayaran}}</td>
                                                            <td>{{  $item->total_bayar}}</td>
                                                        </tr>
                                                           {{-- @php
                                                            $total += $item->total_bayar
                                                        @endphp --}}
                                                        @endforeach

                                                    </tbody>
                                                    <tfoot table-border="1">
                                                        <tr>
                                                            <th colspan="5">TOTAL PENDAPATAN</th>
                                                            <td colspan="2"> Rp. {{ $total }} </td>
                                                        </tr>
                                                    </tfoot>
                                                
                                            </table>
            </div>
        </div>
     {{-- <div class="container-fluid">
         
                   
                    <div class="dashboard-content my-5 mx-3">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body"> --}}
                                   
                                        {{-- <div class="table table-responsive table-bordered scroll-horizontal-vertical w-100"> --}}
                                            {{-- <table class="table table-bordered " >
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                         <th>Name</th>
                                                         <th>No Phone</th>
                                                         <th>Kode Pembayaran</th>
                                                         <th>Tanggal Main</th> 
                                                         <th>Status Pembayaran</th>
                                                         <th>Tanggal Bayar</th>
                                                         <th>Harga</th> 
                                                    </tr>

                                                </thead>
                                                    <tbody id="laporan">
                                                        <tr>
                                                            @php
                                                                $nomor = 0 + 1
                                                            @endphp
                                                            @foreach ($laporan as $item)
                                                                
                                                            <td>{{ $nomor }}</td>
                                                            <td>{{$item->user->name}}</td>
                                                            <td>{{ $item->user->number_phone}}</td>
                                                            <td>{{  $item->kode_pembayaran}}</td>
                                                            <td>{{  $item->jadwal->tanggal_main}}</td>
                                                            <td>{{ $item->status_pembayaran}}</td>
                                                            <td>{{  $item->total_bayar}}</td>
                                                            @endforeach
                                                        </tr>

                                                    </tbody>
                                                    <tfoot table-border="1">
                                                        <tr>
                                                            <th colspan="6">TOTAL PENDAPATAN</th>
                                                            <td> Rp. sekian</td>
                                                        </tr>
                                                    </tfoot>
                                                
                                            </table> --}}
                                        {{-- </div>      --}}
{{--                              
                                </div>
                            </div>

                    </div>
                </div> --}}
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> --}}
</body>
</html>
               