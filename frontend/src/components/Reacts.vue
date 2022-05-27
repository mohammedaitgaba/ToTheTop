<template>
    <div class="post_react">
        <!-- <label for="">{{checker}} </label> -->
        <div class="claps">
            <img src="../assets/images/icons/love.png" alt="" v-if="like" @click="LikePost">
            <img src="../assets/images/icons/love full.png" alt="" v-if="unlike" @click="LikePost">

            <!-- <img src="../assets/images/icons/love.png" alt="" v-if="post_id = !post_liked" @click="like">
            <img src="../assets/images/icons/love full.png" alt="" v-if="post_id =post_liked" @click="unlike"> -->
            <label for=""> {{likes}}  </label>
            
            <!-- <form @submit.prevent="CheckUserlike">
                <button CheckUserlike>ssssssssssss</button>
            </form> -->
        </div>
        <div class="claps">
            <img src="../assets/images/icons/claps.png" alt="" v-show="clap" @click="claped">
            <img src="../assets/images/icons/claps full.png" alt="" v-show="!clap" @click="unclaped">
            <label for=""> {{claps}}  </label>

        </div>
    </div>
        
        

</template>
<script>
import axios from 'axios';
export default {
     props:{
        post_id: {
            type:Number
        }
    },
    data() {
        return {
            like:true,
            unlike:false,
            clap:true,
            likes:"",
            claps:"",
            checker:""
            // post_liked:""
        }
    },
    mounted() {
        this.GetLikes()
        // this.CheckUserlike()
    },
    methods: {
        LikePost(){
            
            axios.post('http://localhost/ToTheTop/backend/React/AddLike',{
                id_post:this.post_id,
                id_user:sessionStorage.getItem('ID')
            }
            ).then(res => {
                this.checker= res.data 
                console.log(this.checker);
                if (this.checker == 1) {
                    this.like = !this.like
                    this.unlike = !this.unlike
                    this.likes = this.likes + 1
                console.log(this.checker)
                }
                if(this.checker == 2){
                    this.unlike = !this.unlike
                    this.like = !this.like
                    this.likes = this.likes - 1
                    console.log(this.checker)
                }
            })
            
        },
        // like(){
        //     this.liked = !this.liked
        //     this.likes = this.likes + 1
        //     console.log(this.post_id);
        //     axios.post('http://localhost/ToTheTop/backend/React/AddLike',{
        //         id_post:this.post_id,
        //         id_user:sessionStorage.getItem('ID')
        //     }
        //     ).then(res => console.log(res))
        // },
        // unlike(){
        //     this.liked = !this.liked
        //     this.likes = this.likes - 1
        //     axios.post('http://localhost/ToTheTop/backend/React/DeletLike',{
        //         id_post:this.post_id,
        //         id_user:sessionStorage.getItem('ID')
        //     }
        //     ).then(res => console.log(res))
        // },
        claped(){
            this.clap = !this.clap
        },
        unclaped(){
            this.clap = !this.clap

        },
        GetLikes(){
            axios.post('http://localhost/ToTheTop/backend/React/LikesCounter',{
                id_post:this.post_id,
            }).then(res=> {
                this.likes=res.data.counter
            })
        },
        // CheckUserlike(){
        //     axios.post('http://localhost/ToTheTop/backend/React/CheckUserLike',{
        //         id_post:this.post_id,
        //         id_user:sessionStorage.getItem('ID'),
        //     }).then(res=> {
        //         // this.post_liked = res.data.id_post
        //         if ((res.data.id_user = sessionStorage.getItem('ID')) && (res.data.id_post = this.post_id)) {
        //             this.liked = !this.liked
        //             // console.log(this.post_id);
        //             // console.log(res.data.id_post);
        //         }
        //     })
        // }

    },
}
</script>
<style lang="scss" scoped>
    @import '../assets/styles/config';
    .post_react{
        padding-left: 20px;
        @include flexRow(center,flex-start);
        .claps{
            @include flexRow(center,flex-start);
            cursor: pointer;
            img{
                width: 30px
            }
            label{
                font-size: 16px;
                padding: 5px;
            }
        }
    }
</style>