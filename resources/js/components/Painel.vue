<template>
    <div v-bind:class="defineCor">
        <div v-if="titulo" class="card-header">{{titulo}}</div>

        <div class="card-body">
            <slot></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props:['titulo','cor'],
        computed:{
            defineCor: function(){
                return "card card-default " + (this.cor || "bg-light");
            }
        }
    }
</script>

<style scoped>

    .cinza {
        background-color: #878787 !important;
    }

    .cinza > .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        color: #cfd1c5;
        background-color: #413f42;
        border-bottom: 1px solid #020306;
    }

    .azul {
        background-color: #2040f2 !important;
    }

    .azul > .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        color: #cfd1c5;
        background-color: #081642;
        border-bottom: 1px solid #020306;
    }



</style>