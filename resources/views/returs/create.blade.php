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
                    {!! Form::open(['route' => 'returs.store']) !!}

                        @include('returs.fields')

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
        var i=1
        var status = null;
        var total = 0 ;
        $('.select-barang').select2({
            theme: "bootstrap",
            placeholder: '--Pilih Barang--'
        });
        
        $('.select-barang').on("select2:select", function(e) { 
            var id = $(this).val();
            $.get("/barang/"+id, function(data, status){
                $('#kode').val(data.kode);
                $('#nama').val(data.nama);
                $('#harga_beli').val(data.harga_beli);                            
            });
           $('#qty').focus();
                if ($('#qty').val('')) {
                    $('#qty').val(1);
                };
        });
            $('#status').val();
        $('#btn-tambah').on('click',function(e){
            var subtotal = parseInt($('#harga_beli').val()) * parseInt($('#qty').val());           
            $('#subtotal').val(subtotal);

            $("#daftar-retur").append('<div class="row sub-'+i+'">' +
                '<div class="col-md-1">'+i+'</div>'+
                '<div class="col-md-1"><input type="text" readonly class="form-control" name="kode[]" value="'+$('#kode').val()+'"></div>'+

                '<div class="col-md-2"><input type="text" readonly class="form-control" name="nama[]" value="'+$('#nama').val()+'"></div>'+

                '<div class="col-md-2 "><input type="text" readonly class="form-control status" name="status[]" value="'+$('#status').val()+'"></div>'+

                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control" name="harga_beli[]" value="'+$('#harga_beli').val()+'"></div>'+
                
                '<div class="col-md-1 "><input type="text" readonly class="text-right form-control" name="qty[]" value="'+$('#qty').val()+'"></div>'+
                
                '<div class="col-md-2 "><input type="text" id="subtotal-'+i+'" readonly class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></div>'+

                '<div class="col-md-1 "><button type="button" onclick="deleteColumn(\''+i+'\')" class="glyphicon glyphicon-trash btn btn-danger btn-xs"></div>'+
             
            '</div>');
            i++;
            $('#kode').val('');
            $('#nama').val('');
            $('#harga_beli').val('');
            $('#status').val('');
            $('#qty').val('');
            $('#subtotal').val('');
            $('.select-barang').val(null).trigger('change');
            total = 0;
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
