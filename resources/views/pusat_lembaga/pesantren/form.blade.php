<div class="row">
    <div class="col-lg-6">
    <div class="form-group">
      <label for="kode">Nama Pondok Pesantren</label>
      <input type="text" name="nama_pondok_pesantren" class="form-control" placeholder="Nama Pondok Pesantren" 
      @if($type_form == "edit") 
        value="{{$pesantren->nama_pondok_pesantren}}"
      @else
        value="{{old('nama_pondok_pesantren')}}"
      @endif
      autofocus required>
      @if ($errors->has('nama_pondok_pesantren'))
        <div class="alert alert-danger">
        <strong>Error!</strong> {{ $errors->first('nama_pondok_pesantren') }}
        </div>
      @endif
    </div>
  </div>

  <div class="col-lg-6">
    <div class="form-group">
      <label for="nama">Nama Yayasan</label>
      <input type="text" name="nama_yayasan"
      @if($type_form == "edit") 
        value="{{$pesantren->nama_yayasan}}"
      @else
        value="{{old('nama_yayasan')}}"
      @endif 
      class="form-control" placeholder="Nama Yayasan" required>
      @if ($errors->has('nama_yayasan'))
        <div class="alert alert-danger">
        <strong>Error!</strong> {{ $errors->first('nama_yayasan') }}
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
                @if(($type_form == "edit") && ($pesantren->takhasus_id == $takh->id)) selected @endif>{{$takh->nama_takhasus}}</option>
          @endforeach
          </select>
          @if ($errors->has('takhasus_id'))
              <div class="alert alert-danger">
              <strong>Error!</strong> {{ $errors->first('takhasus_id') }}
              </div>
          @endif
      </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
          <label for="nama">Tahun Berdiri</label>
          <input type="text" name="tahun_berdiri" 
          @if($type_form == "edit") 
            value="{{$pesantren->tahun_berdiri}}"
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
      <div class="form-group">
          <label for="nama">Jumlah Santri Laki-Laki</label>
          <input type="number" name="jumlah_santri_lk" 
          @if($type_form == "edit") 
            value="{{$pesantren->jumlah_santri_lk}}"
          @else
            value="{{old('jumlah_santri_lk')}}"
          @endif  
          min="0" class="form-control" placeholder="Jumlah Santri Laki-Laki" required>
          @if ($errors->has('jumlah_santri_lk'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('jumlah_santri_lk') }}
          </div>
          @endif
      </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
          <label for="nama">Jumlah Santri Perempuan</label>
          <input type="number" name="jumlah_santri_pr" 
          @if($type_form == "edit") 
            value="{{$pesantren->jumlah_santri_pr}}"
          @else
            value="{{old('jumlah_santri_pr')}}"
          @endif
          min="0" class="form-control" placeholder="Jumlah Santri Perempuan" required>
          @if ($errors->has('jumlah_santri_pr'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('jumlah_santri_pr') }}
          </div>
          @endif
      </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
        <label for="nama">Nama Pengasuh</label>
        <input type="text" maxlength="100" 
        @if($type_form == "edit") 
            value="{{$pesantren->nama_pengasuh}}"
        @else
            value="{{old('nama_pengasuh')}}"
        @endif
        name="nama_pengasuh" class="form-control" placeholder="Nama Pengasuh" required>
        @if ($errors->has('nama_pengasuh'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('nama_pengasuh') }}
          </div>
        @endif
      </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
        <label for="nama">Nama Ketua Yayasan</label>
        <input type="text" maxlength="100" 
        @if($type_form == "edit") 
            value="{{$pesantren->nama_ketua_yayasan}}"
        @else
            value="{{old('nama_ketua_yayasan')}}"
        @endif
        name="nama_ketua_yayasan" class="form-control" placeholder="Nama Ketua Yayasan" required>
        @if ($errors->has('nama_ketua_yayasan'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('nama_ketua_yayasan') }}
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
            @if(($type_form == "edit") && ($pesantren->provinsi_id == $prov->id)) selected @endif>{{$prov->nama_provinsi}}</option>
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
                    <option value="{{$city->id}}" @if($city->id == $pesantren->kabupaten_id) selected @endif>{{$city->nama_kabupaten}}</option>
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
            {{$pesantren->alamat}}
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

  <div class="col-lg-6" style="height: 92px !important;">
      <div class="form-group">
        <label for="nama">Telepon</label>
        <input type="text" maxlength="50" 
        @if($type_form == "edit") 
            value="{{$pesantren->no_telp}}"
        @else
            value="{{old('no_telp')}}"
        @endif
        name="no_telp" class="form-control" placeholder="Telepon" required>
        @if ($errors->has('no_telp'))
          <div class="alert alert-danger">
          <strong>Error!</strong> {{ $errors->first('no_telp') }}
          </div>
        @endif
      </div>
  </div>

  <div class="col-lg-6">
      <div class="form-group">
        <label for="nama">Fax</label>
        <input type="text" maxlength="50"
        @if($type_form == "edit") 
            value="{{$pesantren->fax}}"
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
            value="{{$pesantren->email}}"
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
            value="{{$pesantren->website}}"
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
        <label for="nama">Luas Tanah</label>
        <input type="number"step=0.01 name="luas_tanah" 
        @if($type_form == "edit") 
            value="{{$pesantren->luas_tanah}}"
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

</div>