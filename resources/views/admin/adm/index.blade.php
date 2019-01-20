@extends('layouts.app')

@section('content')
    <pagina tamanho="12">

        @if($errors->all())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach($errors->all() as $key => $value)
                    <li>{{$value}}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <painel titulo="Lista de administradores">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
            <!--modallink tipo="button" nome="meuModalTeste" titulo="Criar" css=""></modallink-->

            <tabela-lista
                    v-bind:titulos="['#','Nome','E-mail']"
                    v-bind:itens="{{json_encode($listaModelo)}}"
                    criar="#criar" detalhe="/admin/adm/" editar="/admin/adm/" token="{{ csrf_token() }}"
                    modal="sim"
                    ordem="desc" ordemcol="2"
            ></tabela-lista>
            <div aling="center">
                {{$listaModelo}}
            </div>
        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('adm.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Título" value="{{old('name')}}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}">
            </div>
            <div class="form-group">
                <label for="admin">Admin</label>
                <select class="form-control" id="admin" name="admin">
                    <option {{(old('admin') && old('admin') == 'N' ? 'selected' : "") }} value="N">Não</option>
                    <option {{(old('admin') && old('admin') == 'S' ? 'selected' : "") }} {{(!old('admin') ? 'selected' : '')}} value="S">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
            </div>

        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>
    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" v-bind:action="'/admin/adm/' + $store.state.item.id" method="post" enctype="" token="{{ csrf_token() }}">

            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" id="name" name="name" v-model="$store.state.item.name" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="e-mail">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" v-model="$store.state.item.email" placeholder="E-mail">
            </div>
            <select class="form-control" id="admin" name="admin"  v-model="$store.state.item.admin">
                <option value="N">Não</option>
                <option value="S">Sim</option>
            </select>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>
    <modal nome="detalhe" v-bind:titulo="$store.state.item.name">
        <p>@{{$store.state.item.email}}</p>
    </modal>
@endsection
