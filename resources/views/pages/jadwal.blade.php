@extends('layouts.app', ['title' => 'Jadwal'])
@push('after-style')
        {{-- <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" /> --}}

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            .harga{
                color: rebeccapurple;
            }
        </style>
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
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('after-script')

      {{-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> --}}
       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
console.firebug=true;
    

     $(document).ready(function() {
      
         $('#datepicker').datepicker({
              minDate: new Date(),
               dayNames: [ "Dimanche", "Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi" ],

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
            console.log(jsDate);
           
         });
     
    });
     
 

     
        

</script>
@endpush