@extends('adminlte::page')

@section('title', 'Empresa')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item active"> <a href="{{ route('tenants.index') }}" class="active"> Empresa </a> </li>
</ol>

<h1>Empresa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('tenants.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-info">Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th style="max-width: 100px;">Imagem</th>
                        <th>Nome</th>
                        <th>CNPJ</th>
                        <th style="width: 300px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                        <tr>
                            <td> <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" style="max-width: 100px;"></td>
                            <td> {{ $tenant->name }}</td>
                            <td> {{ $tenant->cnpj }}</td>
                            <td style="width: 250px;">
                                {{-- <a href="{{ route('tenants.categories', $tenant->id) }}" class="btn btn-warning" title="Categorias"><i class="fas fa-layer-group"></i></a> --}}
                                <a href="{{ route('tenants.show', $tenant->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('tenants.edit', $tenant->id) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <nav class="card-footer pagination pagination-lg">
                @if(isset($filters))
                {!!  $tenants->appends($filters)->links() !!}
                @else 
                {!!  $tenants->links() !!}
                
                @endif
                            
            </nav>
    </div>
@stop