@extends('layouts.admin', ['title'=> 'Pelanggan'])

@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Pelanggan Dashboard</h2>
                        <p class="dashboard-subtitle">This Page Pelanggan</p>
                     </div>

                    <div class="dashboard-content my-5 mx-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <a href="{{ Route('admin-create-pelanggan') }}" class="btn btn-primary mb-3">+ Tambah Pelanggan</a>
                                            <div class="table table-responsive">
                                            <table class="table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>E mail</th>
                                                        <th>N0_Phone</th>
                                                        <th>Alamat</th>

                                                        <th>Jenis Kelamin</th>
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
  {{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script> --}}

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
            {data: 'name' , name: 'name'},
            {data: 'email' , name: 'email'},
            {data: 'phone_number' , name: 'phone_number'},
            {data: 'address' , name: 'address'},

            {data: 'gender' , name: 'gender'},
       
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
