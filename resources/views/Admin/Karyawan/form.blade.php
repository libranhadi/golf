    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 ">
                    <div class="form-group">
                                                    <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>

                                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $karyawan->name}}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="email" class=" col-form-label text-md-right">{{ __('Email') }}</label>

                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $karyawan->email}}" required>

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                                 <div class="form-group">
                                                    <label for="password" class=" col-form-label text-md-right">{{ __('Password') }}</label>

                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password')}}">

                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                                <div class="form-group">
                                                                <label for="address" class=" col-form-label text-md-right">{{ __('Address') }}</label>
                                                                   
                                                                     <textarea name="address" id="address" cols="30" rows="10" class="form-control @error('address') is-invalid @enderror">{{ old('address') ?? $karyawan->address }}</textarea>
                                                                    @error('address')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                            </div>
                                        
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label for="phone" class=" col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') ?? $karyawan->phone_number}}" >

                        </div>
                        @error('phone')
                                 <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                       @enderror
                         <div class="form-group">
                                                                <label for="gender" class=" col-form-label text-md-right">{{ __('Gender') }}</label>

                                                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror">
                                                                
                                                                         <option value="laki-laki">Laki-laki</option>
                                                                         <option value="Perempuan">Perempuan</option>

                                                                    </select>

                                                                    @error('gender')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                </div>
                             <div class="form-group">
                                                                <label for="gender" class=" col-form-label text-md-right">{{ __('ROLES') }}</label>

                                                                <select name="roles" id="roles" class="form-control @error('roles') is-invalid @enderror">
                                                                
                                                                         <option value="KARYAWAN" >KARYAWAN</option>
                                                                         <option value="ADMIN">ADMIN</option>

                                                                    </select>

                                                                    @error('roles')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                            </div>
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