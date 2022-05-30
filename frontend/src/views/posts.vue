<template>
        <Navigation/>
    <div class="container">
        <side_bar/> 
        <section class="posts_container">
            <section class="post" v-for="elements in post">
                <posts :posts_data="elements" />
            </section>
        </section> 
    </div>
</template>


<script>
import axios from 'axios';
import side_bar from '@/components/side_bar.vue';
import Navigation from '@/components/Navigation.vue';
import posts from '@/components/posts.vue';

import { EmojiPickerPlugin } from 'vue-emoji-picker'

export default {
    components :{
        side_bar,
        Navigation,
        posts,

    },
    data() {
        return {
            
            post:[],
            // Updater: false,
            post_id:null,
            // title: "",
            // description: "",
            // id_post:"",
            // selectedFile: "",
            loggedid:"",
            
        }
    },
    mounted() {
        this.getallposts()
        this.checkauth()
        this.loggedid = sessionStorage.getItem('ID')
    },
    methods: {
        getallposts(){
            axios.get('http://localhost/ToTheTop/backend/Posts/GetAllPosts')
            .then(res=>{
                this.post = res.data
                console.log(this.post);
                this.post_id = res.data.id
            })
        },
        checkauth(){
            if (!sessionStorage.getItem('ID')) {
                this.$router.push('/Login')
            }
        }
    },
}
</script>

<style lang="scss" scoped>
    @import '../assets/styles/config';
    .container{
        @include flexRow(flex-start,space-around);
        width: 100%;
        min-width: 100%;
        height: 100%;
        padding: 90px;
        margin-top: 40px;
        position: relative;
        background-color: #F4F4F4;
        .posts_container{
            @include flexColumn(stretch,space-evenly);
            width: 55%;
            .post{
                background-color: $white; 
                border-radius: 10px;
                box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;  
                margin-bottom: 30px;  
            }
        }
        @include tablet {
            width: 100%;
            margin-top: 100px;
            .posts_container{
                width: 100%;
            }
        }
        @include phone{
            padding: 90px 15px 70px 15px   ;
        } 
    }
</style>