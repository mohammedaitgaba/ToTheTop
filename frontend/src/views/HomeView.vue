<template>

    <!-- <navbar/> -->
    <Navigation/>
    
    <section class="container">
        <div class="background_holder">
        </div> 
        <div class="heading">
            <div class="big_heading">
                MAKE YOUR DREAMS COME TRUE 
                
            </div>
            <div class="mid_heading">
             Let the journey began
                <span class="auto_typed"></span> 
            </div>
        </div>
    </section >

<!-- about section -->
    <section class="about_home"  >

        <div data-aos="fade-right" class="about_text">
            <h1 class="big_title">
                You Can Live Life To the Fullest Without Trading Off Any Aspect of Life
            </h1>
            <p class="paragraph">
                Many are conditioned to live within the limits of what the "average person" can and should do. <br>
            </p>
            <p class="paragraph">
                 Maybe you were being told that to succeed in life, you had to trade off something important; be it your relationships or your health. <br>
            </p>
            <p class="paragraph">
                But the truth is, you don't need to choose between work and life. You can actually have them all and live a full life.
            </p>
       
        </div>
         <div data-aos="fade-left" class="about_img">
             <img src="../assets/images/others/motivated.jpg" alt="">
        </div>
    </section>
        <generator/>
        <home_solutions/>

    <!-- latest blogs section  -->


    <section class="blogs_container">
        <div class="blogs_head">
            Latest Articles
        </div>
        <div class="blogs_info">
           Recent posts tackling problems in all areas of life
        </div>
        <div class="blogs_body">
            <div class="blog">
                <img src="../assets/images/others/blog1.png" alt="">
                <p>Here will be the subject of the post</p>
                <p>Jhon snow</p>
            </div>
            <div class="blog">
                <img src="../assets/images/others/unsplash_U2eUlPEKIgU.png" alt="">
                <p>Here will be the subject of the post</p>
                <p>Jhon snow</p>
            </div>
            <div class="blog">
                <img src="../assets/images/others/blog3.png" alt="">
                <p>Here will be the subject of the post</p>
                <p>Jhon snow</p>
            </div>
        </div>
    </section>

    <!-- contact us section -->
    <contact/>
    
    <the_footer/>

</template>



<script>

import Navigation from '@/components/Navigation.vue';
import contact from '@/components/contact.vue';
import the_footer from '@/components/the_footer.vue';
import generator from '@/components/generator.vue';
import home_solutions from '@/components/home_solutions.vue';

export default {
    components :{
        the_footer,
        contact,
        Navigation,
        generator,
        home_solutions
    },
    mounted() {
        AOS.init();
    },
    methods: {

        

        
    },
}
</script>
<style lang="scss" scoped>
@import '../assets/styles/config';
  
    .container{
        @include flexColumn(center,center);
        position: relative;
        width: 100%;
        height: 100vh;
        .background_holder {
            background-image:linear-gradient(#ded2c912,#f3a0334b,#0000008a ), url('../assets/images/backgrounds/homeback.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top;
            background-attachment: fixed;
            z-index: -1;
            width: 100%;
            height: 110vh;
            position: absolute;
            max-width: 1440px;
            img{
                height: 100%;
                width: 100%;
            }
        }
        .heading{
            @include flexColumn(center,center);
            color: $white;
            font-weight: bold;
            font-size: 42px;
            text-align: center;
            
            .mid_heading{
                margin-top: 30px;
                font-weight:400;
                font-size: 26px
            }
        }
        @include phone{
                .heading{
                    font-size: 24px;
                    .mid_heading{
                        font-size: 22px;
                    }
                }
                // width: 80%
            };
    }
    .about_home{
        @include flexRow(center,space-between);
        padding: 95px;
        margin-top: 30px;
        width: 100%;
      
        .about_img{
            width: 80%;
            margin-left: 20px;
            img{
                width: 100%;
                border-radius: 20px;
            }
        }
        .about_text{
            width: 90%;
            margin-right: 20px;
            .paragraph{
                margin: 15px 0 15px 0;
            }
            .big_title{
                font-weight: 700;
                font-size: 28px;
            }
        }
      @include tablet{
        padding: 45px 7px 30px 7px;
        @include flexColumn(center,space-between);
        font-size: 14px;
        .about_img{
            margin: 0;
            }
        .about_text{
            margin: 0;
        .big_title{
                       font-size: 18px;
                }
        }
        };
        
    }

        
    .blogs_container{
        @include flexColumn(center,space-evenly);
        background-color: #EEEEEE;
        margin-top: 40px;
        height: 75vh;
        .blogs_head{
           font-size: 32px; 
        }
        .blogs_body{
            display: grid;
            grid-template-columns: 1fr 1fr 1fr ;
            justify-content: space-evenly;
            text-align: center;
            width: 90%;
        }
    @include large-tablet{
        height: auto;
        .blogs_body{
            grid-template-columns: 1fr;
            align-items: center;
            .blog{
                margin: auto;
                margin-top: 20px;
                width: 45%;
                img{
                    width: 100%;
                }
            }
        }
        }
    @include tablet{
        text-align: center;
        height: auto;
         .blogs_head{
           font-size: 24px; 
           padding: 8px;
        }
        .blogs_info{
            width: 90%;
            font-size: 18px;
            padding: 8px;
        }
         .blogs_body{
            .blog{
                margin: auto;
                margin-top: 20px;
                width: 90%;
                img{
                    width: 100%;
                }
            }
        }
    }
    }
    .before-enter{
        opacity: 0;
        transform: translateY(100px);
        transition: all 2s ease-out;
    }
    .enter{
        opacity: 1;
        transform: translateY(0);
    }
</style>