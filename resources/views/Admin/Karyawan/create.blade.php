@extends('layouts.admin', ['title'=> 'Page Karyawan'])

@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Tambah Karyawan</h2>
                        <p class="dashboard-subtitle">This Create Karyawan</p>
                     </div>
                     <form method="POST" action="{{ route('admin-store-karyawan') }}">
                        @csrf
                       
                        @include('Admin.Karyawan.form')
                    </form>
                    
            </div>
        </div>
@endsection

