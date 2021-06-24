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
<script type="text/javascript">
    document.getElementById("myButton1").onclick = function(){
        window.open(
            'http://localhost:8000/barangs/create',
            '_blank' // <- This is what makes it open in a new window.
        );
        // location.href = "http://localhost:8000/barangs/create";
    };

</script>
<script>
    $(document).ready(function() {
        var i=1
        var total = 0;
        $('.select-barang').select2({
            theme: "bootstrap",
            placeholder: '---- Pilih Barang---'
        });
        $('#btn-refresh').click(function(){
          $('.select-barang').empty().trigger("change");
          var barangDropDown = $('.select-barang');
          $.ajax({
              type: 'GET',
              url: '{{route('get-barang')}}'
          }).then(function (data) {
              console.log(data)
              var option = new Option(data.nama, data.id, true, true);
              barangDropDown.append(option).trigger('change');

              for (var k in data) {
                  var option = new Option(data[k].kode + ' ' + data[k].nama, data[k].id, true, true);
                  barangDropDown.append(option).trigger('change');
              }
              $('.select-barang').val(null).trigger('change');
          });
        });

        $('.select-satuan').on("change", function(e) { 
            $('#Unit').val('');
            $('#Lusin').val('');
            $('#Gross').val('');
            $('#Kodi').val('');            
            $('.select-barang').val(null).trigger('change');
        });
        $('.select-barang').on("select2:select", function(e) { 
            var id = $(this).val();
            $.get("/barang/"+id, function(data, status){
                $('#kode').val(data.kode);
                $('#nama').val(data.nama);
                $('#harga_beli').val(data.harga_beli);
                $('#harga_diskon').val(0);
                var satuan = $('#satuan').find('option:selected').val(); 
                           
            $('#satuan').focus();
                if ($('#satuan').val() == '') {
                    $('#satuan').val('Unit');
                };
        });
            $('#qty').focus();
             if ($('#qty').val() == '') {
                $('#qty').val(1);
            };

            $('#harga_beli_baru').focus();
             if ($('#harga_beli_baru').val()=='') {
                $('#harga_beli_baru').val(0);
            };

        });
        
        $('#btn-tambah').on('click',function(e){
            var satuan = $('#satuan').find('option:selected').val();
            if (! parseInt($('#harga_beli_baru').val()) == 0) {
                if (satuan == 'Unit') {
                    $('#subtotal').val( parseInt($('#harga_beli_baru').val())*$('#qty').val() * 1 );
                     $('#qty').val($('#qty').val()*1);
                } 
                else if (satuan == 'Lusin') {
                    $('#subtotal').val( parseInt($('#harga_beli_baru').val())*$('#qty').val() * 12 );
                     $('#qty').val($('#qty').val()*12);
                }
                else if (satuan == 'Gross') {
                    $('#subtotal').val( parseInt($('#harga_beli_baru').val())*$('#qty').val() * 144 );
                     $('#qty').val($('#qty').val()*144);
                }                
                else if (satuan == 'Kodi') {
                    $('#subtotal').val( parseInt($('#harga_beli_baru').val())*$('#qty').val() * 20 );
                     $('#qty').val($('#qty').val()*20);
                }
            } 

            if(parseInt($('#harga_beli_baru').val()) == 0) {
                if (satuan == 'Unit') {                    
                    $('#subtotal').val( parseInt($('#harga_beli').val()) * $('#qty').val() * 1);
                     $('#qty').val($('#qty').val()*1);
                } 
                else if (satuan == 'Lusin') {
                     $('#subtotal').val( parseInt($('#harga_beli').val()) * $('#qty').val() * 12);
                     $('#qty').val($('#qty').val()*12);
                }
                else if (satuan == 'Gross') {
                    $('#subtotal').val( parseInt($('#harga_beli').val()) * $('#qty').val() * 144);
                     $('#qty').val($('#qty').val()*144);
                }                
                else if (satuan == 'Kodi') {
                    $('#subtotal').val( parseInt($('#harga_beli').val()) * $('#qty').val() * 20);
                     $('#qty').val($('#qty').val()*20);
                }   
            }

            // var harga1 = parseInt($('#harga_beli_baru').val()) * parseInt($('#qty').val());
            // var harga = parseInt($('#harga_beli').val()) * parseInt($('#qty').val());

            // var diskon = harga * parseInt($('#harga_diskon').val()) /100;
            var subtotal = $('#subtotal').val();

            // if ($('#harga_beli_baru').val() == 0) {
            //     var subtotal = harga;
            // }
            // if ($('#harga_beli').val() == 0){
            //     var subtotal = harga1;
            // }


            // $('#subtotal').val(subtotal);            

            $("#daftar-penjualan").append('<div class="row sub-'+i+'">' +
                '<div class="col-md-0 hidden">'+i+'</div>'+
                '<div class="col-md-1"><input type="text" readonly class="form-control" name="kode[]" value="'+$('#kode').val()+'"></div>'+

                '<div class="col-sm-2"><input type="text" readonly class="form-control" name="nama[]" value="'+$('#nama').val()+'"></div>'+
                
                '<div class="col-md-2 "><input type="text" readonly class="text-right form-control" name="harga_beli[]" value="'+$('#harga_beli').val()+'"></div>'+
                
                '<div class="col-md-1 "><input type="text" readonly class="text-right form-control" name="harga_beli_baru[]" value="'+$('#harga_beli_baru').val()+'"></div>'+

                '<div class="col-md-1 hidden"><input type="text" readonly class="text-right form-control diskon" name="harga_diskon[]" value="'+$('#harga_diskon').val()+'"></div>'+
               
                '<div class="col-md-1 "><input type="text" readonly class="text-right form-control" name="qty[]" value="'+$('#qty').val()+'"></div>'+
               
                '<div class="col-md-2"><input type="text" readonly class="text-right form-control" name="satuan[]" value="'+$('#satuan').val()+'"></div>'+
               
                '<div class="col-md-2"><input type="text" id="subtotal-'+i+'" readonly class="text-right form-control subtotal" name="subtotal[]" value="'+$('#subtotal').val()+'"></div>'+

                '<div class="col-md-1 "><button type="button" onclick="deleteColumn(\''+i+'\')" class="glyphicon glyphicon-trash btn btn-danger btn-xs"></div>'+
            '</div>');
            i++;
            $('#kode').val('');
            $('#nama').val('');
            $('#harga_beli').val('');
            $('#harga_beli_baru').val('');
            $('#harga_diskon').val('');
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
        $('#btn-bayar').on('click',function(e){
            // var totalbayar = parseInt($('.total').val()) - parseInt($('#diskon_keseluruhan').val());
            // $('#total_bayar').val(totalbayar);
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