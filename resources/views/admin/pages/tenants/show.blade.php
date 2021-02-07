@extends('adminlte::page')

@section('title', 'Destalhes da Empresa')

@section('content_header')
    <b>#Detalhes da Empresa</b>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" style="max-width: 250px;">
                </li>
                <li>
                    <strong>Plano:</strong> {{ $tenant->plan->name }}
                </li>
                <li>
                    <strong>Nome:</strong> {{ $tenant->name }}
                </li>
                <li>
                    <strong>Url:</strong> {{ $tenant->url }}
                </li>
                <li>
                    <strong>E-mail:</strong> {{ $tenant->email }}
                </li>
                <li>
                    <strong>CNPJ:</strong> {{ $tenant->cnpj }}
                </li>
                <li>
                    <strong>Ativo:</strong> {{ $tenant->active == 'Y' ? 'SIM' : 'NÂO'}}
                </li>
            </ul>
            <h3> Assinatura </h3>
            <ul>
                <li>
                    <img src="{{ url("storage/{$tenant->logo}") }}" alt="{{ $tenant->name }}" style="max-width: 250px;">
                </li>
                <li>
                    <strong>Data Assinatura:</strong> {{ $tenant->subscription }}
                </li>
                <li>
                    <strong>Data Expiração:</strong> {{ $tenant->expires_at }}
                </li>
                <li>
                    <strong>Identificador:</strong> {{ $tenant->subscription_id }}
                </li>
                <li>
                    <strong>Ativo?</strong> {{ $tenant->subscription_active ? 'SIM' : 'NÂO'  }}
                </li>
                <li>
                    <strong>Cancelou?</strong> {{ $tenant->subscription_suspended ? 'SIM' : 'NÂO'  }}
                </li>
            </ul>

            @include('admin.includes.alerts')
        </div>
    </div>
@stop