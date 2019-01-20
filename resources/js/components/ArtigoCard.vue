<template>
    <div class="card" style="width: 17.15rem;">
        <img class="card-img-top" v-bind:src="imagem" alt="Card image cap">
        <div class="card-body">
            <small>{{data | formataData}} - {{autor}}</small>
            <h5 class="card-title">{{titulo}}</h5>
            <p class="card-text">{{descricao}}</p>
            <a v-bind:href="link" class="btn btn-primary">Leia mais</a>
        </div>
    </div>
</template>

<script>
    export default {
        props:['titulo','descricao','link','imagem','data','autor'],
        filters: {
            formataData: function(valor){
                if(!valor) return '';
                valor = valor.toString();
                valor = valor.split('-');
                return valor[2] + '/' + valor[1] + '/' + valor[0];
            }
        }
    }
</script>

<style scoped>

</style>