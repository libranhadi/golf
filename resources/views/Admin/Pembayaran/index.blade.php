@extends('layouts.admin', ['title'=> 'Pelanggan'])

@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Pembayaran Dashboard</h2>
                     </div>

                    <div class="dashboard-content my-5 mx-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                        {{-- <a href="{{ Route('admin-create-penyewaan') }}" class="btn btn-primary mb-3">+ Tambah Penyewaan</a> --}}
                                        {{-- <div class="d-flex justify-content-center">
                                            <div class="col-md-3">

                                                <div>

                                                    <input type="date" id="tgl_awal" name="tgl_awal" class="form-control">
                                                </div>
                                                
                                            </div>
                                            <h5>TO</h5>
                                            <div class="col-md-3">
                                                <div>

                                                    <input type="date" id="tgl_akhir" name="tgl_akhir" class="form-control">
                                                </div>
                                            </div >
                                        </div> --}}
                                        <div class="table table-responsive">
                                            <table class="table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                         <th>Name</th>
                                                         <th>No Phone</th>
                                                         <th>Harga</th> 
                                                         <th>Kode</th> 
                                                         <th>Status</th>
                                                        <th>Bukti Bayar</th>
                                                        <th>AKSI</th>
                                                    </tr>

                                                </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div>     
                                        </div>

                                    </div>
                                </div>
                            </div>
                    </div>
         </div>
        </div>
@endsection
@push('after-script')
<script>
    $(document).ready(function(){

    var datatable = $('#crudTable').DataTable({
        processing : true,
        serverSide : true,
        ordering : true,
        ajax: {
            url: '{!! url()->current() !!}',
            // url : 'penyewaan',
        },
        columns: [
            {data: 'id' , name: 'id'},
            {data: 'user.name' , name: 'user.name'},
            {data: 'user.phone_number' , name: 'user.phone_number'},
            {data: 'jadwal.harga' , name: 'jadwal.harga'},
            {data: 'kode_pembayaran' , name: 'kode_pembayaran'},
            {data: 'status_pembayaran' , name: 'status_pembayaran'},
            // {data: 'paid' , name: 'paid'},


             {
                data: 'photo', 
                name:'photo',
               width: '15%'
            },

            {
                data: 'action', 
                name:'action',
                orderable:false,
                searcable:false,
                width: '15%'   
            },
        ]
    }) 

   
  


    })

</script>
    
@endpush
