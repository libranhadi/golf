@extends('layouts.admin', ['title'=> 'Page Karyawan'])
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
       <div class="section-content section-dashboard-home">
            <div class="container-fluid">
                    <div class="dashboard-heading">

                        <h2 class="dashboard-title my-5">Form Tambah Penyewaan</h2>
                     </div>
                     <form method="POST" action="{{ route('admin-store-penyewaan') }}" class="py-3">
                        @csrf
                       
                        @include('Admin.Penyewaan.form')
                    </form>
                    
            </div>
        </div>
@endsection
@push('after-script')
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        console.firebug=true;
        // ini tidak terpakai
     $(document).ready(function() {                
        $('.select2').select2();
        $('#jadwal').change(function(e) {
            e.preventDefault();
            let id = $('#jadwal').val();

            const promise = new Promise((resolve , reject) =>{
                if (id == 'pilih') {
                    alert('Silahkan Pilih Opsi Kode Jadwal');
                    $('#nama_penyewa').val(''),
                           $('#users').val(''),
                           $('#harga').val(''),
                           $('#waktu').val(''),
                           $('#tanggal').val(''),
                reject(console.error('error'));
                } else {
                resolve(getData(id));
                     
                   
                }
            });
            
        });



        function getData(id) {
          const ajax =  
             $.ajax( {
                url : 'show-penyewaan/ '+ id ,
                type: 'get',
                dataType : 'json',
                success : function(data) {
                    console.log( 'ini data nama user',
                           $('#nama_penyewa').val(data.user.name),
                           $('#users').val(data.user.id),
                           $('#harga').val(data.harga),
                           $('#waktu').val(data.jam_mulai),
                           $('#tanggal').val(data.tanggal_main),



                        data

                    );
                }
            })
        }
    }); 

</script>
<script>
     $(document).ready(function() {
        
         $('#tanggal').datepicker({
            //  dateFormat: 'dd-DD-mm-yy',
             dateFormat: 'yy-mm-dd',

              minDate: new Date(),
               dayNames: [ "Sunday", "Monday", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu" ],

        //    buttonImage: for image
        });
      
    
         $('#tanggal').change( function(){
            
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

    $('.selectnih').select2();
            
    
    
    }); 

</script>
@endpush

