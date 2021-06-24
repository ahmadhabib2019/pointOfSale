<table class="table table-responsive" id="pegawais-table">
    <thead>
        <tr>
            <th>Nomor Induk</th>
        <th>Nama</th>
        <th>Tempat Lahir</th>
        <th>Tanggal Lahir</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Telepon</th>
       

            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pegawais as $pegawai)
        <tr>
            <td>{!! $pegawai->nomor_induk !!}</td>
            <td>{!! $pegawai->nama !!}</td>
            <td>{!! $pegawai->tempat_lahir !!}</td>
            <td>{!! $pegawai->tanggal_lahir!!}</td>
            <td>{!! $pegawai->alamat !!}</td>
            <td>{!! $pegawai->email !!}</td>
            <td>{!! $pegawai->telepon !!}</td>
            
            
            <td>
                {!! Form::open(['route' => ['pegawais.destroy', $pegawai->id], 'method' => 'delete']) !!}
                <div class=''>
                    <a href="{!! route('pegawais.show', [$pegawai->id]) !!}" class='btn btn-sm btn-default'><h class=""> Show</h></a>
                    <space> | </space>
                    <a href="{!! route('pegawais.edit', [$pegawai->id]) !!}" class='btn btn-sm btn-info'><h class="">Edit</h></a>
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