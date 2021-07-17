@extends('layouts.app')

@section('content')
<section class="">
  <h class="" style="font-size: 30px"><b>Data Pembelian</b>  Point Of Sale</h>
</section>
<div class="content">
      
        {{-- <div class="box box-success"> --}}
            @include('flash::message')
            {{-- <div class="form-group"> --}}
                <div class="box-body">
                    <form action="{{ route('caribeli') }}" method="GET">
                        <div class="col-md-4">
                            <h>Cari Data Pembelian Berdasarkan Tanggal</h>
                            <input type="date" class="col-1 form-control required" name="tanggal" id="tanggal" placeholder="Cari Tanggal">
                        </div>
                        
                        <div class="col-md-2" style="margin-top: 23px">
                        @if(request()->get('tanggal'))                                               
                            <a href="{!! route('pembelians.index') !!}"class="btn btn-sm fa fa-arrow-left" style="color:  blue"></a>
                        @endif
                            <button type="submit" class="btn btn-sm btn-info">Cari</button>
                        </div>
                    </form>
                </div>
            {{-- </div> --}}
    
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
                {{$beli->links()}}
                </div>
            </div>
            <div class="text-center">
            
            </div>
        {{-- </div>        --}}
</div>
    <div class="content">            
        
    </div>

@endsection

