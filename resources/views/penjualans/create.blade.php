@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Penjualan
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'penjualans.store']) !!}

                        @include('penjualans.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
        // var total = 0;
    $(document).ready(function() {
        var i=1;
        var total = 0;
        $('.select-barang').select2({
            theme: "bootstrap",
            placeholder: '--Pilih Barang--'
        });
        
        $('.select-barang').on("select2:select", function(e) { 
            var id = $(this).val();
            $.get("/barang/"+id, function(data, status){
                $('#kode').val(data.kode);
                $('#nama').val(data.nama);
                $('#harga_jual').val(data.harga_jual);
                $('#stok').val(data.stok);
                $('#harga_diskon').val(0);
                var text = "Stok barang tersisa";

                    if($('#stok').val() <= 0){
                    confirm("Stok barang yang anda pilih kosong");
                    }
                    else if($('#stok').val() < 5){
                    alert([text , $('#stok').val()]);
                    }
                    // alert(""$('#stok').val());
            });
            $('#qty').focus();
        });
        $('#btn-tambah').on('click',function(e){
            
            var harga = parseInt($('#harga_jual').val()) * parseInt($('#qty').val());
            var diskon = harga * parseInt($('#harga_diskon').val()) /100;
            var subtotall = harga - diskon;            

            $('#subtotal').val(subtotall);
            $("#daftar-penjualan").append('<div class="row sub-'+i+'">' +
                '<div class="col-md-1">'+i+'</div>'+
                '<div class="col-md-2"><input type="text" readonly class="form-control" name="kode[]" value="'+$('#kode').val()+'"></div>'+

                '<div class="col-md-2"><input type="text" readonly class="form-control" name="nama[]" value="'+$('#nama').val()+'"></div>'+

                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control" name="harga_jual[]" value="'+$('#harga_jual').val()+'"></div>'+

                '<div class="col-md-1 "><input type="text" readonly class="text-right form-control diskon" name="harga_diskon[]" value="'+$('#harga_diskon').val()+'"></div>'+
                
                '<div class="col-md-1 "><input type="text" readonly class="text-right form-control" name="qty[]" value="'+$('#qty').val()+'"></div>'+
                
                '<div class="col-md-2 "><input type="text" id="subtotal-'+i+'" readonly class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></div>'+

                '<div class="col-md-1 "><button type="button" onclick="deleteColumn(\''+i+'\')" class="glyphicon glyphicon-trash btn btn-danger btn-xs"></div>'+

                // '<div class="col-md-2 "><a type="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></div>'+
            '</div>');

            i++;
            $('#kode').val('');
            $('#nama').val('');
            $('#harga_jual').val('');
            $('#harga_diskon').val('');
            $('#qty').val('');
            $('#subtotal').val('');
            $('.select-barang').val(null).trigger('change');
            total = 0 ;
            $(".subtotal").each(function() {
                total += parseInt($(this).val());
            });
            $('.total').val(total);
            
            e.preventDefault();
            
            });
            window.deleteColumn = function(i) {
            var subtotal = parseInt($('.sub-' +i+ ' input.subtotal').val());
            total = total - subtotal ;
            $('.total').val(total);
            $('.sub-'+i).remove();            
            }
            // function deleteColumn(i) {
            // alert("Apakah Anda yakin untuk Menghapus? \n"+"Baris ke - "+i);
            // total -= parseInt($('#sub-'+i).val());
            // $('#total').val(total);
            // $("#columns-"+i).detach();
            // i = i - 1;
            // }

        $('#btn-bayar').on('click',function(e){         
            // var totalbayar = parseInt($('.total').val()) - parseInt($('#diskon').val());
            var hargaTtl = parseInt($('.total').val());
            var diskonTtl = hargaTtl * parseInt($('#diskon').val()) /100;
            var totalbayar = hargaTtl - diskonTtl;
            $('#total_bayar').val(totalbayar);
        });

        $("#bayar").on("change", function(e) {
           var kembalian = parseInt(e.target.value) - parseInt($('#total_bayar').val());
           $('#kembalian').val(parseInt(kembalian));
       });
    });
</script>
@endsection
