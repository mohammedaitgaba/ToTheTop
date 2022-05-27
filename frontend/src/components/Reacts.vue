<template>
    <div class="post_react">
        <div class="claps">
            <img src="../assets/images/icons/love.png" alt="" v-show="clap" @click="claped">
            <img src="../assets/images/icons/love full.png" alt="" v-show="!clap" @click="unclaped">
            <label for=""></label>

        </div>
        <div class="claps">
            <img src="../assets/images/icons/claps.png" alt="" v-show="liked" @click="like">
            <img src="../assets/images/icons/claps full.png" alt="" v-show="!liked" @click="unlike">
            <label for=""></label>
        </div>
    </div>
        
        

</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            liked:true,
            clap:true
        }
    },
    methods: {
        like(){
            this.liked = !this.liked
            axios.post()
        },
        unlike(){
            this.liked = !this.liked
            axios.post()
        },
        claped(){
            this.clap = !this.clap
        },
        unclaped(){
            this.clap = !this.clap

        }

    },
}
</script>
<style lang="scss" scoped>
    @import '../assets/styles/config';
    .post_react{
        padding-left: 20px;
        @include flexRow(center,flex-start);
        .claps{
            @include flexColumn(center,flex-start);
            img{
                width: 30px
            }
        
        }
    }
</style>