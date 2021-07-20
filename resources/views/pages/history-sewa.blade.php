@extends('layouts.test', ['title' => 'Lapangan Sawangan Golf'])
{{-- @push('after-style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >
@endpush --}}
@section('content')
<div class="page-history">
    <section class="section-history">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-10">
                    
                    <h5 class=" py-3 px-4">
                        History Penyewaan
                    </h5>
                    <div class="card history-sewa">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        
                                   
                                            
                                        <th>No </th>
                                        <th>Nama</th>
                                        <th>Tanggal Main</th>
                                        <th>Harga </th>
                                        <th>Kode </th>
                                        <th>Status Penyewaan</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $nomor = 0;
                                    @endphp
                                    @foreach ($penyewaan as $item)
                                    <tr>
                                        
                                        <td>
                                            {{ $nomor += 1}}
                                        </td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->jadwal->tanggal_main }}</td>
                                        <td>{{$item->jadwal->harga  }}</td>
                                        <td>{{ $item->kode_sewa }}</td>
                                        <td>{{ $item->status_penyewaan }}</td>
                                        <td  class="d-flex">
                                            
                                        @if ($item->status_penyewaan === 'SUDAH BAYAR')
                                            <a href="{{ route('pages-detail', $item->id) }}" class="btn btn-info">Detail</a>
                                        @else
                             

                                            <a class="btn btn-success" href="{{ route('pages-bayar', $item->id) }}">Bayar</a>
                                  
                                                    
                                                    <form action="{{ route('batal-sewa', $item->id) }}" onclick="return confirm('Are you sure?');" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger mx-3"  type="submit">Batal</button>
                                                    </form>
                                        {{-- <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                action
                                            </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    
                                                </div>
                                            </div> --}}
                                            @endif 
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>   
                        </div>
                    </div>
                        
                </div>
            </div>
            <div class="row">
                <h5>
                    Ingin melakukan Penyewaan Lagi ?
                </h5>
                <br>
            </div>
            <div class="row">

                <a href="{{ route('sewa-lapangan') }}" class="btn btn-warning">Booking</a>
            </div>
        </div>
    </section>
</div>
@endsection
    {{-- @push('after-script')
        <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    @endpush --}}