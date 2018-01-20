<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text('rut', null, ['class' => 'form-control']) !!}
</div>

<!-- Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razon_social', 'Razon Social:') !!}
    {!! Form::text('razon_social', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Fantasia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_fantasia', 'Nombre Fantasia:') !!}
    {!! Form::text('nombre_fantasia', null, ['class' => 'form-control']) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<!-- Comunas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comunas_id', 'Comunas Id:') !!}
    {!! Form::text('comunas_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Provincias Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provincias_id', 'Provincias Id:') !!}
    {!! Form::text('provincias_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Logotipo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('logotipo', 'Logotipo:') !!}
    {!! Form::text('logotipo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('empresas.index') !!}" class="btn btn-default">Cancel</a>
</div>
