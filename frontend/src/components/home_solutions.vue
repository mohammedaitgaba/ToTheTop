<template>
    <section class="solutions_container">

        <div class="solutions_head">
            <h1> Featured Solutions</h1>
            <p>If you want to start taking action to achieve what you want in life, 
                learn how to create a solid action plan and start making progress towards your goals!
            </p>
        </div>
        <div class="solutions_body">

            <div data-aos="zoom-in-down" class="solution sol1">
               <p>Have Motivated Freinds</p> 
               <img src="../assets/images/others/freinds.jpg" alt=" motivation_freinds">
                <div class="middle">
                   <router-link to="/messanger"><button class="button">Start a Conversation </button></router-link>
               </div>
            </div>

            <div data-aos="zoom-in-up" class="solution sol2">
               <p>Share and have  Experience</p> 
               <img src="../assets/images/others/ideas.jpg" alt=" motivation_ideas">
               <div class="middle">
                   <router-link to="/posts"><button class="button">Read People Stories </button></router-link>
                </div>
                   
            </div>
        </div>
    </section>
</template>
<script>
export default {
    
}
</script>
<style lang="scss" scooped>
@import '../assets/styles/config';

    .solutions_container{
        @include flexColumn(center,space-evenly);
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
            width: 80%;
            text-align: center;
            h1{
                font-size: 28px;
            }
            p{
                margin-top: 30px;
                font-size: 18px;
            }
        }
        .solutions_body{
            width: 90%;
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
    
    @include tablet{
        padding: 30px 7px 30px 7px ;
        height: auto;
        .solutions_head{
            text-align: center;
            width: 95%;
             h1{
                font-size: 22px;
            }
            p{
                margin-top: 15px;
                font-size: 14px;
            }
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
                width: 80%;
                img{
                    width: 75%;
                    height: 50vh;
                }
               p{
                   font-size: 18px;
               }
               .middle{
                   .button{
                       font-size: 14px;
                   }
               }
            }
        }
    }
    @include phone{
         .solutions_body{
             .solution{
                 width: 90%;
                img{
                    width: 100%;
                    height: 40vh;
                }
                .middle{
                   .button{
                       font-size: 14px;
                       padding: 6px 15px;
                   }
               }
            }
        }
    }
    }
</style>