@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item active"> <a href="{{ route('users.index') }}" class="active"> Usuários </a> </li>
</ol>

<h1>Usuários <a href="{{ route('users.create') }}" class="btn btn-success"><i class="fas fa-plus-square"></i> Novo Usuário </a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-info">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th style="width: 300px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td> {{ $user->name }}</td>
                            <td> {{ $user->email }}</td>
                            <td style="width: 250px;">
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('users.roles', $user->id) }}" class="btn btn-info" title="Cargos"><i class="fas fa-address-card"></i> Cargos</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <nav class="card-footer pagination pagination-lg">
                @if(isset($filters))
                {!!  $users->appends($filters)->links() !!}
                @else 
                {!!  $users->links() !!}
                
                @endif
                            
            </nav>
    </div>
@stop