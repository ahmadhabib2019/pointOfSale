@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Dashboard</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">            	 
               
                <div class="col-md-3 ">
                    <div class="info-box bg-green">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon"><i class="fa fa-list"></i></span>
                        <div class="info-box-content" style="width: 300px">
                            <span class="info-box-text">Barang Tersedia</span>
                            <span class="info-box-number">{!! $barang !!}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>

                <div class="col-md-3">
                    <div class="info-box bg-red">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon"><i class="fa fa-book"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Banyak Kategori</span>
                            <span class="info-box-number">{!! $kategori !!}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
                 <div class="col-md-3       ">
                    <div class="info-box bg-yellow">
                        <!-- Apply any bg-* class to to the icon to color it -->
                        <span class="info-box-icon"><i class="fa fa-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Barang Habis</span>
                            <span class="info-box-number"></span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>  

            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

