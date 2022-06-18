<template>
    <Navigation/>
    <div class="container">
        <img src="../assets/images/backgrounds/404-Pages.jpg" alt="">
    </div>
</template>
<script>
import Navigation from '@/components/Navigation.vue';

export default {
    components:{
        Navigation
    }
}
</script>
<style lang="scss" scoped>
    .container{
        // padding-top: 90px;
        img{
            width: 100vw;
            height: 100vh;
        }
    }
</style>