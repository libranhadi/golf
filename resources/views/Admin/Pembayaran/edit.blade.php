@extends('layouts.admin', ['title'=> 'Page Karyawan'])

@push('after-script')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>

            .foto{
                margin-top: -13px;  
                border: 1px solid gray;
                min-height: 250px;
                max-height: 700px; 
                background-repeat: no-repeat;  
                background-size: cover;
            }
        </style>
@endpush
@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid mt-5">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
  
                     <form method="POST" action="{{ route('admin-update-pembayaran', $pembayaran->id) }}" class="py-3">
                        @method('PUT')
                         @csrf
                       
                            
                        <div class="card">
                            <div class="dashboard-title mx-3">
                                Page Pembayaran
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-4">

                                            <div class="foto mt-2" style="background-image: url({{ $pembayaran->paid() }}); ">
                                        
                                            </div>
                                            
                                    </div>

                                    <div class="col-md-3">
                                        <input type="hidden" name="users_id" id="users" value="{{ $pembayaran->users_id }}"class=" @error('name') is-invalid @enderror" >
                                        @error('users')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror

                                        <div class="dashboard-card-title">
                                            Kode Pembayaran
                                        </div>
                                        <div class="dashboard-card-subtitle">
                                            {{ $pembayaran->kode_pembayaran }}
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="jadwal">Kode Pembayaran</label>
                                            <select name="kode_pembayaran" id="jadwal" class="form-control  @error('teebox') is-invalid @enderror" >                                  
                                                <option value="{{ $pembayaran->kode_pembayaran }}">{{ $pembayaran->kode_pembayaran }}</option>
                                                
                                            </select>
                                        

                                            @error('tee_box')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                         --}}
                                        <hr>
                                        <div class="dashboard-card-title">
                                            Nama Pelanggan
                                        </div>
                                        <div class="dashboard-card-subtitle">
                                            {{ $pembayaran->user->name }}
                                        </div>
                                        <hr>
                                         <div class="dashboard-card-title">
                                            Phone Number
                                        </div>
                                        <div class="dashboard-card-subtitle">
                                            {{ $pembayaran->user->phone_number }}
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="nama">Nama Pelanggan</label>
                                            
                                            <input type="text" id="nama_penyewa" value="{{ $pembayaran->user->name}}" class="form-control @error('nama_penyewa') is-invalid @enderror" style="border : none">
                                        
                                            
                                        </div>
                                        @error('nama_penyewa')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror  --}}

                                        
                                    
                                    </div>
                                    <div class="col-md-5">
                                        <div class="dashboard-card-title">
                                          Total Bayar
                                        </div>
                                        <div class="dashboard-card-subtitle">
                                            Rp. {{ number_format($pembayaran->total_bayar)}}
                                        </div>
                                        <hr>
                                        <div class="dashboard-card-title">
                                         Waktu Bayar
                                        </div>
                                        <div class="dashboard-card-subtitle">
                                             {{$pembayaran->created_at->diffForHumans()}}
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="status">Status Pembayaran</label>
                                            <select name="status_pembayaran" id="status" class="form-control @error('status') is-invalid @enderror">
                                                    
                                        
                                            @if ($pembayaran->status_pembayaran == 'SUCCESS')
                                                <option value="{{ $pembayaran->status_pembayaran }}" class="text-success">{{ $pembayaran->status_pembayaran }}</option>
                                            <option value="PENDING" class="text-warning">PENDING</option>

                                            @else
                                            <option value="{{ $pembayaran->status_pembayaran }}" class="text-warning">{{ $pembayaran->status_pembayaran }}</option>
                                            <option value="SUCCESS" class="text-success">SUCCESS</option>
                                            @endif
                                            <span class="invalid-feedback" role="alert">
                                            <strong>STATUS TIDAK DIKETAHUI</strong>
                                          </span>
                                        
                                            </select>

                                            @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        
                                      

                                        
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="d-flex justify-content-between ml-auto mb-5 mx-5">
                                            <button type="submit" class="btn btn-primary mt-4" id="button">
                                                Update
                                            </button>
                                </div>
                                   
                            </div>
                        </div>
                                
                    </form>
                    
            </div>
        </div>
@endsection
@push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

     $(document).ready(function() {                
        $('.select2').select2();
        
        const ajax =  
             $.ajax( {
                url : 'edit-pembayaran/ ' + id,
                type: 'get',
                dataType : 'json',
                success : function(data) {
                    console.log( 'ini data nama user',
                        //    $('#nama_penyewa').val(data.user.name),
                        //    $('#users').val(data.user.id)
                        data

                    );
                }
            })
    }); 

</script>
@endpush

