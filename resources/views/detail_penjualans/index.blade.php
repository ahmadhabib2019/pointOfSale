@extends('layouts.app')

@section('content')
<section class="">
  <h class="" style="font-size: 30px"><b>Data Detail Penjualan</b>  Point Of Sale</h>
</section>
<div class="content">
      
        {{-- <div class="box box-success"> --}}
            <div class="row">
                
                    <div class="col-xs-1 pull-left">                        
                        {{-- <a class="btn btn-primary"class="pull-leftu"style="margin-top:15px;margin-bottom:5px" href="{!! route('kategoris.create') !!}">Tambah Kategori</a> --}}
                    </div>                
            </div>
                
            <div class="box box-primary">

                <div class="box-body">
                @include('detail_penjualans.table')
                
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

