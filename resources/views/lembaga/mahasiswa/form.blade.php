<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
        <label for="kode">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" maxlength="100" class="form-control" placeholder="Nama Lengkap" 
        @if($type_form == "edit") 
            value="{{$mahasiswa->nama_lengkap}}"
        @else
            value="{{old('nama_lengkap')}}"
        @endif
        autofocus required>
        @if ($errors->has('nama_lengkap'))
            <div class="alert alert-danger">
            <strong>Error!</strong> {{ $errors->first('nama_lengkap') }}
            </div>
        @endif
        </div>
  </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label for="kode">Tempat Lahir</label>
            <input type="text" name="tempat_lahir" maxlength="100" class="form-control" placeholder="Tempat Lahir" 
            @if($type_form == "edit") 
                value="{{$mahasiswa->tempat_lahir}}"
            @else
                value="{{old('tempat_lahir')}}"
            @endif
            autofocus required>
            @if ($errors->has('tempat_lahir'))
                <div class="alert alert-danger">
                <strong>Error!</strong> {{ $errors->first('tempat_lahir') }}
                </div>
            @endif
        </div>
  </div>

  <div class="col-lg-6" style="margin-bottom: -4px;">
      <div class="form-group">
          <label for="nama">Tanggal Lahir</label>
          <input type="text" name="tanggal_lahir" 
          @if($type_form == "edit") 
            value="{{$mahasiswa->tanggal_lahir}}"
          @else
            value="{{old('tanggal_lahir')}}"
          @endif 
            class="date form-control" placeholder="Tanggal Lahir" required>
          @if ($errors->has('tanggal_lahir'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('tanggal_lahir') }}
          </div>
          @endif
      </div>
  </div>

  <div class="col-lg-6">
    <div class="form-group" style="width: 100%;">
      <label>Mukim</label>
      <select class="selectpicker" name="mukim" id="mukim" style="width: 100%;">
      <option value="1" selected>Ya</option>
      <option value="0">Tidak</option>
      </select>
        @if ($errors->has('mukim'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('mukim') }}
          </div>
        @endif
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group" style="width: 100%;">
      <label>Kewarganegaraan</label>
      <select class="selectpicker" name="kewarganegaraan" id="kewarganegaraan" style="width: 100%;">
      <option value="WNI" selected>WNI</option>
      <option value="WNA">WNA</option>
      </select>
        @if ($errors->has('kewarganegaraan'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('kewarganegaraan') }}
          </div>
        @endif
    </div>
</div>

<div class="col-lg-6">
    <div class="form-group">
        <label for="kode">Negara Asal</label>
        <input type="text" name="negara_asal" maxlength="100" class="form-control" placeholder="Negara Asal" 
        @if($type_form == "edit") 
            value="{{$mahasiswa->negara_asal}}"
        @else
            value="{{old('negara_asal')}}"
        @endif
        autofocus required>
        @if ($errors->has('negara_asal'))
            <div class="alert alert-danger">
            <strong>Error!</strong> {{ $errors->first('negara_asal') }}
            </div>
        @endif
    </div>
</div>

  <div class="col-lg-6">
      <div class="form-group" style="width: 100%;">
        <label>Provinsi Asal</label>
        <select class="selectpicker" data-live-search="true" name="provinsi_asal" id="province" style="width: 100%;">
        <option id="pilih_provinsi" value="" selected>Pilih Provinsi</option>
        @foreach($provinsi as $prov)
            <option value="{{$prov->id}}" 
            @if(($type_form == "edit") && ($mahasiswa->provinsi_asal == $prov->id)) selected @endif>{{$prov->nama_provinsi}}</option>
        @endforeach
        </select>
          @if ($errors->has('provinsi_asal'))
            <div class="alert alert-danger">
            <strong>Error!</strong> {{ $errors->first('provinsi_asal') }}
            </div>
          @endif
      </div>
  </div>
  
  <div class="col-lg-6">
      <div class="form-group">
        <label>Kabupaten/Kota Asal</label>
        <select class="selectpicker" data-live-search="true" name="kabupaten_asal" id="city" style="width: 100%;" @if($type_form == "create") disabled @endif>
            @if($type_form == "create")
                <option id="pilih_kota">Pilih Provinsi Dahulu</option>
            @else
                @foreach($kota as $city)
                    <option value="{{$city->id}}" @if($city->id == $mahasiswa->kabupaten_asal) selected @endif>{{$city->nama_kabupaten}}</option>
                @endforeach
            @endif
        </select>
          @if ($errors->has('kabupaten_asal'))
            <div class="alert alert-danger">
            <strong>Error!</strong> {{ $errors->first('kabupaten_asal') }}
            </div>
          @endif
        </div>
  </div>

  <div class="col-lg-6">
        <div class="form-group" style="width: 100%;">
        <label>Asal Pendidikan</label>
        <select class="selectpicker" name="asal_pendidikan" id="asal_pendidikan" style="width: 100%;">
        <option value="Pesantren" selected>Pesantren</option>
        <option value="Madrasah Aliyah">Madrasah Aliyah</option>
        <option value="SMA / SMK">SMA / SMK</option>
        </select>
            @if ($errors->has('asal_pendidikan'))
            <div class="alert alert-danger">
            <strong>Error!</strong> {{ $errors->first('asal_pendidikan') }}
            </div>
            @endif
        </div>
    </div>

  <div class="col-lg-6" style="margin-bottom: -10px;">
      <div class="form-group">
        <label for="nama">Alamat</label>
        <textarea class="form-control" 
        name="alamat" placeholder="Alamat" style="resize: none;" required>
        @if($type_form == "edit") 
            {{$mahasiswa->alamat}}
        @else
            {{old('alamat')}}
        @endif</textarea>
        @if ($errors->has('alamat'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('alamat') }}
          </div>
        @endif
      </div>
  </div>

    <div class="col-lg-6">
        <div class="form-group">
            <label style="width: 100%;">Lembaga</label>
            <select class="selectpicker" data-live-search="true" id="lembaga_id" name="lembaga_id">
            @foreach($lembaga as $lemb)
                <option value="{{$lemb->id}}" 
                    @if(($type_form == "edit") && ($mahasiswa->lembaga_id == $lemb->id)) selected @endif>{{$lemb->nama_lembaga}}</option>
            @endforeach
            </select>
            @if ($errors->has('lembaga_id'))
                <div class="alert alert-danger">
                <strong>Error!</strong> {{ $errors->first('lembaga_id') }}
                </div>
            @endif
        </div>
    </div>  

</div>