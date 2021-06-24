@extends('layouts.app')

@section('content')
<section class="">
  <h class="" style="font-size: 30px"><b>Rekapitulasi Laba Rugi</b> Kios Bunga Zahra Garden</h>
<div class="col-sm-2 pull-right"><br>
    {{$date->format('d, M Y')}}
</div>
</section>
<div class="content">
    <div class="box box-primary">
        <div class="box-body"> 
            {!! Form::open(['url'=>'labaRugi', 'method'=>'get', 'class'=>'']) !!}
            <div class="row">
                <div class="col-sm-3"><h3><b>Pendapatan</b></h3></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-3"><h3><b>Pembelian</b></h3></div>
            </div><br></br>
            
            <div class="row">                    
                <div class="col-sm-3">Total Penjualan</div>
                <div class="col-sm-3" style="text-align: right;"> Rp. {{number_format($jumlahPenjualan)}}</div>

                <div class="col-sm-3">Total Pembelian Barang</div>
                <div class="col-sm-3" style="text-align: right;"> Rp. {{number_format($jumlahPembelian)}}</div>
            </div>
           
            <div class="row" style="margin-top:10px">                    
                {{-- <div class="col-sm-3">Rata-Rata Penjualan</div> --}}
                {{-- <div class="col-sm-3"style="text-align: right;">Rp. {{number_format($totalRatarata) }}</b></div> --}}
            </div>

            <div class="row" style="margin-top:10px">                    
                <div class="col-sm-3"><b>Total : </b></div>
                <div class="col-sm-3" style="text-align: right;"><h4><b> Rp. {{number_format($jumlahPenjualan) }}</b></h4></div>
                <div class="col-sm-3"><b>Total : </b></div>
                <div class="col-sm-3"style="text-align: right;"><h4><b>Rp. {{number_format($jumlahPembelian) }}</b></h4></div>
            </div><br>

            <div class="row">                    
                <div class="col-sm-3"><h3><b>Grand Total : </b></h3></div>
                <div class="col-sm-3"><h3><b>Rp. {{number_format($grandTotal) }}</b></h3></div>
            </div><br></br>
            <div class="box box-success">
                <div class="box-body">            
                    <div class="row">
                        <div class="col-md-2"style="margin-top:0px; text-align: right;"><h4>Rentan Penjualan<br>& Pembelian</h4></div>
                        <div class="form-group col-sm-3{{ $errors->has('form') ? 'has-error' : ''}}">
                            {!! Form::label('start date:') !!}
                            {!! Form::date('dari', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('dari', '<p class="help-block">:message</p>') !!}
                        </div>
                        <div class="form-group col-sm-3{{ $errors->has('to') ? 'has-error' : ''}}"> 
                            {!! Form::label('end date:') !!}
                            {!! Form::date('sampai', null, ['class' => 'form-control', 'required' => 'required']) !!}
                            {!! $errors->first('sampai', '<p class="help-block">:message</p>') !!}
                        </div>

                        <div class="form-group col-sm-3"> 
                            {!! Form::submit('Sumbit', ['class' => 'btn btn-primary','style'=>'margin-top : 25px']) !!}
                        </div>           
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

