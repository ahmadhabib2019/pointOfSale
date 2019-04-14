@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1 class="pull-left">Barangs</h1>
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data" style="width: 30%">
        @csrf<br></br>
        <input type="file" name="file" class="form-control">
        <br>
        <button class="btn btn-success">Import User Data</button>
        <a class="btn btn-warning" href="{{ route('export') }}">Export User Data</a>
        <a class="btn btn-warning" href="{{ url('barang/pdf') }}">Export TO pdf</a>
         </form><br>

        <form action="{{ route('search') }}" method="POST" enctype="multipart/form-data" style="width: 30%">
        @csrf
        <div class="input-group" style="width: 00px">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
        <span class="input-group-btn">
        <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
        </button>
        </span>
        <div class="col-sm-1" action="{{ route('barangs.index')}}" ><button class="btn btn-success">X</button></div></div>
       </form>

      

</script>
    </section>
    <div class="content">        
        <div class="clearfix"></div>   
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
             <div class="container">

            <div class="alert alert-sucsess"> Data yg anda cari {{$search}}</div>
            
             @include('flash::message')
      
        </div>
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

