<div class="form-group col-sm-2">
    {!! Form::label('tanggal', 'Tanggal:') !!}
    {!! Form::date('tanggal', \Carbon\Carbon::now(), ['class' => 'form-control','readonly']) !!}
</div>

<!-- Pelanggan Id Field -->
<div class="form-group col-sm-2">
    {!! Form::label('supplier_id', 'Supplier:') !!}
    {!! Form::select('supplier_id',$supplier, null, ['class' => 'form-control']) !!}
</div>

<!-- Pegawai Id Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user_id', 'Pegawai:') !!}
    {!! Form::text('user_id',Auth::user()->level >=0 ? Auth::user()->id: null, ['class' => 'form-control hidden']) !!}
    {!! Form::text('name',Auth::user()->level >=0 ? Auth::user()->name: null, ['class' => 'form-control','readonly']) !!}
</div>
<div class="form-group col-sm-2 hidden">
    {!! Form::label('pegawai_id', 'Pegawai:') !!}
    {!! Form::select('pegawai_id',$pegawai, null, ['class' => 'form-control']) !!}
</div>

<!-- Total Field -->
{{-- <div class="form-group col-sm-3">
    {!! Form::label('total', 'Total:') !!}
    {!! Form::number('total', null, ['class' => 'form-control total','placeholder'=>'Rp.','id'=>'total','readonly']) !!}
</div>
 --}}
<!-- Total Field -->
{{-- <div class="form-group col-sm-2 pull-right">
    {!! Form::label('diskon', 'Diskon All :') !!}
    {!! Form::text('diskon', 0, ['class' => 'form-control']) !!}
</div> --}}


<div class="form-group col-md-12">
    <div class="row">
        <div class="col-md-3">
        {!! Form::label('Barang:') !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('Qty:') !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('Harga:') !!}
        </div>
        <div class="col-md-2">
        {!! Form::label('Status Barang:') !!}
        </div>
          {{--  --}}
    </div>
<div class="row">
    <div class="col-md-3"style="border: 5px solid #eeeeee">
        {!! Form::select('barang_id', $barang, null, ['class' => 'form-control select-barang','placeholder'=>'--Pilih Barang--']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::number('_qty', 1, ['class' => 'form-control','id'=>'qty','placeholder'=>'Jumlah','autocomplete'=>'on']) !!}
    </div>
    <div class="col-md-2">
        {!! Form::text('_harga_beli', null, ['class' => 'form-control','id'=>'harga_beli','readonly','placeholder'=>'Rp.']) !!}
        {!! Form::hidden('_kode', null, ['class' => 'form-control','id'=>'kode','readonly','placeholder'=>'Harga']) !!}
        {!! Form::hidden('_nama', null, ['class' => 'form-control','id'=>'nama','readonly','placeholder'=>'Harga']) !!}
        {!! Form::hidden('_subtotal', null, ['class' => 'form-control','id'=>'subtotal','readonly','placeholder'=>'Harga']) !!}
    </div>
    <div class="col-md-0 hidden">
        {!! Form::text('_harga_diskon', 0, ['class' => 'form-control','id'=>'harga_diskon','placeholder'=>'']) !!}
    </div>
    <div class="col-md-2 ">
        {!! Form::text('_status', null, ['class' => 'form-control','id'=>'status','placeholder'=>'status']) !!}
    </div>
    <div class="col-md-3">
        <button class="btn btn-sm btn-info" id="btn-tambah">Tambah</button>
    </div>
</div>
</div>

<div class="form-group col-md-12">
    <h4>Daftar Data Retur</h4>
    <div class="row" style="border-bottom: 1px solid #eeeeee;margin-bottom: 15px;padding-bottom: 5px;">
        <div class="col-md-1">No</div>
        <div class="col-md-1">Kode</div>
        <div class="col-md-2">Nama</div>
        <div class="col-md-2">Status</div>
        <div class="col-md-2">Harga</div>
        <div class="col-md-1">Qty</div>
        <div class="col-md-2">Subtotal</div>
    </div>
    <div id="daftar-retur">

    </div><br/>
    <div class="form-group col-sm-8 " style="text-align: right;">
        {{-- {!! Form::label('diskon', 'Potongan Harga %') !!}         --}}
    </div>

    <div class="form-group col-sm-6 hidden" style="text-align: right;">
        {!! Form::label('diskon', 'Potongan Harga %') !!}        
    </div>

    <div class="form-group col-sm-2 hidden">        
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
    {{-- <a href="{!! route('penjualans.index') !!}" class="btn btn-default">Cancel</a> --}}
</div>

<!-- Modal -->
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
                    {!! Form::label('bayar', 'Jumlah Tunai:') !!}
                    {!! Form::text('bayar', null, ['class' => 'form-control']) !!}
                    <br>
                    {!! Form::label('kembalian', 'Kembalian:') !!}
                    {!! Form::text('kembalian', null, ['class' => 'form-control','readonly']) !!}
                </div>
                <div class="modal-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>