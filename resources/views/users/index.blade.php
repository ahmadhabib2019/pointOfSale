@extends('layouts.app')

@section('content')
<section class="">
  <h class="" style="font-size: 30px"><b>Data User</b> Kios Bunga Zahra Garden</h>
</section>
<div class="content">      
            @include('flash::message')        
            <div class="row">
                <div class="form-group col-sm-12">                    
                    <button type="button" id="btn-bayar" class="btn btn-default pull-right" style="" data-toggle="modal" data-target="#bayar">
                    <b>!</b>
                    </button>                    
                </div>
            </div>
            <form action="/searchUser" method="get" enctype="multipart/form-data" >
                <div class="input-group" style="width: 400px">                        
                    <input type="text" name="q" class="form-control" placeholder="Cari Berdasarkan Nama User..."/>
                    <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>    
                </div>    
            </form>
            <div class="box box-primary">
                <div class="box-body">
                    @include('users.table')
                </div>
            </div>
            <div class="text-center">            
            </div>        
</div>
    <div class="content">            

    </div>
@endsection



<!-- Modal -->
    <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                {{-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Admin</h4>
                </div>
                <div class="modal-body">
                    {!! Form::label('total_bayar', 'Total:') !!}
                    {!! Form::text('total_bayar', null, ['class' => 'form-control', 'id' => 'total_bayar','readonly']) !!}
                    <br>
                    {!! Form::label('bayar', 'Jumlah Tunai:') !!}
                    {!! Form::text('bayar', null, ['class' => 'form-control']) !!}
                    <br>
                    {!! Form::label('kembalian', 'Kembalian:') !!}
                    {!! Form::text('kembalian', null, ['class' => 'form-control','readonly']) !!}
                </div>
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pengurus</h4>
                </div>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Kasir</h4>
                </div> --}}

                <div class="col-md-6 ">
                    <div class="info-box">
                        <div class="small-box bg-orange">
                            <div class="inner">
                            <h3>Level 2</h3>
                                <div class="icon">
                                  <i class="fa fa-book">A</i>
                                </div>  
                            </div>                 
                            <ul>
                                <h3>Admin</h3>
                                <li>Manajemen User Access</li>                            
                                <li>All Feature Access</li>
                                
                            </ul>
                         </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box">
                        <div class="small-box bg-blue">
                            <div class="inner">
                            <h3>Level 1</h3>
                                <div class="icon">
                                  <i class="fa fa-book">S</i>
                                </div>  
                            </div>                 
                            <ul>
                                <h3>Supervisor</h3>
                                <li>Tambah Data Barang, Supplier dan Pelanggan</li>
                                <li>Transaksi Pembelian Barang</li>
                                <li>Data Retur</li>
                                <li>Rekap data penjualan</li>
                            </ul>
                         </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="info-box">
                        <div class="small-box bg-green">
                            <div class="inner">
                            <h3>Level 0</h3>
                                <div class="icon">
                                  <i class="fa fa-book">K</i>
                                </div>  
                            </div>                 
                            <ul>
                                 <h3>Kasir</h3>
                                <li>Transaksi Penjualan</li>                                
                            </ul>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>