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

<!-- Provincias Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('provincias_id', 'Provincias Id:') !!}
    {!! Form::select('provincias_id', array_merge(['' => 'Seleccionar provincia'], $ciudades), '', ['class' => 'form-control js-provincias']) !!}
</div>

<!-- Comunas Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('comunas_id', 'Comunas Id:') !!}
    {!! Form::select('comunas_id', [''=>'Seleccionar comuna'], 2, ['class' => 'form-control js-comunas']) !!}
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

@push("custom-scripts")
    <script>
        function loadItems(element, path, selectInputClass) {
            var selectedVal = $(element).val();

            // select all
            if (selectedVal == '') {
                return;
            }

            $.ajax({
                type: 'GET',
                url: path + selectedVal,
                success: function (datas) {
                    if (!datas || datas.length === 0) {
                        return;
                    }

                    for (var  i = 0; i < datas.length; i++) {
                        $(selectInputClass).append($('<option>', {
                            value: datas[i].id,
                            text: datas[i].nombre
                        }));
                    }
                },
                error: function (ex) {
                }
            });
        }

        function loadCiudades(element) {
            $('.js-comunas').empty().append('<option value="">Seleccionar comuna</option>');;
            loadItems(element, '../api/provincias/', '.js-comunas');
        }

        function registerEvents() {
            $('.js-provincias').change(function() {
                loadCiudades(this);
            });
        }

        function init() {
            registerEvents();
        }

        init();
    </script>
@endpush
