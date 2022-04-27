<script setup>

import navbar from '@/components/navbar.vue';
import the_footer from '@/components/the_footer.vue';

</script>

<template>

    <navbar/>
    
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


    <section class="about_home">

        <div class="about_text">
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
         <div class="about_img">
                <img src="../assets/images/others/motivated.jpg" alt="">
        </div>
    </section>


    <!-- generator section -->

    <section class="generator">
        <div class="generator_head">
            <div class="titles_holder">
                <div class="title1">Motivation &nbsp; </div>
                <div class="title2">Quotes</div>
            </div>
            <div class="paragraph"><p >
                Taking a  look at one or two random quotes each morning. 
                can be a good exercise for journaling prompts.</p>
            </div>
        </div>
        
        <div class="quote">
            <label > Taking a  look at one or two random quotes each morning.can be a good exercise for journaling prompts. </label>
        </div>

        <form action="">
            <button class="generate">
                new quote
            </button>
        </form>

    </section>


    <!-- solutions section -->


    <section class="solutions_container">

        <div class="solutions_head">
            <h1> Featured Solutions</h1>
            <p>If you want to start taking action to achieve what you want in life, 
                learn how to create a solid action plan and start making progress towards your goals!
            </p>
        </div>
        <div class="solutions_body">

            <div class="solution sol1">
               <p>Have Motivated Freinds</p> 
               <img src="../assets/images/others/freinds.jpg" alt=" motivation_freinds">
                <div class="middle">
                   <button class="button">Start a Conversation </button>
               </div>
            </div>

            <div class="solution sol2">
               <p>Share and have  Experience</p> 
               <img src="../assets/images/others/ideas.jpg" alt=" motivation_ideas">
               <div class="middle">
                   <button class="button">Read People Stories </button>
                </div>
                   
            </div>
        </div>
    </section>

    <!-- latest blogs section  -->


    <section class="blogs_container">
        <div class="blogs_head">
            Latest Articles
        </div>
        <div class="blogs_info">
           Recent posts tackling problems in all areas of life
        </div>
        <div class="blogs_body">
            <div>
                <img src="../assets/images/others/blog1.png" alt="">
                <p>Here will be the subject of the post</p>
                <p>Jhon snow</p>
            </div>
            <div>
                <img src="../assets/images/others/unsplash_U2eUlPEKIgU.png" alt="">
                <p>Here will be the subject of the post</p>
                <p>Jhon snow</p>
            </div>
            <div>
                <img src="../assets/images/others/blog3.png" alt="">
                <p>Here will be the subject of the post</p>
                <p>Jhon snow</p>
            </div>
        </div>
    </section>

    <!-- contact us section -->

    <section class="contact_us">
        <form action="">
            <div class="title">
                Send us a message
            </div>
            <div class="contact_inputs">
                <div >
                    <label for="">Full Name</label>
                    <input class="input" type="text" name="fullname">
                </div>
                <div>
                    <label for="">Email</label>
                    <input class="input" type="email" name="email">
                </div>
                <div>
                    <label for="">Message</label>
                    <textarea class="input text" name="message" id="" ></textarea>
                </div>

               
            </div>
            <div >
                <button class="contact_send" type="submit" name="submit">Send</button>
            </div>
        </form>
    </section>
    <the_footer/>

</template>


<!-- <script>
     
    //    var typed = new Typed(".auto_typed", {
    //     strings: ["Coding", "Sleeping", "Eating"],
    //     typeSpeed: 150,
    //     backSpeed: 150,
    //     loop: true
    //     })

</script> -->

<style lang="scss" scoped>
@import '../assets/styles/config';
  
    .container{
        @include flexColumn(center,center);
        position: relative;
        width: 100%;
        height: 100vh;
    }
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
        @include phone{
            font-size: 32px;
            width: 80%
        } ;
    }
    .mid_heading{
        margin-top: 30px;
        font-weight:400;
        font-size: 26px
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
      @include phone{
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
    .generator{
        background-color:$orange3;
        height: 50vh;
        @include flexColumn(center,space-evenly);
        .generator_head{
            @include flexColumn(center,center);
            .paragraph{
                font-size: 16px;
                width: 85%;
            }
        }
        .titles_holder{
            @include flexRow(center,space-between);
            font-size: 28px;
            font-weight: 800;
     
        .title2{
            color: $white;
        }
        }
        .quote{
            width: 80%;
            @include flexRow(center,space-between);
            font-size: 24px;
        }
        .generate{
            @include button;
            background-color: $white;
            color: $orange1;
        }
    
    @include phone{
        .quote{
            font-size: 18px;
        }
        .generator_head{
            .paragraph{
            font-size: 14px;
            }
        }
    }
    }

    .solutions_container{
        @include flexColumn(flex-start,space-between);
        padding: 95px;
        width: 100%;
        height: 95vh;
        .sol1{
                margin-right: 25px
            }
        .sol2{
                margin-left: 25px
            }
        .solutions_head{
            width: 100%;
            p{
                margin-top: 30px;
            }
        }
        .solutions_body{
            width: 100%;
            @include flexRow(center,space-between);
  
          
        }
        .solution{
                width: 80%;
                height: 100%;
                position: relative;
                @include flexColumn(center,space-evenly);
                img{
                     width: 85%;
                     height: 70%;
                    border-radius: 20px;
                    opacity: 1;
                    display: block;
                    transition: .5s ease;
                    backface-visibility: hidden;
                }
                p{
                    font-weight: 400;
                    font-size: 20px;
                }
            .middle{
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 56%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
            .button{
                    @include button;
                }
            }
            }
        .solution:hover{
            .middle {
                opacity: 1;
            }
            img {
            opacity: 0.3;
            }
        }
    
    @include phone{
        padding: 30px 7px 30px 7px ;
        height: auto;
        .solutions_head{
            text-align: center;
        }
        .sol1{
            margin: 15px 0 10px 0;
        }
        .sol2{
           margin: 15px 0 10px 0;
        }
        .solutions_body{
            @include flexColumn(center,space-between);
            .solution{
                width: 100%;
                img{
                    width: 95%;
                }
            }
        }
    }
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
    @include phone{
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
            grid-template-columns: 1fr;
        }
    }
    }
    .contact_us{
       @include flexColumn(center,space-evenly);
        height: 86vh;
        form{
            @include flexColumn(center,space-evenly);
            background-color: $secondary;
            opacity: 0.8;
            width: 60%;
            height: 80%;
            border-radius: 10px;
            box-shadow: rgb(0 0 0 / 3%) 5.4px 5.4px 3.2px;        
            }
        .contact_inputs{
            width: 80%;
        }
        .title{
            font-size: 20px;
            font-weight: 600;
        }
        .input{
            padding:8px;
            display:block;
            border:none;
            background-color:$secondary ;
            border-bottom:1px solid $orange1;
            width:100%;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .input:focus{
            outline: none;
        }
        .text{
              resize: none;
        }
        .contact_send{
            @include button;
        }
    
    @include phone{
        form{
            width: 90%;
        }
    }
    }


    
</style>