<div class="card-body p-0">
    <table class="table">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>No. KTP</th>
                <th>Nama</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Gender</th>
                <th style="width: 120px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @if($collection->count() > 0)
            @foreach ($collection as $key => $item)
            <tr>
                <td>{{$key+ $collection->firstItem()}}</td>
                <td>{{$item->no_ktp}}</td>
                <td>{{$item->nama}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->gender}}</td>
                <td>
                    <a href="javascript:;" onclick="load_input('{{route('office.customer.edit',$item->id)}}');" class="btn btn-sm btn-warning mr-2">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="javascript:;" onclick="handle_confirm('Apakah anda yakin ingin menghapus data ini ?','Ya','Tidak','DELETE','{{route('office.customer.destroy',$item->id)}}');" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center">Tidak ada data</td>
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