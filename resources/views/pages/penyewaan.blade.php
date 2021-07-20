@extends('layouts.test', ['title' => 'Form Sewa Lapangan'])
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
<div class="page-sewa">
    <section class="section-sewa">
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
                            Form Sewa
                        </h5>
                       <div class="card-body">
                            <form action="{{ route('store-sewa') }}" method="post">
                                @csrf
                                <div class="d-flex">

                                    <div class="col-md-6">
                                        {{-- <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" autofocus class="form-control" value="{{ Auth::user()->name}}">
                                        </div>   
                                        <div class="form-group">
                                            <label for="">No_Phone</label>
                                            <input type="number" name="phone_number" class="form-control" value="{{ old('phone_number') ?? Auth::user()->phone_number}}">
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="Waktu">Jam Main</label>
                                            <input  id="waktu" type="time" class="form-control" name="jam_mulai" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tee">Tee Box</label>
                                           <select name="id_lapangan" id="kd" class="form-control selectnih" required>
                                               @foreach ($lapangan as $lpg)            
                                                    <option value="{{$lpg->id}}">{{$lpg->tee_box}}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- <div class="form-group">
                                            <label for="">E-mail</label>
                                            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}">
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="phone">Tanggal Main </label>
                                            
                                            <input id="datepicker" type="text" class="form-control  " name="tanggal_main" value="{{ old('tanggal_main') }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga Sewa</label>
                                            <input type="number" id="harga" class="form-control"
                                            name="harga" value="{{ old('harga')}}" required readonly >
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="">Alamat</label>
                                            <textarea name="address" id="" cols="30" rows='5' class="form-control address" value="{{ Auth::user()->address }}">
                                               
                                            </textarea>
                                        
                                        
                                        </div> --}}
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
@push('after-script')
       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
        $(document).ready(function(){
              $('#datepicker').datepicker({
            //  dateFormat: 'dd-DD-mm-yy',
             dateFormat: 'yy-mm-dd',

              minDate: new Date(),
               dayNames: [ "Sunday", "Monday", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu" ],

        //    buttonImage: for image
        });
      
    
         $('#datepicker').change( function(){
            
            

            var jsDate = $(this).datepicker('getDate');
            if (jsDate !== null) { // if any date selected in datepicker
                // jsDate instanceof Date; // -> true
                var y = jsDate.getDay();
                // jsDate.getMonth();
                // jsDate.getFullYear();
                if (y == 0 || y == 6) {
                    $('#harga').val(350000);
                    
                } else {
                    $('#harga').val(250000);
                    
                }
            }
            // console.log(jsDate);
                // console.log(check());

           
         });
         $('#waktu').timepicker({
            //    timeFormat: 'hh:mm p',
               timeFormat: 'HH:mm:ss',

                interval: 30,
                minTime: '6:30',
                maxTime: '3:00pm',
                defaultTime: '08:00',
                startTime: '06:30',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });
        });
    </script>
@endpush