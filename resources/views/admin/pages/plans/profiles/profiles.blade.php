@extends('adminlte::page')

@section('title', 'Perfis do plano')

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('plans.index') }}" > Planos </a> </li>
    <li class="breadcrumb-item active"> <a href="{{ route('plans.profiles', $plan->id) }}" class="active"> Perfis </a> </li>
    {{-- <li class="breadcrumb-item active"> <a href="{{ route('plans.profiles') }}" class="active"> Perfis </a> </li> --}}
</ol>

<h1>Perfis do plano <a href="{{ route('plans.profiles.available', $plan->id) }}" class="btn btn-success"><i class="fas fa-plus-square"> Novo Perfil </i></a></h1>
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
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                            <td style="width: 250px;">
                                <a href="{{ route('plans.profile.detach', [$plan->id, $profile->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <nav class="card-footer pagination pagination-lg">
                @if(isset($filters))
                {!!  $profiles->appends($filters)->links() !!}
                @else 
                {!!  $profiles->links() !!}
                
                @endif
                            
            </nav>
    </div>
@stop