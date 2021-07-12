@extends('layouts.admin', ['title'=> 'Lapangan'])

@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Lapangan Dashboard</h2>
                        <p class="dashboard-subtitle">This Page Lapangan</p>
                     </div>

                    <div class="dashboard-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <a href="{{ Route('admin-create-lapangan') }}" class="btn btn-primary mb-3">+ Tambah Lapangan</a>
                                            <div class="table table-responsive">
                                            <table class="table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Kode Lapangan</th>
                                                        <th>Tee Box</th>
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
            {data: 'kode_lapangan' , name: 'kode_lapangan'},
            {data: 'tee_box' , name: 'tee_box'},
       
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
