<table class="table table-responsive" id="users-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Email</th>
        <!-- <th>Password</th>
        <th>Remember Token</th> -->
        <th>Level</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{!! $user->name !!}</td>
            <td>{!! $user->email !!}</td>
            <!-- <td>{!! $user->password !!}</td>
            <td>{!! $user->remember_token !!}</td> -->
            <td>{!! $user->level !!}</td>
            <td>
                {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class=''>
                    {{-- <a href="{!! route('barangs.show', [$barang->id]) !!}" class='btn btn-default btn-xs'><h class="">Show</h></a><space> | </space> --}}
                    <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-sm btn-info'><h class="">Edit</h></a>                    
                    <space> | </space>
                    {!! Form::button('<h class=""></h>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger glyphicon glyphicon-trash', 'onclick' => "return confirm('Are you sure?')"]) !!}                    
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>