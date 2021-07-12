@extends('layouts.user')

@section('content')
<div class="page-auth">
    <div class="section-store-auth">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-5 text-center">
                    <img src="https://images.unsplash.com/photo-1592967449177-d88a95223c86?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTZ8fGdvbGYlMjBjbHVifGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="" class="w-50 gambar mb-lg-none">
                </div>
                <div class="col-lg-5 login-form">
                    <h2 class="my-3 mx-3">Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                     @csrf

                        <div class="form-group">
                            <label for="email" class="col-md-6 col-form-label ">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-5 ">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group d-flex mb-5">
                            <div class="col-md-10 ">
                                <button type="submit" class="btn btn-primary mr-2">
                                    {{ __('Login') }}
                                </button>
                                Belum Punya Akun ?       
                                <a class="text-success" href="{{ route('register') }}">
                                    registrasi
                                </a>
                                    
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-3">
                <img src="https://images.unsplash.com/photo-1584837140804-599306fb37f9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDB8fGdvbGYlMjBjb3Vyc2V8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="" class="w-100">
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                

                <div class="form-group d-flex mb-0">
                    <div class="col-md-10 ">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                        Belum Punya Akun ?       
                        <a class="text-success" href="{{ route('register') }}">
                            registrasi
                        </a>
                            
                           
                    </div>
                </div>
            </form>
                </div>
            </div>
            
        </div>
    </div>
</div> --}}
@endsection
