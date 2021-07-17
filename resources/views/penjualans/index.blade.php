@extends('layouts.app')

@section('content')
<section class="">
  <h class="" style="font-size: 30px"><b>Data Penjualan</b>  Point Of Sale</h>
</section>
<div class="content">
            @include('flash::message')
    @if(Auth::user()->level >0)
        @if(request()->get('dari'))
            <a href="{{ url('getPdf?dari='.request()->get('dari').'&sampai='.request()->get('sampai')) }}" class="btn btn-info pull-right"name="filter" style="margin-top: 25px; margin-right: 220px" target="_BLANK">Cetak Laporan Penjualan </a>
        @endif

            {!! Form::open(['url'=>'cari', 'method'=>'get', 'class'=>'']) !!}
                <div class="row">
                    <div class="form-group col-sm-3{{ $errors->has('dari') ? 'has-error' : ''}}">
                        {!! Form::label('start date:') !!}
                        {!! Form::date('dari', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('dari', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group col-sm-3{{ $errors->has('sampai') ? 'has-error' : ''}}"> 
                        {!! Form::label('end date:') !!}
                        {!! Form::date('sampai', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        {!! $errors->first('sampai', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group col-sm-2"> 
                    @if(request()->get('dari'))
                        <a href="{!! route('penjualans.index') !!}" class="btn btn-sm fa fa-arrow-left" style="color:  blue; margin-top: 25px"></a>
                    @endif
                        {!! Form::submit('Filter', ['class' => 'btn btn-primary','style'=>'margin-top : 25px']) !!}
                    </div>                
                </div>
            {!! Form::close() !!}
            <div class="" style="background-color: white; margin-left: ">Pilih tanggal untuk cetak laporan</div>     
    @endif
            <div class="box box-primary">
                <div class="box-body">                   
                @include('penjualans.table')
                </div>
            </div>
</div>
<div class="text-center">            
</div>
<div class="content">        
</div>
@endsection

