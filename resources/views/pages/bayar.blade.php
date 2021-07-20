@extends('layouts.test', ['title' => 'Form Bayar Lapangan'])

@section('content')
<div class="page-sewa">
    <section class="section-sewa">
      <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-10">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>                        
                    @endif
                    <div class="card">
                        
                        <h5 class=" py-3 px-4">
                            Form Sewa
                        </h5>
                       <div class="card-body">
                            <form action="{{ route('store-bayar', $bayar->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex">
                                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                    <input type="hidden" name="id_jadwal" value="{{ $bayar->jadwal->id }}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" autofocus class="form-control" value="{{ Auth::user()->name}}" readonly>
                                        </div>   
                                       <div class="form-group">
                                            <label for="phone">Tanggal Main </label>
                                            
                                            <input  type="text" class="form-control " name="tanggal_main" value="{{ $bayar->jadwal->tanggal_main}}" required readonly>
                                        </div>
                                       <div class="form-group">
                                           <label for="">Kode Sewa</label>
                                           <input type="text" name="kode_sewa" class="form-control" readonly value="{{ $bayar->kode_sewa }}">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No_Phone</label>
                                            <input type="number" name="phone_number" class="form-control" value="{{ old('phone_number') ?? Auth::user()->phone_number}}" readonly>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="harga">Harga Total</label>
                                            <input type="number" id="harga" class="form-control"
                                            name="total_bayar" value="{{ $bayar->jadwal->harga}}" required readonly >
                                        </div>
                                       <div class="form-group">
                                           <label for="">Bukti Pembayaran</label>
                                           <input type="file" name="bukti_bayar" class="form-control" required>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-md-2 justify-content-between">
                                        <button type="submit" class="btn btn-primary">
                                            SAVE
                                        </button>
                                </div>
                                <div class="form-group d-flex">                                    
                                    
                                </div>

                            </form>
                       </div>
                       
                    </div>
                        
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('after-script')
      
    <script>
        $(document).ready(function(){
           
        });
    </script>
@endpush