<table class="table table-responsive" id="kategoris-table">
    <thead>
        <tr>
            <th>ID </th>
            <th>Nama</th>
        <th>Keterangan</th>
        <th>Last Update</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kategoris as $kategori)
        <tr><td>{!! $kategori->id !!}</td>
            <td>{!! $kategori->nama !!}</td>
            <td>{!! $kategori->keterangan !!}</td>
              <td>{{ $kategori->updated_at->format('d - M - Y') }}</td>
            <td>
                {!! Form::open(['route' => ['kategoris.destroy', $kategori->id], 'method' => 'delete']) !!}
                <div class=''>
                    
                    <a href="{!! route('kategoris.edit', [$kategori->id]) !!}" class='btn btn-sm btn-info'><h class="">Edit</h>
                    </a><space> | </space>
                    {!! Form::button('<h class=""></h>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger glyphicon glyphicon-trash', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    
    </tbody>
</table>