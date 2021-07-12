@extends('layouts.admin', ['title'=> 'Pelanggan'])

@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Penyewaan Dashboard</h2>
                     </div>

                    <div class="dashboard-content my-5 mx-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <a href="{{ Route('admin-create-penyewaan') }}" class="btn btn-primary mb-3 ">+ Tambah Penyewaan</a>
                                        
                                            
                                        <div class="table table-responsive">
                                            <table class="table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Kode Sewa</th>
                                                        <th>Tanggal Main</th>
                                                        <th>Jam Mulai</th>
                                                        <th>Harga</th>
                                                        <th>Status</th>
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
            {data: 'kode_sewa' , name: 'kode_sewa'},
            {data: 'jadwal.tanggal_main' , name: 'jadwal.tanggal_main'},
            {data: 'jadwal.jam_mulai' , name: 'jadwal.jam_mulai'},
            {data: 'jadwal.harga' , name: 'jadwal.harga'},
            {data: 'status_penyewaan' , name: 'status_penyewaan'},

       
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
