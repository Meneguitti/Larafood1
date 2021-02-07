@extends('adminlte::page')

@section('title', 'Destalhes do Categoria')

@section('content_header')
    <b>#Detalhes do Categoria</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $category->name }}
                </li>
                <li>
                    <strong>Url:</strong> {{ $category->url }}
                </li>
                <li>
                    <strong>Descrição:</strong> {{ $category->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR CATEGORIA</button>
            </form>
        </div>
    </div>
@stop