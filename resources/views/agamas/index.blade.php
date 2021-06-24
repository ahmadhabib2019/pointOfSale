@extends('layouts.app')

@section('content')
    {{-- <section class="content-header">
        
        </section> --}}
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

            <div class="form-group col-sm-2 pull-right" style="background: ">
            {{$now}}
            </div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
            <div class="callout callout-info">  
        <h class="" style="font-size: 30px">Aplikasi Point Of Sale<br>Kios Bunga <b>Zahra Garden</b> PP Biharu Bahri Asali Fadla ilirrahmah</h>        
        <table class="table table-responsive" id="barangs-table">    
        <tbody>        
        </tbody>
        </table>
    </div>
            <div class="row">      
                <div class="col-md-4 ">
                    <div class="info-box bg-green">                        
                        <span class="info-box-icon"><i class="fa fa-shopping-bag"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Barang Tersedia</span>
                            <span class="info-box-number" style="font-size:40px">{!! $barang !!}</span>
                        </div>
                    </div>
                </div>         

                

                <div class="col-md-4">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Barang Habis</span>
                            <span class="info-box-number" style="font-size:40px">{!! $totalstok !!}</span>
                        </div>
                    </div>
                </div>    

                <div class="col-md-4">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-list"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kategori Barang</span>
                            <span class="info-box-number" style="font-size:40px">{!! $kategori !!}</span>
                        </div>
                    </div>
                </div>    
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <div class="info-box bg-blue">                        
                        <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Penjualan</span>
                            <span class="info-box-number" style="font-size:40px">{!! $penjualan !!}</span>
                        </div>
                    </div>
                </div>              
                <div class="col-md-6 ">
                    <div class="info-box bg-blue">                        
                        <span class="info-box-icon"><i class="fa fa-outdent"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Retur</span>
                            <span class="info-box-number" style="font-size:40px">{!! $retur !!}</span>
                        </div>
                    </div>
                </div>                  
            </div>
        </div>
        
        </div>         
        
       
    </div>
@endsection

