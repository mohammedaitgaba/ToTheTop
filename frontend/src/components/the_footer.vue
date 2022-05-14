<template>
    <section class="footer">
        <div class="logo_copyrights">

            <div class="logo_footer">
                <img src="../assets/images/logo/Group 16.png" alt="">
            </div>

            <div class="copyritghs">
                <img src="../assets/images/icons/lucide_copyright.png" alt=""> Business 2 Community.All Rights Reserved.
            </div>
        </div>
        <div class="about_us">
            <div class="info">
                <img src="../assets/images/icons/clarity_email-line.png" alt="">We’re open for any suggestion  
            </div>
            <div class="info">
                <img src="../assets/images/icons/akar-icons_location.png" alt="">We’re open for any suggestion or just  
            </div>
            <div class="info">
                <img src="../assets/images/icons/phone.png" alt="">06503132112445 
            </div>
            
        </div>
        <div class="social">
            <img src="../assets/images/icons/twitter.png" alt="">
            <img src="../assets/images/icons/fb.png" alt="">
            <img src="../assets/images/icons/in.png" alt="">
            <img src="../assets/images/icons/insta.png" alt="">
        </div>
    </section>
</template>

<style lang="scss" scoped>
@import '../assets/styles/config';
    .footer{
        @include flexColumn(center,space-evenly);
        background-color: #FFE5C1;
        height: 40vh;

        .logo_copyrights{
            @include flexColumn(center,center);
            width: 50%;
            .logo_footer{   
                img{
                    width: 120px;
                    cursor: pointer;
                } 
            }
        .copyritghs{
            width: 100%;
            font-size: 13px;
            @include flexRow(center,center);
            img{
                width: 16px;
                margin-right: 3px;
            }
            }
        
        }
        .about_us{
            @include flexRow(center , space-evenly);
            width: 80%;
            div{
                @include flexRow(center , center);
                img{
                    width: 25px;
                    margin-right: 5px;
                }
            }
        }
        .social{
            width: 30%;
            @include flexRow(center , space-evenly);
            img{
                width: 30px;
                cursor: pointer;
            }
        }
    @include tablet{
        height: auto;
        .logo_copyrights{
            width: 100%;
        }
        .about_us{
            @include flexColumn(center,center);
            padding: 20px;
            .info{
                padding: 10px;
            }
        }
        .social{
            width: 100%;
        }
    }
    @include phone{
        .about_us{
            @include flexColumn(flex-start,center);
            width: 90%;
            font-size: 14px;
        }
        .social{
            width: 80%;
            img{
                width: 20px;
            }
        }
    }
    }
</style>