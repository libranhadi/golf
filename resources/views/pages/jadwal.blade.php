@extends('layouts.app', ['title' => 'Jadwal'])
@push('after-style')

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            .harga{
                color: rebeccapurple;
            }
        </style>
         <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
         {{-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css"> --}}
@endpush
@section('content')
<div class="page=content page-jadwal">
    <section class="section-jadwal">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <h1>KALENDER</h1>
                        <input id="datepicker" width="276"/>
                        <hr>
                        <input width="276" id="harga" type="integer"class="harga"/>
                        <p id="demo"></p>
                        <input width="276" id="time" class="harga"/>
                        
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('after-script')

       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script> --}}
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> --}}

<script>
console.firebug=true;
     $(document).ready(function() {
        
         $('#datepicker').datepicker({
             dateFormat: 'dd-DD-mm-yy',
              minDate: new Date(),
               dayNames: [ "Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu" ],

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
           
         });

           $('#time').timepicker({
               timeFormat: 'hh:mm p',
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