<li class="{{ Request::is('generator_builder') ? 'active' : '' }}"><a href="generator_builder">Generator</a></li>
<li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="admin">Administración de Usuarios</a></li>

<li class="{{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{!! route('profiles.index') !!}"><i class="fa fa-edit"></i><span>Profiles</span></a>
</li>

<li class="{{ Request::is('pais*') ? 'active' : '' }}">
    <a href="{!! route('pais.index') !!}"><i class="fa fa-edit"></i><span>Pais</span></a>
</li>

<li class="{{ Request::is('regiones*') ? 'active' : '' }}">
    <a href="{!! route('regiones.index') !!}"><i class="fa fa-edit"></i><span>Regiones</span></a>
</li>

<li class="{{ Request::is('provincias*') ? 'active' : '' }}">
    <a href="{!! route('provincias.index') !!}"><i class="fa fa-edit"></i><span>Provincias</span></a>
</li>

<li class="{{ Request::is('comunas*') ? 'active' : '' }}">
    <a href="{!! route('comunas.index') !!}"><i class="fa fa-edit"></i><span>Comunas</span></a>
</li>

<li class="{{ Request::is('empresas*') ? 'active' : '' }}">
    <a href="{!! route('empresas.index') !!}"><i class="fa fa-edit"></i><span>Empresas</span></a>
</li>

