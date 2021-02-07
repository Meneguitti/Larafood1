@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item active"> <a href="{{ route('categories.index') }}" class="active"> Categorias </a> </li>
</ol>

<h1>Categorias <a href="{{ route('categories.create') }}" class="btn btn-success"><i class="fas fa-plus-square"> Nova Categoria </i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" method="POST" class="form form-inline">
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
                        <th>Descrição</th>
                        <th style="width: 300px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td> {{ $category->name }}</td>
                            <td> {{ $category->description }}</td>
                            <td style="width: 250px;">
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <nav class="card-footer pagination pagination-lg">
                @if(isset($filters))
                {!!  $categories->appends($filters)->links() !!}
                @else 
                {!!  $categories->links() !!}
                
                @endif
                            
            </nav>
    </div>
@stop