@extends('adminlte::page')

@section('title', 'Destalhes do Prduto')

@section('content_header')
    <b>#Detalhes do Prduto</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}" style="max-width: 250px;">
                </li>
                <li>
                    <strong>Titulo:</strong> {{ $product->title }}
                </li>
                <li>
                    <strong>Flag:</strong> {{ $product->flag }}
                </li>
                <li>
                    <strong>Descrição:</strong> {{ $product->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR PRODUTO</button>
            </form>
        </div>
    </div>
@stop