@extends('layouts.admin', ['title'=> 'Pelanggan'])

@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Ubah Pelanggan</h2>
                        <p class="dashboard-subtitle">This Update Customer</p>
                     </div>
                     <form method="POST" action="{{ route('admin-update-pelanggan', $pelanggan->id) }}">
                       @method('PUT')
                        @csrf
                        
                        @include('Admin.Pelanggan.form', ['submit' => 'Update'])
                    </form>
                    
            </div>
        </div>
@endsection

