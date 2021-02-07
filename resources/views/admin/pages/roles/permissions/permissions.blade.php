@extends('adminlte::page')

@section('title', 'Permissões do Cargo')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('roles.index') }}" > Cargo </a> </li>
    {{-- <li class="breadcrumb-item active"> <a href="{{ route('roles.permissions') }}" class="active"> Permissões </a> </li> --}}
</ol>

<h1>Permissões do Cargo <a href="{{ route('roles.permissions.available', $role->id) }}" class="btn btn-success"><i class="fas fa-plus-square"> Nova Permissão </i></a></h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th style="width: 50px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width: 250px;">
                                <a href="{{ route('roles.permissions.detach', [$role->id, $permission->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <nav class="card-footer pagination pagination-lg">
                @if(isset($filters))
                {!!  $permissions->appends($filters)->links() !!}
                @else 
                {!!  $permissions->links() !!}
                
                @endif
                            
            </nav>
    </div>
@stop