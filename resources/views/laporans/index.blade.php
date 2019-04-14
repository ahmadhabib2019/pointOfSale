@extends('layouts.app')

@section('content')
<section class="content-header">
  <h class="" style="font-size: 30px"><b>Laba Rugi</b> </h>
</section>
<div class="content">
    <div class="box box-primary">
        <div class="box-body">            
            {!! Form::open(['route' => 'get-laba-rugi']) !!}
                <div class="col-sm-3">
                    <div class="">
                    {!! Form::label('tanggal_start_beli', 'Start Date:') !!}
                    {!! Form::text('tanggal_start_beli', \Carbon\Carbon::now()->format('d/m/Y'), ['class' => 'form-control form-tanggal', 'name' => 'tanggal_start_beli']) !!}
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="">
                    {!! Form::label('tanggal_end_beli', 'End Date:') !!}
                    {!! Form::text('tanggal_end_beli', \Carbon\Carbon::now()->format('d/m/Y'), ['class' => 'form-control form-tanggal', 'name' => 'tanggal_end_beli']) !!}      
                            <div style="height: 10px"></div>
                    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}           
                    </div>
                </div>    
            <div class="col-sm-3">                    
                <span class="info-box-text">total Penjualan</span>
                {{-- <span class="info-box-number">{!! $totalPenjualan !!}</span> --}}
            </div>
                <div class="col-md-3">
                            @if(isset($cekLabaRugi))
                                @if($cekLabaRugi)
                        <div class="info-box bg-green">
                            @else
                            <div class="info-box bg-red">
                                @endif
                                @else
                                <div class="info-box bg-white">
                                @endif
                                    <span class="info-box-icon"><i class="fa fa-dollar"></i></span>
                                    <div class="info-box-content">
                                    <span class="info-box-text">Total Laba/Rugi</span>
                                    {{-- <span class="info-box-number">{!! $labaRugi !!}</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>                                        
                </div> 
            {!! Form::close() !!}

          
        </div>
    </div>
</div>
@endsection


