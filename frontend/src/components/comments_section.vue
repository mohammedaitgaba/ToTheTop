<template>
    <div class="comments_container">
        <form class="make_cmnt" @submit.prevent="addcomment">
            <input type="text" placeholder="Write a public comment" v-model="comment">
            <button name="submit"><img src="../assets/images/icons/send.png" alt=""></button>
        </form>
        <div class="all_cmnts" v-for="elements in comments">
        
            <div class="cmnt_maker_pic">
                <img :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ elements.user_photo" alt="">
            </div>
            <div class="comments">
                <label for="" class="name"> {{elements.full_name}} </label>
                <label for=""> {{elements.body}} </label>
            </div>
        </div>
        <div class="show_more">
            <a href="">show more </a>
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
            comment:"",
            comments:[],
        }
    },
    mounted() {
        this.GetAllComments()
    },
    methods: {
        addcomment(){
            axios.post('http://localhost/ToTheTop/backend/Comments/NewComment',
            {
                id_post:this.post_id,
                comment:this.comment,
                id_maker:sessionStorage.getItem('ID')
            }
            ).then(res =>console.log(res))
            
            
        },
        GetAllComments(){
            console.log(this.post_id);
            axios.post('http://localhost/ToTheTop/backend/Comments/GetComment',{
                id_post:this.post_id
            }).then(res =>{
                this.comments = res.data
            })
        }

    },
}
</script>
<style lang="scss" scoped>
@import '../assets/styles/config';
    .comments_container{
            width: 100%;
            @include flexColumn(center,flex-start);
            .make_cmnt{
                width: 90%;
                padding: 10px 0 10px 0;
                position: relative;
                @include flexRow(center,center);
                input{
                    width: 100%;
                    height: 40px;
                    border-radius: 20px;
                    padding: 10px 55px 10px 10px;
                    border: 1px solid;
                    font-size: 16px;
                }
                input:focus{
                    border-color: $orange1;
                }
                button{
                    position: absolute;
                    right: 10px;
                    border: none;
                    background-color: $white;
                    border-radius: 30px;
                    img{
                        width: 30px;
                        height: 30px;
                    }
                } 

            }
            .all_cmnts{
                @include flexRow(flex-start,flex-start);
                width: 93%;
                margin-top: 10px;
                .cmnt_maker_pic{
                    width: 60px;
                    height: 55px;
                    min-width: 60px;
                    img{
                        width: 100%;
                        height: 100%;
                        border-radius: 50%;
                    }
                }
            }
            .comments{
                @include flexColumn(flex-start,center);
                margin-left: 10px;
                background-color: #EAEAEA;
                border-radius: 10px;
                padding: 7px;
               .name{
                   text-decoration: underline;
                   cursor: pointer;
               }
            }
    }
    @include tablet{
        .comments_container{
                .make_cmnt{
                    input{
                        height: 40px;
                    }
                }
                .all_cmnts{
                    width: 98%;
                    font-size: 14px;
                    .comments{
                        margin: 0;
                    }
                    .cmnt_maker_pic{
                        height: 40px;
                    }
                }
            }
    }
</style>