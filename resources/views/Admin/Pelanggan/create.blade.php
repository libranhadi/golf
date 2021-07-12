@extends('layouts.admin', ['title'=> 'Pelanggan'])

@section('content')
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title">Tambah Pelanggan</h2>
                        <p class="dashboard-subtitle">This Create Customer</p>
                     </div>
                     <form method="POST" action="{{ route('admin-store-pelanggan') }}">
                        @csrf
                        {{-- <div class="row justify-content-center">
                            
                            <div class="col-md-6 mx-5">
                                <div class="card">
                                        <p class="dashboard-subtitle mx-4 mt-4">Primary Profile</p>
                                            <div class="card-body mx-2">
                                                <div class="form-group">
                                                    <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class=" col-form-label text-md-right">{{ __('Email') }}</label>

                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                                 <div class="form-group">
                                                    <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required>

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                        
                                            </div>  
                                            
                                    </div>
                            </div>

                        </div>
                          <div class="row ">
                            
                            <div class="col-md-12 mx-5">
                                <div class="card my-4">
                                            <div class="card-body mx-2">
                                                <div class="row justify-content-center">

                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                <label for="phone" class=" col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required >

                                                                    @error('phone')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="gender" class=" col-form-label text-md-right">{{ __('Gender') }}</label>

                                                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                                
                                                                        <option value="laki-laki">Laki - Laki</option>
                                                                        <option value="Perempuan">Perempuan</option>

                                                                    </select>

                                                                    @error('gender')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-md-6">
                                                             <div class="form-group">
                                                                <label for="address" class=" col-form-label text-md-right">{{ __('Address') }}</label>

                                                             
                                                                    <textarea name="address" id="address" cols="30" rows="10" class="form-control @error('address') is-invalid @enderror" ></textarea>
                                                                    @error('address')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                                        </div>

                                                </div>
                                                  <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-5">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Save') }}
                                                        </button>
                                                    </div>
                                                </div>
                                        
                                            </div>  
                                            
                                    </div>
                            </div>

                        </div> --}}
                        @include('Admin.Pelanggan.form')
                    </form>
                    
            </div>
        </div>
@endsection

