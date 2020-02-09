// Tuto referencia : https://www.youtube.com/watch?v=TVmUW-8-UN4&list=PLB4AdipoHpxaHDLIaMdtro1eXnQtl_UvE&index=28
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
