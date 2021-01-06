@extends('adminlte::page')

@section('title', "Planos Vinculados ao perfil {$profile->name}")

@section('content_header')

<ol class="breadcrumb">
    <li class="breadcrumb-item"> <a href="{{ route('admin.index') }}"> Dashboard </a> </li>
    <li class="breadcrumb-item"> <a href="{{ route('profiles.index') }}" > Perfis </a> </li>
    <li class="breadcrumb-item active"> <a href="{{ route('profiles.plans', $profile->id )}}" class="active" > Permissões </a> </li>
</ol>

<h1>Planos do Perfil {{ $profile->name }} </h1>
@stop

@section('content')
    <div class="card">

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="50">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td style="width: 250px;">
                                <a href="{{ route('plans.profile.detach', [$plan->id, $permission->id]) }}" class="btn btn-danger">Desvincular</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <nav class="card-footer pagination pagination-lg">
                @if(isset($filters))
                {!!  $plans->appends($filters)->links() !!}
                @else 
                {!!  $plans->links() !!}
                
                @endif
                            
            </nav>
    </div>
@stop