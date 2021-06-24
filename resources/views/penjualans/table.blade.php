<table class="table table-responsive" id="penjualans-table">
    <thead>
        <tr>
        <th>No nota</th>
        <th>Tanggal</th>
        <th>Pelanggan </th>
        <th>Pegawai</th>
        {{-- <th>Diskon</th> --}}
        <th style="text-align: center;">Total Bayar</th>
            <th style="text-align: center;">Action</th>
        </tr>
    </thead>
        <?php 
            $totall = 0 ;
        ?>
        @foreach($penjualans as $penjualan)
        <?php
            $totall += $penjualan->total;
        ?>
        <tr>
            <td>{!! $penjualan->id !!}</td>
            <td>{!! $penjualan->created_at->format('d - M - Y') !!}</td>
            <td>{!! $penjualan->pelanggan->nama !!}</td>
            {{-- <td>{!! $penjualan->pegawai->nama!!}</td> --}}
            <td>{!! $penjualan->user->name!!}</td>
            {{-- <td style="text-align: right">{!! $penjualan->diskonTtl!!}%</td> --}}
            {{-- <td>{!! $penjualan->detail->qty!!}</td> --}}
            <td style="text-align:right">Rp. {!! number_format($penjualan->total) !!}</td>
            <td style="text-align: center">
                {!! Form::open(['route' => ['penjualans.destroy', $penjualan->id], 'method' => 'delete']) !!}
                <div class=''>
                    <a href="{!! route('penjualans.show', [$penjualan->id]) !!}" class='btn btn-sm  btn-default'>
                    <h>Detail</h></a>
                    <space> | </space>
                <a href="{!! route('penjualans.print', ['id' => $penjualan->id]) !!}" target="_blank" class="btn btn-sm btn-success"> <i class="fa fa-print"></i> Cetak Nota</a>
                     @if(Auth::user()->level==2)
                     <space> | </space>
                {{--     <a href="{!! route('penjualans.edit', [$penjualan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> --}}
                    {!! Form::button('<h class=""></h>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger glyphicon glyphicon-trash', 'onclick' => "return confirm('Are you sure?')"]) !!}
                @endif
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
        <tr>
            <td style="width: 0px"></td><td></td><td></td>
            <td><h4><b>Total Penjualan :</b></h4><td style="text-align: right;"><h4><b>Rp. {!! number_format($totall) !!}</h4></td>
        </tr>
    </tbody>
</table>