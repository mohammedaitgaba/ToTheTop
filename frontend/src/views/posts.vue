<template>
    <!-- <navbar/> -->
    <Navigation/>
    <div class="container">

        <!-- sidebar section  -->
       <side_bar/>


        <section class="posts_container">
            <section class="post" v-for="elements in post">
               <div class="user_info" >
                   <div class="post_head">
                       <div class="profile_pic">
                           <img src="../assets/images/ProfilePic/dog-dating-app-2.jpg" alt="">
                       </div>
                       <div class="username_time">
                           <div>
                               <label class="username"> {{elements.full_name}} </label>
                           </div>
                           <div class="time">
                               <label > 20h Ago</label>
                           </div>
                       </div>
                   </div>
                   
                    <div class="post_more">
                        <img src="../assets/images/icons/ep_more-filled.png" alt="">
                    </div>
               </div>
    
               <div class="post_title">
                   {{elements.title}}
               </div>
               <div class="post_description">
                   {{elements.description}}
               </div>
               <div class="post_pic">
                   <img alt=""  :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ elements.photo" >
                </div>
               <!-- <div class="post_react">
                   <div class="claps">
                       <img src="../assets/images/icons/claps full.png" alt="">
                   </div>
                   <div class="claps">
                       <img src="../assets/images/icons/love full.png" alt="">
                   </div>
               </div>     -->
               
               <div class="post_react">
                   <div class="claps">
                       <img src="../assets/images/icons/claps.png" alt="">
                       <label for="">30</label>
                   </div>
                   <div class="claps">
                       <img src="../assets/images/icons/love.png" alt="">
                        <label for="">30</label>
    
                   </div>
               </div>
    
               <div class="comments_container ">
                   <form class="make_cmnt">
                       <input type="text" placeholder="Write a public comment">
                       <button type="submit" name="submit"><img src="../assets/images/icons/send.png" alt=""></button>
                   </form>
                   <div class="all_cmnts">
                       <div class="cmnt_maker_pic">
                           <img src="../assets/images/ProfilePic/dog-dating-app-2.jpg" alt="">
                       </div>
                       <div class="comments">
                           <label for="" class="name"> med gaba </label>
                           <label for=""> Lorem ipsum dolor sit amet, consectetsfdfsdfsdfsdfsdfdsur adipisicing elit.</label>
                       </div>
                   </div>
                   <div class="show_more">
                       <a href="">show more </a>
                   </div>
               </div>
               </section>
        </section>

           <!-- popup -->
            

       <!-- </section>  -->
    </div>
</template>


<script>
import axios from 'axios';
import side_bar from '@/components/side_bar.vue';
import Navigation from '@/components/Navigation.vue';
import update_popup from '@/components/update_popup.vue';
export default {
    components :{
        side_bar,
        Navigation,
        update_popup
    },
    data() {
        return {
            post:[],
            url:'http://localhost/ToTheTop/backend/public/imgUploaded/'
        }
    },
    mounted() {
        this.getallposts()
    },
    methods: {
            getallposts(){
            axios.get('http://localhost/ToTheTop/backend/Posts/GetAllPosts')
            .then(res=>{
                console.log(res.data);
                this.post = res.data
                console.log(this.post);
            })
        }
    },
}
</script>

<style lang="scss" scoped>
    @import '../assets/styles/config';
    
    .container{
        @include flexRow(flex-start,space-around);
        width: 100%;
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
    .post_head{
            @include flexRow(center,space-between);
        }
            .post_more{
                cursor: pointer;
                img{
                    width: 25px;
                }
            }
        .user_info{
            padding: 10px;
            @include flexRow(center,space-between);
            .profile_pic{
                width: 60px;
                height: 60px;
                img{
                    width: 100%;
                    height: 100%;
                    border-radius: 50%;
                }
            }
            .username_time{
                padding: 5px;
                .time{
                    color: rgb(100, 99, 99);
                }
            }
        }
         .post_title{
        font-size: 20px;
        @include flexRow(center,center);
        width: 100%;

    }
        .post_description{
            padding: 10px 30px 5px 30px;
            font-size: 16px;
        }

        .post_pic{
            width: 100%;
            padding: 5px;
            img{
                width: 100%;
            }
        }
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
                    padding: 10px;
                    border: 1px solid;
                    font-size: 16px;
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
                @include flexRow(center,space-evenly);
                width: 93%;
                .cmnt_maker_pic{
                    width: 60px;
                    height: 55px;
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
        @include tablet {
            width: 100%;
            .post_title{
                font-size: 16px;
            }
            .post_description{
                font-size: 14px;
                padding: 20px 10px 20px 10px;
            }
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
        }
        @include phone{
            padding: 90px 15px 70px 15px   ;
        }
                
    }
   

</style>