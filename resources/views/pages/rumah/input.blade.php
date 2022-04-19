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
                            <label for="kode">Kode</label>
                            <input type="text" class="form-control" id="kode" name="kode" value="{{$data->kode}}" placeholder="Kode Rumah">
                        </div>
                        <div class="col-lg-6">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}" placeholder="Nama">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label for="kamar">Kamar</label>
                            <input type="text" class="form-control" id="kamar" name="kamar" value="{{$data->kamar}}" placeholder="Kamar">
                        </div>
                        <div class="col-lg-4">
                            <label for="toilet">Toilet</label>
                            <input type="text" class="form-control" id="toilet" name="toilet" value="{{$data->toilet}}" placeholder="Toilet">
                        </div>
                        <div class="col-lg-4">
                            <label for="lantai">Lantai</label>
                            <input type="text" class="form-control" id="lantai" name="lantai" value="{{$data->lantai}}" placeholder="Lantai">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <label for="jenis">Jenis</label>
                            <input type="text" class="form-control" id="jenis" name="jenis" value="{{$data->jenis}}" placeholder="Jenis">
                        </div>
                        <div class="col-lg-3">
                            <label for="ukuran">Ukuran</label>
                            <input type="text" class="form-control" id="ukuran" name="ukuran" value="{{$data->ukuran}}" placeholder="Ukuran">
                        </div>
                        <div class="col-lg-3">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" value="{{$data->harga}}" placeholder="Harga">
                        </div>
                        <div class="col-lg-3">
                            <label for="unit">Unit</label>
                            <input type="text" class="form-control" id="unit" name="unit" value="{{$data->unit}}" placeholder="Unit">
                        </div>
                    </div>
                    <div class="form-group row form-check">
                        <div class="col-lg-12">
                            <input type="checkbox" class="form-check-input" name="is_pasar" value="y" {{$data->is_pasar == "y" ? 'checked' : ''}}>
                            <label class="form-check-label" for="is_pasar">Dekat Pasar</label>
                        </div>
                        <div class="col-lg-12">
                            <input type="checkbox" class="form-check-input" name="is_banjir" value="y" {{$data->is_banjir == "y" ? 'checked' : ''}}>
                            <label class="form-check-label" for="is_banjir">Bebas Banjir</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Alamat">{{$data->alamat}}</textarea>
                        </div>
                        <div class="col-lg-6">
                            <label for="daerah">Daerah</label>
                            <input type="text" class="form-control" id="daerah" name="daerah" value="{{$data->daerah}}" placeholder="Daerah">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="file_1">File 1</label>
                            <input type="file" class="form-control" id="file_1" name="file_1" placeholder="file_1">
                        </div>
                        <div class="col-lg-6">
                            <label for="file_2">File 2</label>
                            <input type="file" class="form-control" id="file_2" name="file_2" placeholder="file_2">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label for="file_3">File 3</label>
                            <input type="file" class="form-control" id="file_3" name="file_3" placeholder="file_3">
                        </div>
                        <div class="col-lg-6">
                            <label for="file_4">File 4</label>
                            <input type="file" class="form-control" id="file_4" name="file_4" placeholder="file_4">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="javascript:;" onclick="load_list(1);" class="btn btn-info">Batalkan</a>
                    <button id="tombol_simpan" onclick="handle_save('#tombol_simpan','#form_input','{{$data->id ? route('office.rumah.update',$data->id) : route('office.rumah.store')}}','{{$data->id ? 'PATCH' : 'POST'}}');" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    number_only('kamar');
    number_only('toilet');
    number_only('lantai');
    number_only('unit');
    number_only('harga');
    ribuan('harga');
</script>