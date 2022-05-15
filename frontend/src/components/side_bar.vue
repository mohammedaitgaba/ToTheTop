<template>
     <section class="side_bar">
            <div class="helpers">
                <div class="add" @click="show" ><img  src="../assets/images/icons/add.png" alt=""></div>
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

            <!-- popup add -->
            

    </section>
    <div class="add_popup" v-show="Visible">
                <form action="" >
                    <div class="title">
                        Add Post
                    </div>
                    <div class="post_title">
                        <label> Post title </label>
                        <input type="text" placeholder="Title" name="title">
                    </div>
                    <div class="post_title">
                        <label> Post description </label>
                        <textarea name="description" placeholder="description"></textarea>
                    </div>
                    <div class="post_title">
                        <label> Post photo </label>
                        <input type="file" name="photo">
                    </div>
                    <div class="post_submit">
                        <button class="submit" type="submit" >Add</button>
                        <button class="cancel" type="button" @click="show">cancel</button> 
                    </div>
                </form>
    </div> 
</template>
<script>
export default {
    data() {
        return {
            Visible : false,
        }
    },
    methods: {
        show(){
            this.Visible = !this.Visible
        }
    },
   
}
</script>
<style lang="scss" scooped>
    @import '../assets/styles/config';
    .side_bar{
        @include flexColumn(center,space-between);
        position: sticky;
        background-color: $white;
        width: 30%;
        height: 60vh;
        --header-height: 101px;
        top: calc(var(--header-height) + 27px);
        padding-bottom: 12px;
        margin-left: 15px;
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
            .search{
                input{
                    width: 90%;
                }
                img{
                    right: 36px;
                }
            }
        }
        @include phone{
            .search{
                img{
                    right: 20px;
                }
            }
            .helpers{
                .add{
                    img{
                        width: 25px;
                    }
                }
            }
        }

    }
    .add_popup{
        @include flexColumn(center,center);
        background-color: rgba(0, 0, 0, 0.55);
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0%;
        z-index: 1;
        transition: ease-in;
        form{
            @include flexColumn(center,space-around);
            position: fixed;
            top: 30%;
            width: 40vw;
            height: 60vh;
            background-color: $white;
            border-radius: 10px;
            .title{
                padding-top: 10px;
                font-size: 24px;
                font-weight: 500

            }
            .post_title{
                @include flexColumn(flex-start,center);
                width: 90%;
                padding: 10px;
                input{
                    width: 100%;
                    height: 40px;
                    padding: 10px;
                    font-size: 18px;
                }
                textarea{
                    width: 100%;
                    resize: none;
                    height: 70px;
                    font-size: 18px;
                    padding: 10px;
                }
               

            }
            .post_submit{
                @include flexRow(flex-start,space-around);
                width: 50%;
                padding: 10px;
                .submit{
                    @include button;
                    padding: 8px 35px ;
                }
                .cancel{
                    @include button;
                    padding: 8px 20px;
                    background-color: black;
                }

            }
        }
    }
</style>