@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Detail Penjualan 
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('penjualans.show_fields')
                    <a href="{!! route('penjualans.print', ['id' => $penjualan->id]) !!}" target="_blank" class="btn btn-success"> <i class="fa fa-print"></i> Print</a><space style="width: 50px"></space>
                    <a href="{!! route('penjualans.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
