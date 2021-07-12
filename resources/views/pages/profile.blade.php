@extends('layouts.test', ['title' => 'Jadwal'])
  @push('after-style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
@section('content')
<div class="page-profile">
    <section class="section-profile">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-10">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>                        
                    @endif
                    <div class="card">
                        
                        <h5 class=" py-3 px-4">
                            Profile Account
                        </h5>
                       <div class="card-body">
                            <form action="{{ route('profile-update', Auth::user()->id) }}" method="post">
                                @method('PUT')
                                @csrf
                                <div class="d-flex">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                        </div>   
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password"  name="password" class="form-control">
                                        </div>    
                                        <div class="form-group">
                                            <label for="">Jenis Kelamin</label>
                                            <select name="gender" id="" class="form-control ">
                                                
                                                <option {{ $user->gender ? 'selected' : '' }} value="{{ $user->gender }}">{{ $user->gender }}</option>
                                                @if ($user->gender === 'Perempuan')
                                                    <option value="laki-laki">laki-laki</option>
                                                @else
                                                <option value="Perempuan"> Perempuan</option> 
                                                @endif

                                            </select>
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">E-mail</label>
                                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Number Phone</label>
                                            <input type="number" name="phone_number" class="form-control" value="{{ $user->phone_number }}">
                                        </div>
                                         <div class="form-group">
                                            <label for="">Alamat</label>
                                            {{-- @if ($user->address) --}}
                                            <textarea name="address" id="" cols="30" rows='5' class="form-control address" value="{{ $user->address }}">
                                               
                                            </textarea>
                                            {{-- @endif --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 justify-content-between">
                                        <button type="submit" class="btn btn-primary">
                                            SAVE
                                        </button>
                                </div>
                                <div class="form-group d-flex">                                    
                                    
                                </div>

                            </form>
                       </div>
                       
                    </div>
                        
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
