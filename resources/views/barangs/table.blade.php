<table class="table table-responsive" id="barangs-table" style="height: 0px">
    <thead>
        <tr>
        <th>ID</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Stok</th>
        <th>Harga Beli</th>
        <th>Harga jual</th>
        <th>Kategori</th>
        <th>Last Update</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($barangs as $barang)
        <tr>
            <td>{!! $barang->id !!}</td>
            <td>{!! $barang->kode !!}</td>
            <td>{!! $barang->nama !!}</td>
            <td>{!! $barang->keterangan !!}</td>
            <td>{!! $barang->stok !!}</td>
            <td>{!! $barang->harga_beli !!}</td>
            <td>{!! $barang->harga_jual !!}</td>
            <td>{!! $barang->kategori->nama!!}</td>
            <td>{!! $barang->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['barangs.destroy', $barang->id], 'method' => 'delete']) !!}
                <div class=''>
                    {{-- <a href="{!! route('barangs.show', [$barang->id]) !!}" class='btn btn-default btn-xs'><h class="">Show</h></a><space> | </space> --}}
                    <a href="{!! route('barangs.edit', [$barang->id]) !!}" class='btn btn-info'><h class="">Edit</h></a>
                    @if(Auth::user()->level==2)
                    <space> | </space>
                    {!! Form::button('<h class="">Delete</h>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    
    </tbody>

</table>
    