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
                        <div class="col-lg-3">
                            <label for="kode">Rumah</label>
                            <select class="form-control" name="rumah">
                                <option value="">Pilih Rumah</option>
                                @foreach($rumah as $r)
                                <option value="{{$r->id}}" {{$data->rumah_id == $r->id ? 'selected':''}}>{{$r->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <label for="awal">Awal</label>
                            <input type="date" class="form-control" id="awal" min="{{date('Y-m-d')}}" name="awal" value="{{$data->awal}}" placeholder="Awal">
                        </div>
                        <div class="col-lg-3">
                            <label for="akhir">Akhir</label>
                            <input type="date" class="form-control" id="akhir" min="{{date('Y-m-d')}}" name="akhir" value="{{$data->akhir}}" placeholder="Akhir">
                        </div>
                        <div class="col-lg-3">
                            <label for="cashback">Cashback</label>
                            <input type="text" class="form-control" id="cashback" name="cashback" value="{{$data->cashback}}" placeholder="Cashback">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="javascript:;" onclick="load_list(1);" class="btn btn-info">Batalkan</a>
                    <button id="tombol_simpan" onclick="handle_save('#tombol_simpan','#form_input','{{$data->id ? route('office.promosi.update',$data->id) : route('office.promosi.store')}}','{{$data->id ? 'PATCH' : 'POST'}}');" class="btn btn-info">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    number_only('cashback');
    ribuan('cashback');
</script>