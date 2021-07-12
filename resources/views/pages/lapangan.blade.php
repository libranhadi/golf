@extends('layouts.test', ['title' => 'Lapangan Sawangan Golf'])

@section('content')
<div class="page-lapangan">
    <section class="section-lapangan">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-sm-10">
                    
                    <div class="card">
                        
                        <h5 class=" py-3 px-4">
                            Lapangan Sawangan Golf Course
                        </h5>
                        @foreach ($lapangan as $lapangan)
                        <div class="card-body text-center">
                            <div class="lapangan-title">
                                Tee Box
                            </div>
                            <div class="lapangan-title">
                                {{ $lapangan->tee_box }}
                            </div>
                            <div class="kode-lapangan">
                                {{ $lapangan->kode_lapangan }}
                            </div>
                            <hr>
                            @endforeach
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
