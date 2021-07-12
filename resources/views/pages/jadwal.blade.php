@extends('layouts.test', ['title' => 'Jadwal'])
@push('after-style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.css"/>
@endpush
@section('content')
<div class="page-jadwal">
    <section class="section-jadwal">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-10">
                    
                    <div class="card">
                        <div class="dashboard-title py-3 px-4">
                            Jadwal Sawangan Golf Course
                        </div>
                        <div class="card-body">
                              <div class="table table-responsive">
                                            <table class="table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Pelanggan</th>
                                                        <th>Tanggal</th>
                                                        <th>Jam</th>
                                                        <th>Tee Box</th>
                                                   

                                                        
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
    </section>
</div>
@endsection
@push('after-script')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/datatables.min.js"></script>
<script>
    var datatable = $('#crudTable').DataTable({
        processing : true,
        serverSide : true,
        ordering : true,
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [
            {data: 'user.name' , name: 'user.name'},
            {data: 'tanggal_main' , name: 'tanggal_main'},
            {data: 'jam_mulai' , name: 'jam_mulai'},
            {data: 'lapangan.tee_box' , name: 'lapangan.tee_box'},


       
         
        ]
    }) 
</script>
@endpush