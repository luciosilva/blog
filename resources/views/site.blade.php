@extends('layouts.app')

@section('content')
    <pagina tamanho="12">
        <painel titulo="Artigos">

            <p>
                <form class="form-inline text-center" action="{{route('site')}}" method="get">
                    <input type="search" class="form-control" name="busca" placeholder="Buscar" value="{{isset($busca) ? $busca : ""}}"/>
                    <button class="btn btn-info">Buscar</button>
                </form>
            </p>

            <!--div class="card-deck"-->
            <div class="row">

                @foreach($lista as $key => $value)
                    <artigocard
                            titulo="{{str_limit($value->titulo,20,"...")}}"
                            descricao="{{str_limit($value->descricao,20,"...")}}"
                            link="{{route('artigo',[$value->id,str_slug($value->titulo)])}}"
                            imagem="https://www.mylsb.com/webres/Image/DebitCardFAQ_Thumb.png"
                            data="{{$value->data}}"
                            autor="{{$value->autor}}"
                    ></artigocard>
                @endforeach

            </div>

            <div aling="center">
                {{$lista}}
            </div>

        </painel>
    </pagina>
@endsection
