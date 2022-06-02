<template>
    <div class="comments_container">
        <div class="show_more">
            <label @click="showCmnts">Show all comments : </label>
            <label for=""> {{comments.length}} </label>
        </div>
        <form class="make_cmnt" @submit.prevent="addcomment">
            <input type="text" placeholder="Write a public comment" v-model="comment">
            <button name="submit"><img src="../assets/images/icons/send.png" alt="" @mouseover="myImage = otherImage"></button>
            <!-- <button name="submit"><img :src= "myImage" alt="" @mouseover="myImage = otherImage"></button> -->
        </form>
        <div class="all_cmnts_holder">
            <div class="all_cmnts" v-for="elements in comments" v-show="Isvisibe">
            
                <div class="cmnt_maker_pic">
                    <img :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ elements.user_photo" alt="">
                </div>
                <div class="comments">
                    <label for="" class="name"> {{elements.full_name}} </label>
                    <label for=""> {{elements.body}}  </label>
                </div>
            </div>
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
            show_cmnt:"",
            Isvisibe:false,
            myImage:"../assets/images/icons/send.png",
            otherImage:"",
            counter:""

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
            ).then(res =>{this.show_cmnt = res.data.comment 
            this.GetAllComments()
            this.comment = ""
            })
            
        },
        GetAllComments(){
            console.log(this.post_id);
            axios.post('http://localhost/ToTheTop/backend/Comments/GetComment',{
                id_post:this.post_id
            }).then(res =>{
                this.comments = res.data
                // this.counter =Array.length(this.comment) 
                console.log(this.comments);
            })
        },
        showCmnts(){
            this.Isvisibe = !this.Isvisibe
        },


    },
}
</script>
<style lang="scss" scoped>
@import '../assets/styles/config';
    .comments_container{
        position: relative;
            width: 100%;
            @include flexColumn(center,flex-start);
            .show_more{
                width: 100%;
                padding: 10px;
                label{
                    cursor: pointer;
                    transition: 0.5s;
                    font-size: 13px;
                    color: #797373;
                }
                label:hover{
                    text-decoration: underline;
                    color: $orange2;
                }
            }
            .make_cmnt{
                width: 100%;
                height:50px;
                // padding: 10px 0 10px 0;
                position: relative;
                @include flexRow(center,center);
                input{
                    width: 100%;
                    height: 40px;
                    // border-radius: 20px;
                    padding: 10px 55px 10px 10px;
                    border-top: 0.3px solid grey;
                    font-size: 16px;
                }
                input:focus{
                    border: none;
                }
                button{
                    position: absolute;
                    right: 10px;
                    border: none;
                    background-color: $white;
                    // border-radius: 30px;
                    img{
                        width: 30px;
                        height: 30px;
                    }
                    
                } 
                button:hover{
                        background-color: $orange2;
                        border-radius: 50%
                    }

            }
            .all_cmnts_holder{
                @include flexColumn(center,flex-start);
                width: 100%;
                 max-height: 55vh;
                overflow-y: scroll;
                // padding: 10px 0 10px 0;
                // border-top: 0.3px solid gray;

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
                width: 80%;
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
                        width: 40px;
                        height: 40px;
                        min-width: 40px;
                    }
                }
            }
    }
</style>