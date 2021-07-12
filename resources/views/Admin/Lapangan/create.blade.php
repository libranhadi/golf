@extends('layouts.admin' , ['title' => 'Category' ])
@section('content')

<div class="container">
     <div class="row">
        <div class="col-md-12">
             @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                @endif
        </div>
    
    <div class="col-md-10 mt-4">
    <div class="d-flex justify-content-center">
        <form method="POST" action="{{ Route('admin-store-lapangan') }}">
            @csrf
            <div class="form-group">
                <label for="code">Kode Lapangan</label>
                <input type="text" class="form-control" id="code" name="kode_lapangan">
            </div>
            <div class="form-group">
                <label for="teeBox">Tee Box</label>
                <input type="number" class="form-control" id="teeBox" name="tee_box">
            </div>
            <button class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
</div>
@endsection