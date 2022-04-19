<div class="card-body p-0">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Rumah</th>
                <th>Mulai</th>
                <th>Akhir</th>
                <th>Cashback</th>
                <th style="width: 120px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($collection->count() > 0)
            @foreach ($collection as $key => $item)
            <tr>
                <td>{{$key+ $collection->firstItem()}}</td>
                <td>{{$item->rumah_id ? $item->rumah->nama : '-'}}</td>
                <td>{{$item->awal}}</td>
                <td>{{$item->akhir}}</td>
                <td>{{number_format($item->cashback)}}</td>
                <td>
                    <a href="javascript:;" onclick="load_input('{{route('office.promosi.edit',$item->id)}}');" class="btn btn-sm btn-warning mr-2">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:;" onclick="handle_confirm('Apakah anda yakin ingin menghapus data ini ?','Ya','Tidak','DELETE','{{route('office.promosi.destroy',$item->id)}}');" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6" class="text-center">Tidak ada data</td>
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