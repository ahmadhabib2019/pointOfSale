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
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>

    @foreach($barangs as $barang)
    <tr>    
            @if(($barang->stok <= 0))
            <td style="background-color: #FFE4C4;" > {!! $barang->id !!}</td>
            @else
            <td>{!! $barang->id !!}</td>
            @endif
            @if(($barang->stok <= 0))
            <td style="background-color: #FFE4C4;" > {!! $barang->kode !!}</td>
            @else
            <td>{!! $barang->kode !!}</td>
            @endif
            @if(($barang->stok <= 0))
            <td style="background-color: #FFE4C4;" > {!! $barang->nama !!}</td>            
            @else            
            <td> {!! $barang->nama !!}</td>
            @endif
            @if(($barang->stok <= 0))
            <td style="background-color: #FFE4C4; color: ">{!! $barang->keterangan !!}</td>
            @else          
            <td >{!! $barang->keterangan !!}</td>
            @endif
            @if(($barang->stok <= 0))
            <td style="background-color: #FFE4C4; color: ">{!! $barang->stok !!}</td>
            @else            
            <td>{!! $barang->stok !!}</td>
            @endif
            @if(($barang->stok <= 0))
            <td style="background-color: #FFE4C4;" >Rp. {!! number_format($barang->harga_beli) !!}</td>
            @else
            <td>Rp. {!! number_format($barang->harga_beli) !!}</td>
            @endif
            @if(($barang->stok <= 0))
            <td style="background-color: #FFE4C4;" > Rp. {!! number_format($barang->harga_jual) !!}</td>
            @else
            <td>Rp. {!! number_format($barang->harga_jual) !!}</td>
            @endif
            
            @if(($barang->stok <= 0))
            <td style="background-color: #FFE4C4;" > {!! $barang->kategori->nama !!}</td>
            @else
            <td>{!! $barang->kategori->nama!!}</td>
            @endif            
            
            @if(($barang->stok <= 0))
            <td style="background-color: #FFE4C4;">
            @else
            <td>
            @endif
                {!! Form::open(['route' => ['barangs.destroy', $barang->id], 'method' => 'delete']) !!}
                <div class=''>
                    {{-- <a href="{!! route('barangs.show', [$barang->id]) !!}" class='btn btn-default btn-xs'><h class="">Show</h></a><space> | </space> --}}
                    <a href="{!! route('barangs.edit', [$barang->id]) !!}" class='btn btn-sm btn-info'><h class="">Edit</h></a>
                    @if(Auth::user()->level==2)
                    <space> | </space>
                    {!! Form::button('<h class=""></h>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger glyphicon glyphicon-trash', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
      <tr>
        </tr>
    </tbody>

</table>