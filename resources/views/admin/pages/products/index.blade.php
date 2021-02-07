@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item active"> <a href="{{ route('products.index') }}" class="active"> Produtos </a> </li>
</ol>

<h1>Produtos <a href="{{ route('products.create') }}" class="btn btn-success"><i class="fas fa-plus-square"> Novo Produto </i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.search') }}" method="POST" class="form form-inline">
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
                        <th>Titulo</th>
                        <th>Descrição</th>
                        <th style="width: 300px;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td> <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 100px;"></td>
                            <td> {{ $product->title }}</td>
                            <td> {{ $product->description }}</td>
                            <td style="width: 250px;">
                                <a href="{{ route('products.categories', $product->id) }}" class="btn btn-warning" title="Categorias"><i class="fas fa-layer-group"></i></a>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning">Ver</a>
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <nav class="card-footer pagination pagination-lg">
                @if(isset($filters))
                {!!  $products->appends($filters)->links() !!}
                @else 
                {!!  $products->links() !!}
                
                @endif
                            
            </nav>
    </div>
@stop