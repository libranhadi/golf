@extends('layouts.admin', ['title'=> 'Page Karyawan'])

@push('after-script')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    
@endpush
@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title my-5">Form Update Penyewaan</h2>
                     </div>
                     <form method="POST" action="{{ route('admin-update-penyewaan', $penyewaan->id) }}" class="py-3">
                        @method('PUT')
                         @csrf
                       
                            
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6 ">
                    <input type="hidden" name="users_id" id="users" value="{{ $penyewaan->users_id }}"class=" @error('name') is-invalid @enderror" >
                     @error('users')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                         @enderror
                    <div class="form-group">
                        <label for="jadwal">Kode Jadwal</label>
                         <select name="id_jadwal" id="jadwal" class="form-control select2 @error('teebox') is-invalid @enderror" >
                                  
                        @if ($penyewaan->jadwal->kode_jadwal)
                            <option value="{{ $penyewaan->jadwal->id }}">{{ $penyewaan->jadwal->kode_jadwal }}</option>
                        @else 
                            
                         @foreach ($jadwal as $jadwal)
                            
                        <option {{ $jadwal->id == $penyewaan->id_jadwal ? 'selected' : '' }}value="{{ old('id') ?? $jadwal->id}}" style="height: 40px; width:100px;">{{ $jadwal->kode_jadwal }} (Name Customer : {{ $jadwal->user->name }})</option>
                        @endforeach
                        @endif
                        </select>
                       

                        @error('tee_box')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                         @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="nama">Nama Penyewa</label>
                        
                        <input type="text" id="nama_penyewa" value="{{ $penyewaan->user->name }}" class="form-control iya @error('nama_penyewa') is-invalid @enderror" style="border : none"   value="{{ old('nama_penyewa') ?? $penyewaan->nama_penyewa}}">
                      
                        
                    </div>
                    @error('nama_penyewa')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror 
                     <div class="form-group">
                        <label for="status">Status Penyewaan</label>
                         <select name="status_penyewaan" id="status" class="form-control @error('status') is-invalid @enderror">
                                  
                    
                        @if ($penyewaan->status_penyewaan == 'SUDAH BAYAR')
                            <option value="{{ $penyewaan->status_penyewaan }}" class="text-success">{{ $penyewaan->status_penyewaan }}</option>
                        <option value="BELUM BAYAR" class="text-danger">Belum Bayar</option>

                        @else
                                <option disabled>-- PILIH OPSI --</option>                            
                        <option value="BELUM BAYAR" class="text-danger">Belum Bayar</option>
                        <option value="SUDAH BAYAR " class="text-success">Sudah Bayar</option>
                        @endif
                     
                        </select>

                        @error('status')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                         @enderror
                    </div>
                       
                     <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $penyewaan->jadwal->harga }}">
                    </div>
                    <div class="form-group ">
                                <button type="submit" class="btn btn-primary" id="button">
                                    Update
                                </button>
                       </div>
                </div>
                
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
        // $('#jadwal').change(function() {
        //     let id = $('#jadwal').val();
        //     console.log(id);
        //     const promise = new Promise((resolve , reject) =>{

        //         resolve(getData(id));
        //         reject('error');
        //     });
            
        // });



        // function getData(id) {
        //   const ajax =  
        //      $.ajax( {
        //         url : 'edit-penyewaan/ ' + id,
        //         type: 'get',
        //         dataType : 'json',
        //         success : function(data) {
        //             console.log( 'ini data nama user',
        //                    $('#nama_penyewa').val(data.user.name),
        //                    $('#users').val(data.user.id)

        //             );
        //         }
        //     })
        // }
    }); 

</script>
@endpush

