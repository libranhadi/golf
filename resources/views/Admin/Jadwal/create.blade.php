@extends('layouts.admin', ['title'=> 'Page Karyawan'])
@push('after-style')

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            .harga{
                color: rebeccapurple;
            }
        </style>
         <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endpush
@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Form Tambah Jadwal Penyewaan </h2>
                     </div>
                     <form method="POST" action="{{ route('admin-store-jadwal') }}">
                        @csrf
                       
                        @include('Admin.Jadwal.form')
                    </form>
                    
            </div>
        </div>
@endsection
@push('before-script')
  <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    
  
@endpush

