@extends('layouts.app')

@section('content')
<section class="">
  <h class="" style="font-size: 30px"><b>Data Penjualan</b> Kios Bunga Zahra Garden</h>
</section>
<div class="content">
        {{-- <div class="box box-success"> --}}
            @include('flash::message')
            
                    {{-- <form action="/search" method="get" enctype="multipart/form-data" >
                        <h4 class="col-sm-1">Search</h4>
                        <div class="input-group" style="width: 400px">                        
                            <input type="text" name="q" class="form-control" placeholder="Cari Berdasarkan Nama/Kode Pembelian..."/>
                            <span class="input-group-btn">
                            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>    
                        </div>    
                    </form> --}}
    <a href="{{ url('getPdf?dari='.request()->get('dari').'&sampai='.request()->get('sampai')) }}" class="btn btn-info pull-right" style="margin-top: 25px" target="_BLANK">Generate PDF </a>
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

            <div class="form-group col-sm-3"> 
                {!! Form::submit('Filter', ['class' => 'btn btn-primary','style'=>'margin-top : 25px']) !!}
            </div>

            {{-- <a href="{!! route('penjualans.index') !!} " class="btn btn-danger"  style="margin-top: 25px; margin-left: -175px">Back</a> --}}

            <a href="{!! route('penjualans.index') !!}" class="btn btn-danger" style="margin-top: 25px; margin-right: -100px">Back</a>
        </div>
    {!! Form::close() !!}
            <div class="box box-primary">
                @include('flash::message')
                <div class="box-body">
                @include('penjualans.table')
                </div>
            </div>
            <div class="text-center">            
            </div>
        {{-- </div>        --}}
</div>
    <div class="content">        
    </div>
@endsection

