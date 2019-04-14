@extends('layouts.app')

@section('content')
<section class="">
  <h class="" style="font-size: 30px"><b>Data Pelanggan</b> Kios Bunga Zahra Garden</h>
</section>
<div class="content">
      
        {{-- <div class="box box-success"> --}}
            <div class="row">
                
                    <div class="col-xs-1 pull-left">                        
                        <a class="btn btn-primary"class="pull-leftu"style="margin-top:15px;margin-bottom:5px" href="{!! route('pelanggans.create') !!}">Tambah Pelanggan</a>
                    </div>
                    <div class="col-sm-3"></div>
                     <div class="col-sm-2"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3" style="margin-top: 0px">
                        
                    </div>
                
            </div>
                    <form action="/searchPelanggan" method="get" enctype="multipart/form-data" >
                        {{-- <h4 class="col-sm-1">Search</h4> --}}
                        <div class="input-group" style="width: 400px">                        
                            <input type="text" name="q" class="form-control" placeholder="Cari Berdasarkan Nama Pelanggan..."/>
                            <span class="input-group-btn">
                            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>    
                        </div>    
                    </form>
            <div class="box box-primary">

                <div class="box-body">
                @include('pelanggans.table')
                </div>
            </div>
            <div class="text-center">
            
            </div>
        {{-- </div>        --}}
</div>
    <div class="content">            
            @include('flash::message')
                @include('flash::message')
        
    </div>

@endsection

