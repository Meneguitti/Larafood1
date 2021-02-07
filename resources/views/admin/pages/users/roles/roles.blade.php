@extends('adminlte::page')

@section('title', 'Cargos do Usuário')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('users.index') }}" > Usuários </a> </li>
    {{-- <li class="breadcrumb-item active"> <a href="{{ route('users.roles') }}" class="active"> Cargos </a> </li> --}}
</ol>

<h1>Cargos do Usuário {{ $user->name }} <a href="{{ route('users.roles.available', $user->id) }}" class="btn btn-success"><i class="fas fa-plus-square"></i> Novo Cargo </a></h1>
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
                    @foreach ($roles as $role)
                        <tr>
                            <td>
                                {{ $role->name }}
                            </td>
                            <td style="width: 250px;">
                                <a href="{{ route('users.role.detach', [$user->id, $role->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <nav class="card-footer pagination pagination-lg">
                @if(isset($filters))
                {!!  $roles->appends($filters)->links() !!}
                @else 
                {!!  $roles->links() !!}
                
                @endif
                            
            </nav>
    </div>
@stop