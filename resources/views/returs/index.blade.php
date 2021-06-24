@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Data Barang Retur</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        <div class="box-body">
            <form action="{{ route('cariretur') }}" method="GET">
                <div class="col-md-4">
                    <label for="tanggal" class="validate">Cari Data Retur Berdasarkan Tanggal</label>
                    <input type="date" class="col-1 form-control required" name="tanggal" id="tanggal" placeholder="Cari Tanggal" >
                </div>
                
                <div class="col-md-2" style="margin-top: 25px">
                @if(request()->get('tanggal'))                                               
                    <a href="{!! route('returs.index') !!}"class="btn btn-sm fa fa-arrow-left" style="color:  blue"></a>
                @endif
                    <button type="submit" class="btn btn-sm btn-info">Cari</button>
                </div>
            </form>
        <h1 class="pull-right" style="margin-top: 10px">
           <a class="btn btn-primary pull-right" style="margin-top: 10px;margin-bottom: 5px" href="{!! route('returs.create') !!}">Tambah data</a>
        </h1>
        </div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('returs.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

