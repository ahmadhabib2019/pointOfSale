@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pembelian
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pembelian, ['route' => ['pembelians.update', $pembelian->id], 'method' => 'patch']) !!}

                        @include('pembelians.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection