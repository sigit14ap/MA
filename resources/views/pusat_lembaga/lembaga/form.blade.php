<div class="row">
    <div class="col-lg-6" style="max-height: 10px;">
        <div class="form-group">
        <label for="kode">Nama Lembaga</label>
        <input type="text" name="nama_lembaga" class="form-control" placeholder="Nama Lembaga" 
        @if($type_form == "edit") 
            value="{{$lembaga->nama_lembaga}}"
        @else
            value="{{old('nama_lembaga')}}"
        @endif
        autofocus required>
        @if ($errors->has('nama_lembaga'))
            <div class="alert alert-danger">
            <strong>Error!</strong> {{ $errors->first('nama_lembaga') }}
            </div>
        @endif
        </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
          <label style="width: 100%;">Takhasus</label>
          <select class="selectpicker" data-live-search="true" id="takhasus" name="takhasus_id">
          @foreach($takhasus as $takh)
              <option value="{{$takh->id}}" 
                @if(($type_form == "edit") && ($lembaga->takhasus_id == $takh->id)) selected @endif>{{$takh->nama_takhasus}}</option>
          @endforeach
          </select>
          @if ($errors->has('takhasus_id'))
              <div class="alert alert-danger">
              <strong>Error!</strong> {{ $errors->first('takhasus_id') }}
              </div>
          @endif
      </div>
  </div>  

  <div class="col-lg-6" style="max-height: 10px;">
      <div class="form-group">
          <label for="nama">Tahun Berdiri</label>
          <input type="text" name="tahun_berdiri" 
          @if($type_form == "edit") 
            value="{{$lembaga->tahun_berdiri}}"
          @else
            value="{{old('tahun_berdiri')}}"
          @endif 
            class="date form-control" placeholder="Tahun Berdiri" required>
          @if ($errors->has('tahun_berdiri'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('tahun_berdiri') }}
          </div>
          @endif
      </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group" style="width: 100%;">
        <label>Provinsi</label>
        <select class="selectpicker" data-live-search="true" name="provinsi_id" id="province" style="width: 100%;">
        <option id="pilih_provinsi" value="" selected>Pilih Provinsi</option>
        @foreach($provinsi as $prov)
            <option value="{{$prov->id}}" 
            @if(($type_form == "edit") && ($lembaga->provinsi_id == $prov->id)) selected @endif>{{$prov->nama_provinsi}}</option>
        @endforeach
        </select>
          @if ($errors->has('provinsi_id'))
            <div class="alert alert-danger">
            <strong>Error!</strong> {{ $errors->first('provinsi_id') }}
            </div>
          @endif
      </div>
  </div>
  
  <div class="col-lg-6">
      <div class="form-group">
        <label>Kabupaten/Kota</label>
        <select class="selectpicker" data-live-search="true" name="kabupaten_id" id="city" style="width: 100%;" @if($type_form == "create") disabled @endif>
            @if($type_form == "create")
                <option id="pilih_kota">Pilih Provinsi Dahulu</option>
            @else
                @foreach($kota as $city)
                    <option value="{{$city->id}}" @if($city->id == $lembaga->kabupaten_id) selected @endif>{{$city->nama_kabupaten}}</option>
                @endforeach
            @endif
        </select>
          @if ($errors->has('kabupaten_id'))
            <div class="alert alert-danger">
            <strong>Error!</strong> {{ $errors->first('kabupaten_id') }}
            </div>
          @endif
        </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
        <label for="nama">Alamat</label>
        <textarea class="form-control" 
        name="alamat" placeholder="Alamat" style="resize: none;" required>
        @if($type_form == "edit") 
            {{$lembaga->alamat}}
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
        <label for="nama">Telepon</label>
        <input type="text" maxlength="50" 
        @if($type_form == "edit") 
            value="{{$lembaga->no_telpn}}"
        @else
            value="{{old('no_telpn')}}"
        @endif
        name="no_telpn" class="form-control" placeholder="Telepon" required>
        @if ($errors->has('no_telpn'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('no_telpn') }}
          </div>
        @endif
      </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
        <label for="nama">Fax</label>
        <input type="text" maxlength="50"
        @if($type_form == "edit") 
            value="{{$lembaga->fax}}"
        @else
            value="{{old('fax')}}"
        @endif
        name="fax" class="form-control" placeholder="Fax" required>
        @if ($errors->has('fax'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('fax') }}
          </div>
        @endif
      </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
        <label for="nama">Email</label>
        <input type="email" maxlength="100" 
        @if($type_form == "edit") 
            value="{{$lembaga->email}}"
        @else
            value="{{old('email')}}"
        @endif
        name="email" class="form-control" placeholder="Email" required>
        @if ($errors->has('email'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('email') }}
          </div>
        @endif
      </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
        <label for="nama">Website</label>
        <input type="text" maxlength="100"
        @if($type_form == "edit") 
            value="{{$lembaga->website}}"
        @else
            value="{{old('website')}}"
        @endif
        name="website" class="form-control" placeholder="Website" required>
        @if ($errors->has('website'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('website') }}
          </div>
        @endif
      </div>
  </div>

  <div class="col-lg-6">
        <div class="form-group">
            <label for="kode">Nama Mudir</label>
            <input type="text" name="nama_mudir" class="form-control" placeholder="Nama Mudir" 
            @if($type_form == "edit") 
                value="{{$lembaga->nama_mudir}}"
            @else
                value="{{old('nama_mudir')}}"
            @endif
            autofocus required>
            @if ($errors->has('nama_mudir'))
                <div class="alert alert-danger">
                <strong>Error!</strong> {{ $errors->first('nama_mudir') }}
                </div>
            @endif
        </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
        <label for="nama">Luas Tanah</label>
        <input type="number"step=0.01 name="luas_tanah" 
        @if($type_form == "edit") 
            value="{{$lembaga->luas_tanah}}"
        @else
            value="{{old('luas_tanah')}}"
        @endif
        class="form-control" placeholder="Luas Tanah" required>
        @if ($errors->has('luas_tanah'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('luas_tanah') }}
          </div>
        @endif
      </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
          <label style="width: 100%;">Pesantren</label>
          <select class="selectpicker" data-live-search="true" id="pesantren" name="pesantren_id">
          @foreach($pesantren as $ptren)
              <option value="{{$ptren->id}}" 
                @if(($type_form == "edit") && ($lembaga->pesantren_id == $ptren->id)) selected @endif>{{$ptren->nama_pondok_pesantren}}</option>
          @endforeach
          </select>
          @if ($errors->has('pesantren_id'))
              <div class="alert alert-danger">
              <strong>Error!</strong> {{ $errors->first('pesantren_id') }}
              </div>
          @endif
      </div>
  </div>  

</div>