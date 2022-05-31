<template>
    <div class="post_react">
        <!-- <label for="">{{checker}} </label> -->
        <div class="claps" @click="LikePost">
            <img src="../assets/images/icons/love.png" alt="" v-if="like" >
            <img src="../assets/images/icons/love full.png" alt="" v-if="unlike" >
            <label for=""> {{likes}}  </label>
        </div>

        <div class="claps" @click="clapeOnPost">
            <img src="../assets/images/icons/claps.png" alt="" v-if="clap" >
            <img src="../assets/images/icons/claps full.png" alt="" v-if="unclap">
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
            unclap:false,
            likes:"",
            claps:"",
            checker:"",
            checker2:"",
        }
    },
    mounted() {
        this.GetLikes()
        this.CheckUserlike()
        this.GetClaps()
        this.CheckUserClap()
    },
    methods: {
        LikePost(){
            
            axios.post('http://localhost/ToTheTop/backend/React/AddLike',{
                id_post:this.post_id,
                id_user:sessionStorage.getItem('ID')
            }
            ).then(res => {
                this.checker= res.data 
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
        GetLikes(){
            axios.post('http://localhost/ToTheTop/backend/React/LikesCounter',{
                id_post:this.post_id,
            }).then(res=> {
                this.likes=res.data.counter
            })
        }, 
      
        CheckUserlike(){
            axios.post('http://localhost/ToTheTop/backend/React/CheckUserLike',{
                id_post:this.post_id,
                id_user:sessionStorage.getItem('ID'),
            }).then(res=> {console.log(res)

                if ((res.data.id_user == sessionStorage.getItem('ID'))) {
                    this.like=!this.like
                    this.unlike=!this.unlike
                }
            })
        },
        clapeOnPost(){
             axios.post('http://localhost/ToTheTop/backend/React/AddClap',{
                id_post:this.post_id,
                id_user:sessionStorage.getItem('ID')
            }
            ).then(res => {
                this.checker2= res.data 
                if (this.checker2 == 1) {
                    this.clap = !this.clap
                    this.unclap = !this.unclap
                    this.claps = this.claps + 1
                console.log(this.checker2)
                }
                if(this.checker2 == 2){
                    this.unclap = !this.unclap
                    this.clap = !this.clap
                    this.claps = this.claps - 1
                    console.log(this.checker2)
                }
            })
        },
        GetClaps(){
            axios.post('http://localhost/ToTheTop/backend/React/CountClpas',{
                id_post:this.post_id,
            }).then(res=> {
                this.claps=res.data.counter
            })
        },
         CheckUserClap(){
            axios.post('http://localhost/ToTheTop/backend/React/CheckUserClap',{
                id_post:this.post_id,
                id_user:sessionStorage.getItem('ID'),
            }).then(res=> {console.log(res)

                if ((res.data.id_user == sessionStorage.getItem('ID'))) {
                    this.clap=!this.clap
                    this.unclap=!this.unclap
                }
            })
        },

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