<table class="table table-responsive" id="pelanggans-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pelanggans as $pelanggan)
        <tr>
            <td>{!! $pelanggan->nama !!}</td>
            <td>{!! $pelanggan->alamat !!}</td>
            <td>{!! $pelanggan->telepon !!}</td>
            <td>{!! $pelanggan->email !!}</td>
            <td>
                {!! Form::open(['route' => ['pelanggans.destroy', $pelanggan->id], 'method' => 'delete']) !!}
                <div class=''>
                    <a href="{!! route('pelanggans.show', [$pelanggan->id]) !!}" class='btn btn-sm btn-default'><h class=""> Show</h></a>
                    <space> | </space>
                    
                    <a href="{!! route('pelanggans.edit', [$pelanggan->id]) !!}" class='btn btn-sm btn-info'><h class="">Edit</h></a>
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