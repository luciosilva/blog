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






        <painel titulo="Lista de artigos">
            <migalhas v-bind:lista="{{$listaMigalhas}}"></migalhas>
            <!--modallink tipo="button" nome="meuModalTeste" titulo="Criar" css=""></modallink-->

            <tabela-lista
                    v-bind:titulos="['#','Título','Descrição','Autor','Data']"
                    v-bind:itens="{{ json_encode($listaArtigos) }}"
                    criar="#criar" detalhe="/admin/artigos/" editar="/admin/artigos/" deletar="/admin/artigos/" token="{{ csrf_token() }}"
                    modal="sim"
                    ordem="asc" ordemcol="0"
            ></tabela-lista>
            <div aling="center">
                {{$listaArtigos}}
            </div>
        </painel>
    </pagina>
    <modal nome="adicionar" titulo="Adicionar">
        <formulario id="formAdicionar" css="" action="{{route('artigos.store')}}" method="post" enctype="" token="{{ csrf_token() }}">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="{{old('titulo')}}">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição" value="{{old('descricao')}}">
            </div>

            <div class="form-group">
                <label for="addConteudo">Conteúdo</label>
                <ckeditor
                        id="addConteudo"
                        name="conteudo"
                        value="{{old('conteudo')}}"
                        v-bind:config="{
                                        toolbar: [
                                          [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                                        ],
                                        height: 200
                                      }" >
                </ckeditor>


            </div>

            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" name="data" value="{{old('data')}}">
            </div>

        </formulario>
        <span slot="botoes">
            <button form="formAdicionar" class="btn btn-info">Adicionar</button>
        </span>
    </modal>
    <modal nome="editar" titulo="Editar">
        <formulario id="formEditar" :action="'/admin/artigos/' + $store.state.item.id" method="post" enctype="" token="{{ csrf_token() }}">

            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" v-model="$store.state.item.titulo" placeholder="Título">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" id="descricao" name="descricao" v-model="$store.state.item.descricao" placeholder="Descrição">
            </div>
            <div class="form-group">
                <label for="editConteudo">Conteúdo</label>

                <ckeditor
                        id="editConteudo"
                        name="conteudo"
                        v-model="$store.state.item.conteudo"
                        v-bind:config="{
                                        toolbar: [
                                          [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript' ]
                                        ],
                                        height: 200
                                      }" >
                </ckeditor>


            </div>
            <div class="form-group">
                <label for="data">Data</label>
                <input type="date" class="form-control" id="data" name="data" v-model="$store.state.item.data">
            </div>
        </formulario>
        <span slot="botoes">
            <button form="formEditar" class="btn btn-info">Atualizar</button>
        </span>
    </modal>
    <modal nome="detalhe" :titulo="$store.state.item.titulo">
        <p v-html="$store.state.item.conteudo"></p>
        <p>@{{$store.state.item.descricao}}</p>


    </modal>
@endsection
