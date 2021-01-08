@extends('adminlte::page')

@section('title', 'Destalhes do Usuário')

@section('content_header')
    <b>#Detalhes do Usuário</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome:</strong> {{ $user->name }}
                </li>
                <li>
                    <strong>E-mail:</strong> {{ $user->email }}
                </li>
                <li>
                    <strong>Empresa:</strong> {{ $user->tenant->name }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> DELETAR USUÁRIO</button>
            </form>
        </div>
    </div>
@stop