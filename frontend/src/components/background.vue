<template>
    <div class="container">
        <slot/>
    </div>
</template>
<style lang="scss" scoped>
.container{
        background-image:linear-gradient(#ded2c912,#f3a0334b,#0000008a ), url('../assets/images/backgrounds/homeback.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: top;
        background-attachment: fixed;
        z-index: -1;
        width: 100%;
        height: 105vh;
        position: absolute;
        max-width: 1440px;
}
</style>