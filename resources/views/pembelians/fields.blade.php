<div class="form-group col-sm-3">
    {!! Form::label('tanggal', 'Tanggal Pembelian Barang:') !!}
    {!! Form::date('tanggal',\Carbon\Carbon::now(), ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Pelanggan Id Field -->
<div class="form-group col-sm-3 ">
    {!! Form::label('supplier_id', 'Supplier:') !!}
    {!! Form::select('supplier_id', $supplier, null, ['class' => 'form-control']) !!}
</div>

<!-- Pegawai Id Field -->
<div class="form-group col-sm-2 ">
    {!! Form::label('pegawai_id', 'Pegawai:') !!}
    {!! Form::text('user_id',Auth::user()->level >=0 ? Auth::user()->id: null, ['class' => 'form-control hidden','hidden']) !!}
    {!! Form::text('name',Auth::user()->level >=0 ? Auth::user()->name: null, ['class' => 'form-control','readonly']) !!}
</div>

<div class="form-group col-sm-3 hidden">
    {!! Form::label('pegawai_id', 'Pegawai:') !!}
    {!! Form::select('pegawai_id', $pegawai, null, ['class' => 'form-control']) !!}
</div>
<div class="col-sm-2">
    {!! Form::label('nota', 'No. Nota:') !!}
    {!! Form::number('nota', null, ['class' => 'form-control','required'=>'required']) !!}
</div>
<div class="col-md-2">  
    {!! Form::label('Barang Baru', 'Tambah Barang Baru:') !!}<br>
    <a onclick="openInNewTab('http://localhost:8000/barangs/create')" id="myButton1" class="btn btn-sm btn-info glyphicon glyphicon-plus"></a><space> >> </space>
    <a id="btn-refresh" class="btn btn-sm btn-success glyphicon glyphicon-refresh"></a>
</div>
<!-- Total Field -->
{{-- <div class="form-group col-sm-3">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::text('total', null, ['class' => 'form-control total','id'=>'total','readonly']) !!}
</div> --}}

{{-- Total Field --}}
{{-- <div class="form-group col-sm-3 pull-right">
    {!! Form::label('diskon_keseluruhan', 'Diskon:') !!}
    {!! Form::text('diskon_keseluruhan', 0, ['class' => 'form-control']) !!}
</div>
 --}}

<div class="form-group col-md-12">
     <div class="row">
        <div class="col-md-2">
        {!! Form::label('Satuan:') !!}
        </div>
        <div class="col-md-3">
        {!! Form::label('Nama Barang:') !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('Harga Beli:') !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('harga Beli Baru:') !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('Qty:') !!}
        </div>
        <div class="col-md-0">
        {!! Form::label('') !!}
        </div>
        <div class="col-md-1">
        {!! Form::label('') !!}
        </div>
      {{--   <div class="col-md-2">
        {!! Form::label('Barang Baru') !!}
        </div> --}}
    </div>

<div class="row">
   
    <div class="col-md-2">
            {!! Form::select('_satuan', array(
                    'Unit'=>'Unit',
                    'Lusin'=>'Lusin',
                    'Gross'=>'Gross',
                    'Kodi'=>'Kodi'
                    ),
                    null, 
                    ['class'=>'form-control select-satuan', 'id'=>'satuan', 'placeholder'=>'--Pilih Satuan --']) 
                !!}           
        </div>
    <div class="col-md-3"style="border: 5px solid #eeeeee">
        {!! Form::select('barang_id', $barang, null, ['class' => 'form-control select-barang','placeholder'=>'--Pilih Barang--']) !!}
    </div>   
    <div class="col-md-2">
        {!! Form::text('_harga_beli', null, ['class' => 'form-control','id'=>'harga_beli','readonly','placeholder'=>'Harga']) !!}
        {!! Form::hidden('_kode', null, ['class' => 'form-control','id'=>'kode','readonly','placeholder'=>'Harga']) !!}
        {!! Form::hidden('_nama', null, ['class' => 'form-control','id'=>'nama','readonly','placeholder'=>'Harga']) !!}
        {!! Form::hidden('_subtotal', null, ['class' => 'form-control','id'=>'subtotal','readonly','placeholder'=>'Harga']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::number('_harga_beli', null, ['class' => 'form-control','id'=>'harga_beli_baru','placeholder'=>'harga beli','autocomplete'=>'off']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::number('_qty', null, ['class' => 'form-control','id'=>'qty','placeholder'=>'Jumlah','autocomplete'=>'off']) !!}
    </div>
    <div class="col-md-0 hidden">
        {!! Form::text('_harga_diskon', null, ['class' => 'form-control','id'=>'harga_diskon','placeholder'=>'Harga']) !!}
    </div>
    <div class="col-md-1">
        <a class="btn btn-sm btn-info" id="btn-tambah">Tambah</a>
    </div>

    {{-- <div class="col-md-2">     
         <a onclick="openInNewTab('http://localhost:8000/barangs/create')" id="myButton1" class="btn btn-sm btn-info glyphicon glyphicon-plus"></a><space> -> </space>
         <a id="btn-refresh" class="btn btn-sm btn-success glyphicon glyphicon-refresh"></a>
    </div> --}}
</div>
</div>

<div class="form-group col-md-12">
    <h4>Daftar Pembelian</h4>
    <div class="row" style="border-bottom: 1px solid #eeeeee;margin-bottom: 15px;padding-bottom: 5px;">
        <div class="col-md-0 hidden">No</div>
        <div class="col-md-1">Kode</div>
        <div class="col-md-2">Nama</div>
        <div class="col-md-2">Harga Beli</div>
        <div class="col-md-1">Harga Beli Baru</div>
        <div class="col-md-1 hidden">Diskon</div>
        <div class="col-md-1">Qty</div>
        <div class="col-md-2">Satuan</div>
        <div class="col-md-2">Subtotal</div>
    </div>
    <div id="daftar-penjualan">

    </div><br/>
    <div class="form-group col-sm-6" style="text-align: right;">
        {!! Form::label('diskon', 'Potongan Harga %') !!}        
    </div>
    <div class="form-group col-sm-2">        
        {!! Form::text('diskon', 0, ['class' => 'form-control','placeholder'=>'%']) !!}
    </div>
    <div class=" col-sm-1" style="text-align: right;">
        {!! Form::label('total', 'Total:') !!}
    </div>
    <div class="form-group col-sm-2">        
        {!! Form::number(('total'), null, ['class' => 'form-control total text-right','placeholder'=>'Rp.','id'=>'total','readonly']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {{-- {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!} --}}
    <button type="button" id="btn-bayar" class="btn btn-primary" data-toggle="modal" data-target="#bayar">
      Bayar
    </button>
    <a href="{!! route('penjualans.index') !!}" class="btn btn-default">Cancel</a>
</div>

<!-- Modal IJAZAH SD -->
    <div class="modal fade" id="bayar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Pembayaran</h4>
                </div>
                <div class="modal-body">
                    {!! Form::label('total_bayar', 'Total:') !!}
                    {!! Form::text('total_bayar', null, ['class' => 'form-control', 'id' => 'total_bayar','readonly']) !!}
                    <br>
                    {!! Form::label('bayar', 'Bayar:') !!}
                    {!! Form::text('bayar', null, ['class' => 'form-control']) !!}
                    <br>
                    {!! Form::label('kembalian', 'Kembalian:') !!}
                    {!! Form::text('kembalian', null, ['class' => 'form-control','readonly']) !!}
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary','id'=>'save']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>