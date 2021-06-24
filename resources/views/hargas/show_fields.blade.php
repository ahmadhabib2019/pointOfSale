<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $harga->id !!}</p>
</div>

<!-- Harga Beli Field -->
<div class="form-group">
    {!! Form::label('harga_beli', 'Harga Beli:') !!}
    <p>{!! $harga->harga_beli !!}</p>
</div>

<!-- Harga Jual Field -->
<div class="form-group">
    {!! Form::label('harga_jual', 'Harga Jual:') !!}
    <p>{!! $harga->harga_jual !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $harga->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $harga->updated_at !!}</p>
</div>

