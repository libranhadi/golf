@extends('layouts.admin', ['title'=> 'Pelanggan'])

@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Jadwal Dashboard</h2>
                     </div>

                    <div class="dashboard-content my-5 mx-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <a href="{{ Route('admin-create-jadwal') }}" class="btn btn-primary mb-3">+ Tambah Jadwal</a>
                                            <div class="table table-responsive">
                                            <table class="table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Nama Pelanggan</th>
                                                        <th>Tee Box</th>
                                                        <th>Jam Mulai</th>
                                                        <th>Tanggal Main</th>
                                                        <th>Kode Jadwal</th>

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
    var datatable = $('#crudTable').DataTable({
        processing : true,
        serverSide : true,
        ordering : true,
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [
            {data: 'id' , name: 'id'},
            {data: 'user.name' , name: 'user.name'},
            {data: 'lapangan.tee_box' , name: 'lapangan.tee_box'},
            {data: 'jam_mulai' , name: 'jam_mulai'},
            {data: 'tanggal_main' , name: 'tanggal_main'},
            {data: 'kode_jadwal' , name: 'kode_jadwal'},
            // {data: 'user.phone_number' , name: 'user.phone_number'},


       
            {
                data: 'action', 
                name:'action',
                orderable:false,
                searcable:false,
                width: '15%'   
            },
        ]
    }) 
</script>
    
@endpush
