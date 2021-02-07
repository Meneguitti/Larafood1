@extends('adminlte::page')

@section('title', 'Categorias do produto')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('products.index') }}" > Produtos </a> </li>
    <li class="breadcrumb-item active"> <a href="{{ route('products.categories', $product->id) }}" class="active"> Categorias </a> </li>
    {{-- <li class="breadcrumb-item active"> <a href="{{ route('products.categories') }}" class="active"> Categorias </a> </li> --}}
</ol>

<h1>Categorias do produto <a href="{{ route('products.categories.available', $product->id) }}" class="btn btn-success"><i class="fas fa-plus-square"> Nova Categoria </i></a></h1>
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
                    @foreach ($categories as $category)
                        <tr>
                            <td>
                                {{ $category->name }}
                            </td>
                            <td style="width: 250px;">
                                <a href="{{ route('products.category.detach', [$product->id, $category->id]) }}" class="btn btn-danger">Desvincular</a>
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