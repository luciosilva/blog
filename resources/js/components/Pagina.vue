<template>
    <div class="container">
        <div class="row justify-content-center">
            <div v-bind:class="defineTamanho">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['tamanho'],
        computed:{
            defineTamanho: function(){
                return "col-md-" + (this.tamanho || "10");
            }
        }
    }
</script>

<style scoped>

</style>