<li class="{{ Request::is('generator_builder') ? 'active' : '' }}"><a href="generator_builder">Generator</a></li>
<li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="admin">Administración de Usuarios</a></li>

<li class="{{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{!! route('profiles.index') !!}"><i class="fa fa-edit"></i><span>Profiles</span></a>
</li>

<li class="{{ Request::is('empresas*') ? 'active' : '' }}">
    <a href="{!! route('empresas.index') !!}"><i class="fa fa-edit"></i><span>Empresas</span></a>
</li>

<li class="{{ Request::is('pais*') ? 'active' : '' }}">
    <a href="{!! route('pais.index') !!}"><i class="fa fa-edit"></i><span>Pais</span></a>
</li>

