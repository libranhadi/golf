@extends('layouts.admin', ['title'=> 'Page Karyawan'])

@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Ubah Karyawan</h2>
                        <p class="dashboard-subtitle">This Update Karyawan</p>
                     </div>
                     <form method="POST" action="{{ route('admin-update-karyawan', $karyawan->id) }}">
                        @method('PUT')
                        @csrf
                       
                        @include('Admin.Karyawan.form', ['submit' => 'update'])
                    </form>
                    
            </div>
        </div>
@endsection

