<template>
<nav aria-label="breadcrumb">
    <ul class="breadcrumb">
    <li v-if="lista" v-for="item in lista" v-bind:class="defineClass">
        <a v-if="item.url" v-bind:href="item.url">{{ item.titulo }}</a>
        <span v-if="!item.url">{{item.titulo}}</span>
    </li>
</ul>
</nav>
</template>

<script>
    export default {
        props: ['lista'],
        computed: {
            defineClass: function () {
                if(this.url) {
                    return "breadcrumb-item active"
                } else {
                    return "breadcrumb-item"
                }
            }
        }
    }
</script>