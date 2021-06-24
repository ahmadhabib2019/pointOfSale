<table class="table table-responsive" id="returs-table">
    <thead>
        <tr>
        <th style="width:200px">Tanggal Pengembalian</th>
        <th>Supplier</th>
        <th>Pegawai</th>
        <th>Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($returs as $retur)
        <tr>
            <td>{!! $retur->tanggal->format('d, m Y') !!}</td>
            <td>{!! $retur->supplier->nama !!}</td>
            <td>{!! $retur->user->name !!}</td>            
            <td>Rp. {!! number_format($retur->total) !!}</td>
            <td>
                {!! Form::open(['route' => ['returs.destroy', $retur->id], 'method' => 'delete']) !!}
                <div class=''>
                        <a href="{!! route('returs.show', [$retur->id]) !!}" class='btn btn btn-sm  btn-default'><h class="">Detail</h></a>
                        @if(Auth::user()->level==2)
                            <space> | </space>                    
                            {!! Form::button('<h class=""></h>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger glyphicon glyphicon-trash', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        @endif
                    </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>