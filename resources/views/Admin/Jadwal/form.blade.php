    @push('after-style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="form-group">
                        <label for="">Nama Penyewa</label>
                        <select name="users_id" id="gender" class="form-control selectnih @error('name') is-invalid @enderror">
                                @foreach ($user as $user)            
                                <option {{$user->id == $jadwal->users_id ? 'selected' : ''}} value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                        </select>
                    </div>
                    @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                  @enderror
                    <div class="form-group">
                        <label for="kd">Kode Lapangan</label>
                         <select name="id_lapangan" id="kd" class="form-control selectnih @error('kode_lapangan') is-invalid @enderror" required>
                                @foreach ($lapangan as $lpg)            
                                <option {{$lpg->id == $jadwal->id_lapangan ? 'selected' : ''}} value="{{$lpg->id}}">{{$lpg->kode_lapangan}}</option>
                                @endforeach
                        </select>

                    
                    </div>
                             @error('kode_lapangan')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                      @enderror
                    <div class="form-group">
                        <label for="harga">Harga Sewa</label>
                        <input type="number" id="harga" class="form-control @error('harga') is-invalid @enderror"
                         name="harga" value="{{ old('harga') ?? $jadwal->harga}}" required readonly>
                    </div>
                        @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                           </span>
                           @enderror                     
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label for="phone">Tanggal Main </label>
                        
                        <input id="datepicker" type="text" class="form-control  @error('tgl') is-invalid @enderror" name="tanggal_main" value="{{ old('tanggal_main') ?? $jadwal->tanggal_main}}" required>
                    </div>
                        <span class="invalid-feedback" role="alert">
                            <strong id="check"></strong>
                           </span>

                         @error('tgl')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror   
                    
                     <div class="form-group">
                        <label for="Waktu">Waktu Main</label>
                        <input  id="waktu" class="form-control @error('waktu') is-invalid @enderror" name="jam_mulai" value="{{ old('jam_mulai') ??  $jadwal->jam_mulai}}" required>
                    </div>
                         @error('waktu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                </div>
            </div>
             <div class="form-group row mb-0">
                                                    <div class="col-md-6 between">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ $submit ?? 'SAVE' }}
                                                        </button>
                                                    </div>
                </div>
        </div>
    </div>
    @push('after-script')
        
       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
console.firebug=true;
     $(document).ready(function() {
        
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
                console.log(check());

           
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
            

            $('#waktu').change(function() {
            })

        function check(tanggal) {
            const ajax = 
            $.ajax( {
                url : 'check-tanggal',
                type: 'get',
                dataType : 'json',
                succes : function (data) {
                    console.log('ini check', data);
                }
            })
            
        }
    
    }); 

</script>

<script>
</script>
    @endpush