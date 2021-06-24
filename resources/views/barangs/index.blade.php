@extends('layouts.app')

@section('content')
<section class="">
  <h class="" style="font-size: 30px"><b>Data Barang</b> Kios Bunga Zahra Garden</h>
</section>
<div class="content">
      
        {{-- <div class="box box-success"> --}}
            <div class="row">                
                    <div class="col-xs-1 pull-left">                        
                        <a class="btn btn-primary"class="pull-leftu"style="margin-top:15px" href="{!! route('barangs.create') !!}">Tambah Barang</a>
                    </div>
                    <div class="col-sm-3"></div>
                     <div class="col-sm-2"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3" style="margin-top: 0px">
                        <form action="{{ route('baranss') }}" method="POST" class="pull-right " enctype="multipart/form-data">
                            <div class="input-group pull-right" style="width: 300px">
                                @csrf
                                <h>Upload File Excel</h>
                                <input required="" type="file" name="import" class="form-control">  
                                <span class="input-group-btn">
                                    <button class="btn btn-flat glyphicon glyphicon-level-up" style="margin-top:20px"></button>
                                </span>
                            </div>
                        </form>
                    </div>
                
            </div>
                
                    <form action="/search" method="get" enctype="multipart/form-data" >
                        {{-- <h4 class="col-sm-1">Search</h4> --}}
                        <div class="input-group" style="width: 400px">                        
                            <input type="text" name="q" class="form-control" placeholder="Cari Berdasarkan Nama/Kode Barang..."/>
                            <span class="input-group-btn">
                            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>    
                        </div>
                    {{-- @if('/search')
                    <a href="{!! route('barangs.index') !!}" class="btn btn-danger" style="margin-top: 25px; margin-right: -100px">Back</a>
                    @endif   --}}                 
                    </form>
            <div class="box box-primary">

                <div class="box-body">

                 @include('flash::message')
                @include('barangs.table')
                {{-- {{$bara->links()}} --}}
                </div>
            </div>
            <div class="text-center">            
            </div>        
</div>
            {{-- @include('flash::message') --}}
    <div class="content">            
        
    </div>

@endsection