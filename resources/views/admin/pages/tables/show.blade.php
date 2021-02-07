@extends('adminlte::page')

@section('title', 'Destalhes do Mesa')

@section('content_header')
    <b>#Detalhes da Mesa</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Identificador da Mesa:</strong> {{ $table->identify }}
                </li>
                <li>
                    <strong>Descrição:</strong> {{ $table->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('tables.destroy', $table->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR MESA</button>
            </form>
        </div>
    </div>
@stop