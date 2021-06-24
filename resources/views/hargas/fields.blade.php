<div class="form-group col-sm-6">
    {!! Form::label('barang_id', 'Harga Beli:') !!}
    {!! Form::select('barang_id',$barang, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('harga_beli', 'Harga Beli:') !!}
    {!! Form::text('harga_beli', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    {!! Form::text('harga_jual', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('hargas.index') !!}" class="btn btn-default">Cancel</a>
</div>
