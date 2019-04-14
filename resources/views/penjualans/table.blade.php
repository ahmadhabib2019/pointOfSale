<table class="table table-responsive" id="penjualans-table">
    <thead>
        <tr>
        <th>No nota</th>
        <th>Waktu</th>
        <th>Pelanggan </th>
        <th>Pegawai</th>
        {{-- <th>Banyak Beli</th> --}}
        <th>Total Bayar</th>
            <th colspan=""class="">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($penjualans as $penjualan)
        <tr>
            <td>{!! $penjualan->id !!}</td>
            <td>{!! $penjualan->created_at !!}</td>
            <td>{!! $penjualan->pelanggan->nama !!}</td>
            <td>{!! $penjualan->pegawai->nama!!}</td>
            {{-- <td>{!! $penjualan->detail->qty!!}</td> --}}
            <td>{!! $penjualan->total !!}</td>

            <td>
                {!! Form::open(['route' => ['penjualans.destroy', $penjualan->id], 'method' => 'delete']) !!}
                <div class=''>
                <a href="{!! route('penjualans.print', ['id' => $penjualan->id]) !!}" target="_blank" class="btn btn-primary"> <i class="fa fa-print"></i> Print</a><space> | </space>
                    <a href="{!! route('penjualans.show', [$penjualan->id]) !!}" class='btn btn-default'>
                    <h class="">Show</h></a>
                     @if(Auth::user()->level==2)
                     <space> | </space>
                {{--     <a href="{!! route('penjualans.edit', [$penjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                    {!! Form::button('<h class="">Delete</h>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>