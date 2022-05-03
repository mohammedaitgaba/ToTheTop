<template>
    <navbar/>
    <div class="container">

        <!-- sidebar section  -->

       <section class="side_bar">
           <div class="helpers">
               <div class="add"><img src="../assets/images/icons/add.png" alt=""></div>
               <div class="add"><img src="../assets/images/icons/home.png" alt=""></div>
           </div>
           <div class="search">
                <input type="search" placeholder="search">
                <img src="../assets/images/icons/dashicons_search.png" alt="">
           </div>
       </section>

        <!-- posts section -->

       <section class="posts_container">

           <div class="user_info">
               <div class="post_head">
                   <div class="profile_pic">
                       <img src="../assets/images/ProfilePic/dog-dating-app-2.jpg" alt="">
                   </div>
                   <div class="username_time">
                       <div>
                           <label class="username">mohammed gaba</label>
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
               Lorem ipsum dolor sit amet consectetur
           </div>
           <div class="post_description">
               Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
               Est iusto reiciendis dolore, et adipisci eius impedit aliquid, 
               numquam ad sunt quo commodi labore obcaecati? Magni quisquam cupiditate 
               consequuntur ad quia?
           </div>
           <div class="post_pic">
               <img src="../assets/images/ProfilePic/dog-dating-app-2.jpg" alt="">
           </div>
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

           <div class="comments_container">
               <form class="make_cmnt">
                   <input type="text" placeholder="Write a public comment">
                   <button type="submit" name="submit"><img src="../assets/images/icons/send.png" alt=""></button>
               </form>
               <div class="all_cmnts">
                   <div class="cmnt_maker_pic">
                       <img src="../assets/images/ProfilePic/dog-dating-app-2.jpg" alt="">
                   </div>
                   <div class="comments">
                       <label for=""> med gaba </label>
                       <label for=""> Lorem ipsum dolor sit amet, consectetsfdfsdfsdfsdfsdfdsur adipisicing elit.</label>
                   </div>
               </div>
               <div class="show_more">
                   <a href="">show more</a>
               </div>
           </div>

       </section> 
    </div>
</template>


<script>
import navbar from '@/components/navbar.vue';
export default {
    components :{
        navbar,
    },
}
</script>

<style lang="scss" scoped>
    @import '../assets/styles/config';
    
    .container{
        width: 100%;
        height: 100%;
        padding: 90px;
        margin-top: 40px;
        position: relative;
        background-color: #F4F4F4;
        @include flexRow(flex-start,space-around);
    .side_bar{
        position: sticky;
        background-color: $white;
        width: 30%;
        height: 220px;
        --header-height: 148px;
        top: calc(var(--header-height) + 12px);
        padding-bottom: 12px;
        margin-left: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
        border-radius: 8px;

    }
    .helpers{
        @include flexRow(center,center);

        .add {
            padding: 10px;
            img{
                width: 30px;
            }
        }
    }
    .search{
        @include flexRow(center,center);
        position: relative;
        width: 80%;
        input{
            width: 100%;
            height: 33px;
            border: 1px solid;
            padding: 10px;
            border-radius: 20px;
        }
        img{
            position: absolute;
            right: 3px;
            width: 25px;
        }
    }
    .posts_container{
        @include flexColumn(stretch,space-evenly);
        width: 55%;
        background-color: $white; 
        .post_head{
            @include flexRow(center,space-between);
        }
            .post_more{
                cursor: pointer;
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
               
            }
        }
        }
                
    }
   

</style>