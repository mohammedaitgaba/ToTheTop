<template>
    <navbar/>
    <div class="container">
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
       <section class="posts_container">

           <div class="user_info">
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
           <div class="comments">

           </div>

       </section> 
    </div>
    <the_footer/>
</template>


<script>
import navbar from '@/components/navbar.vue';
import the_footer from '@/components/the_footer.vue';
export default {
    components :{
        navbar,
        the_footer
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
        background-color: #f1f1f1;
        @include flexRow(center,space-around);
    .side_bar{
        position: sticky;
        background-color: $white;
        width: 35%;
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
        @include flexColumn(center,space-evenly);
        width: 50%;
        background-color: $white;  
    }
    .user_info{
        padding: 10px;
        @include flexRow(center,flex-start);
        .profile_pic{
            width: 20%;
            border-radius: 50%;
            img{
                width: 100%;
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
    }
    .post_description{
        padding: 10px;
        font-size: 16px;
    }

    .post_pic{
        width: 95%;
        img{
            width: 100%;
        }
    }
    .post_react{
        @include flexRow(center,flex-start);
        .claps{
           @include flexColumn(center,flex-start);

        }
    }
    }

</style>