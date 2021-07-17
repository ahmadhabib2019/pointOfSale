@extends('layouts.app')

@section('content')
<section class="">
  <h class="" style="font-size: 30px"><b>Data Barang</b>  Point Of Sale</h>
</section>
<div class="content">
      
        {{-- <div class="box box-success"> --}}
        {!! Form::open(['url'=>'search', 'method'=>'get', 'class'=>'']) !!}
            <div class="form-group col-sm-3{{ $errors->has('dari') ? 'has-error' : ''}}">
                {!! Form::date('dari', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('dari', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group col-sm-3{{ $errors->has('sampai') ? 'has-error' : ''}}"> 
                {!! Form::date('sampai', null, ['class' => 'form-control', 'required' => 'required']) !!}
                {!! $errors->first('sampai', '<p class="help-block">:message</p>') !!}
            </div>            
                
                {!! Form::submit('Filter', ['class' => 'btn btn-primary']) !!}
            
        {!! Form::close() !!}<br>
            <div class="box box-primary">

                <div class="box-body">
                 @include('flash::message')
                 <table class="table table-responsive" id="barangs-table" style="height: 0px">
    <thead>
        <tr>
        <th>ID</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Stok</th>
        <th>Harga Beli</th>
        <th>Harga jual</th>
        <th>Kategori</th>        
        </tr>
    </thead>
    <tbody>
        @foreach($laporandates as $laporandate)
        <tr>
        <td>{{ $laporandate->nama }}</td>
        <td>{{ $laporandate->harga_beli }}</td>
        <td>{{ $laporandate->harga_jual }}</td>
        <td>{{ $laporandate->stok }}</td>
        <td>{{ $laporandate->kategori->nama }}</td>
        </tr>
        @endforeach
    </tbody>

</table>
                </div>
            </div>
            <div class="text-center">            
            </div>        
</div>
        

@endsection

