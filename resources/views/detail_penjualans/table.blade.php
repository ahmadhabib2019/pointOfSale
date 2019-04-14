<table class="table table-responsive" id="kategoris-table">
    <thead>
        <tr>
        <th>Tanggal</th>
        <th>No Nota</th>
        <th>Banyak Barang</th>
        <th>Total Beli</th>
       {{--  <th>Keterangan</th>
        <th>Last Update</th>
        <th>Action</th>  --}}
        </tr>
    </thead>
    <tbody>
    @foreach($detail as $details)
        <tr><td>{!! $details->created_at !!}</td>
            <td>{!! $details->qty !!}</td>
            <td>{!! $details->penjualan_id !!}</td>
            <td>{!! $details->subtotal !!}</td>
              {{-- <td>{{ $detail->updated_at }}</td> --}}
            <td>
               {{--  {!! Form::open(['route' => ['detail_penjualans.destroy', $kategori->id], 'method' => 'delete']) !!}
                <div class=''>
                    
                    <a href="{!! route('detail_penjualans.edit', [$kategori->id]) !!}" class='btn btn-info'><h class="">Edit</h>
                    </a><space> | </space>
                    {!! Form::button('<h class="">Delete</h>', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!} --}}
            </td>
        </tr>
    @endforeach
    
    </tbody>
</table>