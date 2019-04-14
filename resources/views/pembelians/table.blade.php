<table class="table table-responsive" id="pembelians-table">
    <thead>
        <tr>
        <th>Waktu</th>
        <th>Supplier Id</th>
        <th>Pegawai Id</th>
        <th>Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pembelians as $pembelian)
        <tr>
            <td>{!! $pembelian->created_at !!}</td>
            <td>{!! $pembelian->supplier->nama !!}</td>
            <td>{!! $pembelian->pegawai->nama !!}</td>
            <td>{!! $pembelian->total !!}</td>
            <td>
                {!! Form::open(['route' => ['pembelians.destroy', $pembelian->id], 'method' => 'delete']) !!}
                <div class=''>
                    <a href="{!! route('pembelians.show', [$pembelian->id]) !!}" class='btn btn-default'><h class="">Show</h></a>
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