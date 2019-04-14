<table class="table table-responsive" id="suppliers-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Alamat</th>
        <th>Telepone</th>
        <th>Email</th>
        <th>Keterangan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($suppliers as $supplier)
        <tr>
            <td>{!! $supplier->nama !!}</td>
            <td>{!! $supplier->alamat !!}</td>
            <td>{!! $supplier->telepone !!}</td>
            <td>{!! $supplier->email !!}</td>
            <td>{!! $supplier->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['suppliers.destroy', $supplier->id], 'method' => 'delete']) !!}
               <div class=''>
                    <a href="{!! route('suppliers.show', [$supplier->id]) !!}" class='btn btn-default'><h class=""> Show</h></a>
                    <space> | </space>
                    <a href="{!! route('suppliers.edit', [$supplier->id]) !!}" class='btn btn-info'><h class="">Edit</h></a>
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