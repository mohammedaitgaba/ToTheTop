<template>
     <section class="side_bar">
            <div class="helpers">
                <div class="add"><img src="../assets/images/icons/add.png" alt=""></div>
                <div class="add"><img src="../assets/images/icons/home.png" alt=""></div>
            </div>
            <div class="search">
                    <input type="search" placeholder="search">
                    <img src="../assets/images/icons/dashicons_search.png" alt="">
            </div>
            <div class="posts_footer">
                <div class="copyriths">
                    <img src="../assets/images/icons/lucide_copyright.png" alt="">
                        Business 2 Community. All Rights Reserved.
                </div>
                    <div class="social">
                        <img src="../assets/images/icons/twitter.png" alt="">
                        <img src="../assets/images/icons/fb.png" alt="">
                        <img src="../assets/images/icons/in.png" alt="">
                        <img src="../assets/images/icons/insta.png" alt="">
                    </div>
            </div>
    </section>
</template>
<style lang="scss" scooped>
    @import '../assets/styles/config';
    .side_bar{
        position: sticky;
        background-color: $white;
        width: 30%;
        height: 60vh;
        --header-height: 101px;
        top: calc(var(--header-height) + 27px);
        padding-bottom: 12px;
        margin-left: 15px;
        @include flexColumn(center,space-between);
        border-radius: 8px;

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
        .posts_footer{
            @include flexColumn(stretch,space-evenly);
            padding: 10px;
        }
        .copyriths{
            font-size: 10px;
            padding: 10px;
            @include flexRow(center,center); 
            img{
                width: 15px;
            }
        }
        .social{
                
                @include flexRow(center , space-evenly);
                img{
                    width: 20px;
                    cursor: pointer;
                }
            }

        @include tablet {
            position:fixed;
            top: 60px;
            width: 100%;
            height: 40px;
            border-radius: 0;
            @include flexRow(center,center);
            flex-direction: row-reverse;
            background-color:#F4F4F4;
            
            .posts_footer{
                display: none;
            }
        }

    }
</style>