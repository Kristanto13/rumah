<div class="card-body p-0">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Kode</th>
                <th>Klien</th>
                <th>Rumah</th>
                <th>Tanggal</th>
                <th style="width: 120px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($collection->count() > 0)
            @foreach ($collection as $key => $item)
            <tr>
                <td>{{$key+ $collection->firstItem()}}</td>
                <td>{{$item->kode}}</td>
                <td>{{$item->klien->nama}}</td>
                <td>{{$item->rumah->nama}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5" class="text-center">Tidak ada data</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
<!-- /.card-body -->
@if($collection->count() > 10)
<div class="card-footer clearfix">
    {{$collection->links('themes.pagination')}}
</div>
@endif