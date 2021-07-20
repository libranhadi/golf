      
     
      @push('after-style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
       
    @endpush
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
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6 ">
                    <input type="hidden" name="users_id" id="users" class=" @error('name') is-invalid @enderror" >
                     @error('users')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                         @enderror
                    <div class="form-group">
                        <label for="jadwal">Kode Jadwal</label>
                         <select name="id_jadwal" id="jadwal" class="form-control select2 @error('kdjadwal') is-invalid @enderror" required>
                                  
                             <option value="pilih">-- PILIH OPSI --</option>
                        @foreach ($jadwal as $jadwal)
                            
                        <option {{ $jadwal->id == $penyewaan->id_jadwal ? 'selected' : '' }}value="{{ old('id') ?? $jadwal->id}}" style="height: 40px; width:100px;">{{ $jadwal->kode_jadwal }} (Name Customer : {{ $jadwal->user->name }})</option>
                        @endforeach
                        </select>

                    </div>
                    @error('kdjadwal')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                     @enderror
                    
                    <div class="form-group">
                        <label for="nama">Nama Penyewa</label>
                        
                        <input type="text" id="nama_penyewa" class="form-control iya @error('nama_penyewa') is-invalid @enderror" style="border : none"   value="{{ old('nama_penyewa') ?? $penyewaan->nama_penyewa}}" readonly>
                      
                        
                    </div>
                    @error('nama_penyewa')
                       <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                       </span>
                   @enderror 
                     <div class="form-group">
                        <label for="status">Status Penyewaan</label>
                         <select name="status_penyewaan" id="status" class="form-control @error('status') is-invalid @enderror">
                                  
                    
                        @if ($penyewaan->status_penyewaan == 'SUDAH BAYAR')
                            <option value="{{ $penyewaan->status_penyewaan }}" class="text-success">{{ $penyewaan->status_penyewaan }}</option>
                        <option value="BELUM BAYAR" class="text-danger">Belum Bayar</option>

                        @else
                                <option disabled>-- PILIH OPSI --</option>                            
                        <option value="BELUM BAYAR" class="text-danger">Belum Bayar</option>
                        <option value="SUDAH BAYAR " class="text-success">Sudah Bayar</option>
                        @endif
                     
                        </select>

                        @error('status')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                         @enderror
                    </div>
                       
                     <div class="form-group">
                        <label for="">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" readonly>
                    </div>
                    <div class="form-group ">
                                                               <button type="submit" class="btn btn-primary" id="button">
                                                                   {{ $submit ?? 'SAVE' }}
                                                               </button>
                       </div>
                </div>
                {{-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tanggal Main</label>
                        <input type="text" class="form-control" id="tanggal" name="tanggal_main" >
                    </div>
                    <div class="form-group">
                        <label for="">Jam Mulai</label>
                        <input type="text" class="form-control" id="waktu" name="jam_mulai">
                    </div>
                   
                </div> --}}
            </div>
        </div>
    </div>
    @push('after-script')
        
       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script> --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    @endpush