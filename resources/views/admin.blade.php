@extends('layouts.app')

@section('content')
<pagina tamanho="12">
    <painel titulo="Dashboard">
        <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>

        <div class="row">

            @can('autor')
                <div class="col-md-3">
                    <caixa qtd="{{$totalArtigos}}" titulo="Artigos" url="{{route('artigos.index')}}" cor="red" icone="ion ion-android-alert"></caixa>
                </div>
            @endcan
            @can('eAdmin')
                <div class="col-md-3">
                    <caixa qtd="{{$totalUsuarios}}" titulo="Usuários" url="{{route('usuarios.index')}}" cor="orange" icone="ion ion-android-warning"></caixa>
                </div>
                <div class="col-md-3">
                    <caixa qtd="{{$totalAutores}}" titulo="Autores" url="{{route('autores.index')}}" cor="green" icone="ion ion-checkmark-circled"></caixa>
                </div>
                <div class="col-md-3">
                    <caixa qtd="{{$totalAdmin}}" titulo="Administradores" url="{{route('adm.index')}}" cor="green" icone="ion ion-checkmark-circled"></caixa>
                </div>
            @endcan
        </div>
    </painel>
</pagina>
@endsection
