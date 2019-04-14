@extends('layouts.app')

@section('content')
<section class="">
  <h class="" style="font-size: 30px"><b>Data Pembelian</b> Kios Bunga Zahra Garden</h>
</section>
<div class="content">
      
        {{-- <div class="box box-success"> --}}
            @include('flash::message')
            <div class="row">
                
                    <div class="col-sm-3"></div>
                     <div class="col-sm-2"></div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">                        
                    </div>
                
            </div>
                    {{-- <form action="/search" method="get" enctype="multipart/form-data" >
                        <h4 class="col-sm-1">Search</h4>
                        <div class="input-group" style="width: 400px">                        
                            <input type="text" name="q" class="form-control" placeholder="Cari Berdasarkan Nama/Kode Pembelian..."/>
                            <span class="input-group-btn">
                            <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>    
                        </div>    
                    </form> --}}
            <div class="box box-primary">

                @include('flash::message')
                <div class="box-body">
                @include('pembelians.table')
                </div>
            </div>
            <div class="text-center">
            
            </div>
        {{-- </div>        --}}
</div>
    <div class="content">            
        
    </div>

@endsection

