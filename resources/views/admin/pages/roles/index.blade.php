@extends('adminlte::page')

@section('title', 'Cargos')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item active"> <a href="{{ route('roles.index') }}" class="active"> Cargos </a> </li>
</ol>

<h1>Cargos <a href="{{ route('roles.create') }}" class="btn btn-success"><i class="fas fa-plus-square"> Novo Cargo </i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('roles.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Pesquisa" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-info">Pesquisar</button>
            </form>
        </div>
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
                            {{--  <td>
                                R$ {{ number_format($role->price, 2, ',', '.') }}
                            </td>  --}}
                            <td style="width: 250px;">
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Editar</a>
                                <a href="{{ route('roles.permissions', $role->id) }}" class="btn btn-warning"><i class="fas fa-user-lock"></i></a>
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