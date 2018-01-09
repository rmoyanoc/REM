@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        <div class="box">
            <div class="box-header">
                <div class="row">
                    <div class="col-sm-8">
                        <h3 class="box-title">Lista de ciudades</h3>
                    </div>
                    <div class="col-sm-4">
                        <a class="btn btn-primary" href="{{ route('provincias.create') }}">Agregar nueva ciudad</a>
                        @if ($deletedData == 0)
                            <a class="btn btn-primary" href="{{ route('provincias.deleted') }}">Ver Eliminadas</a>
                        @elseif ($deletedData == 1)
                            <a class="btn btn-primary" href="{{ route('provincias.index') }}">Ver</a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <form method="POST" action="{{ route('provincias.search') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="deletedData" value="{{$deletedData}}">
                    @component('layouts.search', ['title' => 'Buscar'])
                        @component('layouts.two-cols-search-row', ['items' => ['Name'],
                        'oldVals' => [isset($searchingVals) ? $searchingVals['provincias.nombre'] : '']])
                        @endcomponent
                    @endcomponent
                </form>
                <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="ciudad: activate to sort column ascending">Nombre Ciudad</th>
                                    <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="region: activate to sort column ascending">Nombre Regi&oacute;n</th>
                                    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{$provincias}}
                                @foreach ($provincias as $ciudad)
                                    <tr role="row" class="odd">
                                        <td>{{ $ciudad->nombre }}</td>
                                        <td>{{ $ciudad->nombre_comuna }}</td>
                                        <td>
                                            @if ($deletedData == 0)
                                            <form class="row" method="POST" action="{{ route('provincias.destroy', ['id' => $ciudad->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                            @elseif ($deletedData == 1)
                                            <form class="row" method="GET" action="{{ route('provincias.restore', ['id' => $ciudad->id]) }}" onsubmit = "return confirm('Are you sure?')">
                                            @endif
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @if ($deletedData == 0)
                                                <a href="{{ route('provincias.edit', ['id' => $ciudad->id]) }}" class="btn btn-warning col-sm-3 col-xs-5 btn-margin">
                                                    Actualizar
                                                </a>
                                                @endif
                                                <button type="submit" class="btn {{$btn}} col-sm-3 col-xs-5 btn-margin">
                                                    {{$text_button}}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="20%" rowspan="1" colspan="1">Nombre Ciudad</th>
                                    <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="state: activate to sort column ascending">Nombre Regi&oacute;n</th>
                                    <th rowspan="1" colspan="2">Acciones</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($provincias)}} of {{count($provincias)}} entries</div>
                        </div>
                        <div class="col-sm-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                {{ $provincias->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </section>
    <!-- /.content -->
@endsection