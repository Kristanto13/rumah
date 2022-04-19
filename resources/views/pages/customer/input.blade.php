<div class="row">
    <div class="col-lg-12">
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">{{$data->id ? 'Perbarui ': 'Tambah '}} Data</h3>
                <div class="card-tools" style="margin-right:1%;margin-top:0.4%;">
                    <a href="javascript:;" onclick="load_list(1);" class="btn btn-sm btn-primary">
                        Kembali
                    </a>
                </div>
            </div>
            <form id="form_input">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="no_ktp">No. KTP</label>
                            <input type="text" class="form-control" id="no_ktp" name="no_ktp" value="{{$data->no_ktp}}" placeholder="No. KTP">
                        </div>
                        <div class="col-lg-6">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="phone">No. HP</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{$data->phone}}" placeholder="No. HP">
                        </div>
                        <div class="col-lg-4">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$data->email}}" placeholder="Email">
                        </div>
                        <div class="col-lg-4">
                            <label for="gender">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="-" {{$data->gender=="-" ? 'selected' : ''}}>Pilih Gender</option>
                                <option value="L" {{$data->gender=="L" ? 'selected' : ''}}>Laki-Laki</option>
                                <option value="P" {{$data->gender=="P" ? 'selected' : ''}}>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat">{{$data->alamat}}</textarea>
                        </div>
                        <div class="col-lg-4">
                            <label for="kota">Kota</label>
                            <input type="text" class="form-control" id="kota" name="kota" value="{{$data->kota}}" placeholder="Kota">
                        </div>
                        <div class="col-lg-4">
                            <label for="kodepos">Kode Pos</label>
                            <input type="text" class="form-control" id="kodepos" name="kodepos" value="{{$data->kodepos}}" placeholder="Kode Pos">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="javascript:;" onclick="load_list(1);" class="btn btn-info">Batalkan</a>
                    <button id="tombol_simpan" onclick="handle_save('#tombol_simpan','#form_input','{{$data->id ? route('office.customer.update',$data->id) : route('office.customer.store')}}','{{$data->id ? 'PATCH' : 'POST'}}');" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>