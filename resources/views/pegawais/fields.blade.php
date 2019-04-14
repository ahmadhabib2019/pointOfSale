<!-- Nomor Induk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomor_induk', 'Nomor Induk:') !!}
    {!! Form::text('nomor_induk', null, ['class' => 'form-control']) !!}
</div>

<!-- Nama Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nama', 'Nama:') !!}
    {!! Form::text('nama', null, ['class' => 'form-control']) !!}
</div>

<!-- Tempat Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tempat_lahir', 'Tempat Lahir:') !!}
    {!! Form::text('tempat_lahir', null, ['class' => 'form-control']) !!}
</div>

<!-- Tanggal Lahir Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tanggal_lahir', 'Tanggal Lahir:') !!}
    {!! Form::date('tanggal_lahir', null, ['class' => 'form-control']) !!}
</div>

<!-- Alamat Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alamat', 'Alamat:') !!}
    {!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Telepon Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telepon', 'Telepon:') !!}
    {!! Form::text('telepon', null, ['class' => 'form-control']) !!}
</div>

<!-- Foto Field -->

<div class="clearfix"></div>

<!-- Agama Id Field -->
<!--  -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pegawais.index') !!}" class="btn btn-default">Cancel</a>
</div>
