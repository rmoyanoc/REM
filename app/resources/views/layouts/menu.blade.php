<li class="{{ Request::is('generator_builder') ? 'active' : '' }}"><a href="generator_builder">Generator</a></li>
<li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="admin">Administración de Usuarios</a></li>

<li class="{{ Request::is('profiles*') ? 'active' : '' }}">
    <a href="{!! route('profiles.index') !!}"><i class="fa fa-edit"></i><span>Profiles</span></a>
</li>

