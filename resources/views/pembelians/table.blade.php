<table class="table table-responsive" id="pembelians-table">
    <thead>
        <tr>
        <th>No Nota</th>
        <th>Waktu</th>
        <th>Supplier</th>
        <th>Pegawai</th>
        <th>Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pembelians as $pembelian)
        <tr>
            <td>{{ $pembelian->nota}}</td>
            <td>{!! $pembelian->created_at->format('d - m - Y') !!}</td>
            <td>{!! $pembelian->supplier->nama !!}</td>
            <td>{!! $pembelian->user->name !!}</td>
            <td>Rp.{!! number_format($pembelian->total) !!}</td>
            <td>
                {!! Form::open(['route' => ['pembelians.destroy', $pembelian->id], 'method' => 'delete']) !!}
                    <div class=''>
                        <a href="{!! route('pembelians.show', [$pembelian->id]) !!}" class='btn btn btn-sm  btn-default'><h class="">Detail Pembelian</h></a>
                        @if(Auth::user()->level==2)
                            <space> | </space>                    
                            {!! Form::button('<h class=""></h>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger glyphicon glyphicon-trash', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                    
                {!! Form::close() !!}
                 {{-- {{$beli->links()}} --}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>