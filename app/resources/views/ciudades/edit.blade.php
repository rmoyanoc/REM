@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Ciudad
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($ciudad, ['route' => ['ciudades.update', $ciudad->id], 'method' => 'patch']) !!}

                        @include('ciudades.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection