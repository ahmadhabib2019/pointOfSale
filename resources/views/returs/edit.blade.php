@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Retur
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($retur, ['route' => ['returs.update', $retur->id], 'method' => 'patch']) !!}

                        @include('returs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection