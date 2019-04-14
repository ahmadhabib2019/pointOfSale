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
                    {!! Form::open(['route' => 'pembelians.store']) !!}

                        @include('pembelians.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        var i=1
        $('.select-barang').select2({
            theme: "bootstrap",
            placeholder: '------ Pilih ------'
        });
        $('.select-barang').on("select2:select", function(e) { 
            var id = $(this).val();
            $.get("/barang/"+id, function(data, status){
                $('#kode').val(data.kode);
                $('#nama').val(data.nama);
                $('#harga_beli').val(data.harga_beli);
                $('#harga_diskon').val(0);
            });
            $('#qty').focus();
        });
        $('#btn-tambah').on('click',function(e){
            var subtotal = parseInt($('#harga_beli').val()) * parseInt($('#qty').val()) - parseInt($('#harga_diskon').val());
            $('#subtotal').val(subtotal);
            $("#daftar-penjualan").append('<div class="row">'+
            '<div class="col-md-1">'+i+'</div>'+
                '<div class="col-md-2"><input type="text" readonly class="form-control" name="kode[]" value="'+$('#kode').val()+'"></div>'+
                '<div class="col-md-2"><input type="text" readonly class="form-control" name="nama[]" value="'+$('#nama').val()+'"></div>'+
                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control" name="harga_beli[]" value="'+$('#harga_beli').val()+'"></div>'+
                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control diskon" name="harga_diskon[]" value="'+$('#harga_diskon').val()+'"></div>'+
                '<div class="col-md-1 "><input type="text" readonly class="text-right form-control" name="qty[]" value="'+$('#qty').val()+'"></div>'+
                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></div>'+
            '</div>');
            i++;
            $('#kode').val('');
            $('#nama').val('');
            $('#harga_beli').val('');
            $('#harga_diskon').val('');
            $('#qty').val('');
            $('#subtotal').val('');
            $('.select-barang').val(null).trigger('change');
            var total = 0;
            $(".subtotal").each(function() {
                total += parseInt($(this).val());
            });
            $('.total').val(total);
            
            e.preventDefault();
        });

        $('#btn-bayar').on('click',function(e){
            var totalbayar = parseInt($('.total').val()) - parseInt($('#diskon_keseluruhan').val());
            $('#total_bayar').val(totalbayar);
        });

        $("#bayar").on("change", function(e) {
           var kembalian = parseInt(e.target.value) - parseInt($('#total_bayar').val());
           $('#kembalian').val(parseInt(kembalian));
       });
    });
</script>
@endsection