<template>
    <!-- <navbar/> -->
    <Navigation/>
    <section class="container">
        <section class="ChatList">
            <div class="search">
                <input type="search" placeholder="search">
                <img src="../assets/images/icons/dashicons_search.png" alt="">
            </div>
            <div class="friends_holder">
                <div class="friend" v-for="elements in friends">
                    <div class="friendinfo">
                        <div class="friendpic">
                            <img :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ elements.user_photo" alt="freind">
                        </div>
                        <div class="friendname">
                            <label> {{elements.full_name}} </label>
                        </div>
                    </div>
                    <div class="status">
                        <img src="../assets/images/icons/online.png" alt="">
                    </div>
                </div>
               
            </div>
        </section>

        <section class="conversation">
            <div class="head">
                <div class="friendpic"><img src="../assets/images/ProfilePic/dog-dating-app-2.jpg" alt=""></div>
                <div class="friendname"><label>Kayn darkblade</label></div>
            </div>
            <div class="body">
                <div class="sender">
                      <div class="name">
                        You
                    </div>
                    <div class="message">
                        <p> Hello med how are yousssssss
                        </p>
                    </div>
                    <div class="time">
                        15min ago
                    </div>
                </div>
                <div class="reciver">
                    <div class="name">
                        Kayn darkblade
                    </div>
                     <div class="message">
                        <p> Hello med how are dude its been a long time </p>
                    </div>
                    <div class="time">
                        15min ago
                    </div>
                </div>
                      <div class="sender">
                      <div class="name">
                        You
                    </div>
                    <div class="message">
                        <p> Hello med how are yousssssss
                        </p>
                    </div>
                    <div class="time">
                        15min ago
                    </div>
                </div>
                      <div class="sender">
                      <div class="name">
                        You
                    </div>
                    <div class="message">
                        <p> Hello med how are yousssssss
                        </p>
                    </div>
                    <div class="time">
                        15min ago
                    </div>
                </div>
            </div>
            <div class="send_message">
                <input type="text">
                <button type="submit" name="submit"><img src="../assets/images/icons/send.png" alt=""></button>

            </div>
        </section>
    </section>

</template>

<script>
import Navigation from '@/components/Navigation.vue';
import axios from 'axios';

export default {
    components: {
        Navigation
    },
    data() {
        return {
            friends:[],
        }
    },
    mounted() {
        this.getFriends()
    },
    methods: {
        getFriends(){
            axios.post('http://localhost/ToTheTop/backend/User/GetAllFriends',{
                id:sessionStorage.getItem('ID')
                }).then(res=>{
                    this.friends = res.data
                    console.log(this.friends);
                })
        }
    },
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/config';

.container {
    @include flexRow(center, space-evenly);
    padding: 120px 130px 20px 130px;
    background-color: #F4F4F4;

    .ChatList {
        @include flexColumn(center, flex-start);
        width: 25%;
        height: 75vh;
        background-color: $white;
        padding-bottom: 12px;
        border-radius: 8px;
        overflow-y: scroll;

        .search {
            @include flexRow(center, center);
            position: relative;
            width: 80%;
            margin: 15px 0 10px 0 ;

            input {
                width: 100%;
                height: 33px;
                border: 1px solid;
                padding: 10px;
                border-radius: 20px;
            }

            img {
                position: absolute;
                right: 3px;
                width: 25px;
            }
        }
        .friends_holder{

         @include flexColumn(center, space-between);
                width: 90%;
            .friend {
            @include flexRow(center, space-between);
            padding: 5px;
            width: 100%;


            .friendinfo {
                @include flexRow(center, center);

                .friendpic {
                    @include flexRow(center, center);
                    width: 50px;
                    height: 50px;

                    img {
                        width: 100%;
                        height: 100%;
                        border-radius: 50%;
                    }
                }

                .friendname {
                    margin-left: 5px;
                    font-size: 14px;

                }
            }
        }
        .friend:hover{
            background-color: #F4F4F4;
            cursor: pointer;
        }

        }
        
    }

    .conversation {
        @include flexColumn(center, flex-start);
        width: 70%;
        height: 75vh;
        background-color: #E1E1E1;
        border-radius: 10px;


        .head {
            @include flexRow(center, flex-start);
            width: 100%;
            height: 65px;
            padding: 10px;
            background-color: $white;
            border-bottom: 1px solid;
            border-radius: 10px 10px 0 0;

            .friendpic {
                @include flexRow(center, center);
                width: 50px;
                height: 50px;

                img {
                    width: 100%;
                    height: 100%;
                    border-radius: 50%;
                }
            }

            .friendname {
                margin-left: 5px;
                font-size: 18px;

            }
        }

        .body {
            @include flexColumn(center, flex-start);
            width: 100%;
            height: 100%;
            padding: 20px;
            overflow-y: scroll;
            font-size: 15px;

            .sender {
                @include flexColumn(flex-start, flex-start);
                align-self: end;
                max-width: 60%;
                background-color: $orange3;
                border-radius: 15px;
                margin: 10px;

            }
            .reciver{
                @include flexColumn(flex-start, flex-start);
                align-self: start;
                max-width: 60%;
                background-color: $white;
                border-radius: 15px;
                margin: 10px;
            }
                .message {
                    padding: 5px;
                    max-width: 100%;
                }

                .time {
                    width: 100%;
                    font-size: 12px;
                    color: #9e9e9e;
                    padding: 5px;
                    display: flex;
                    justify-content: flex-end;
                    

                }
                .name{
                    padding: 5px;
                }
        }
        .send_message{
            width: 90%;
            position: relative;
            margin-bottom: 15px;
            background-color: #E1E1E1;
            input{
                width: 100%;
                height: 40px;
                border: 1px solid;
                padding: 10px;
                border-radius: 20px;
            }
            button{
                    position: absolute;
                    right: 10px;
                    top: 3px;
                    border: none;
                    background-color: $white;
                    border-radius: 30px;
                    img{
                        width: 30px;
                        height: 30px;
                    }
                } 
        }
    }
@include tablet{
    @include flexColumn(center, space-evenly);
    padding: 60px 0 0 0 ;
    .ChatList{
        width: 100%;
        overflow-y: hidden;
        height: 125px;
        margin-bottom: 15px;
        .search{
            margin: 5px;
        }
        .friends_holder{
            @include flexRow(center, flex-start);
            width: 100%;
            overflow-x: scroll;
            overflow-y: hidden;
            .friend{
                @include flexColumn(center, space-evenly);
                width: 100px;
                min-width: 100px;
                .friendinfo{
                    @include flexColumn(center, space-evenly);
                    .friendpic{
                        width: 40px;
                        height: 40px;
                    }
                    .friendname{
                        font-size: 12px;
                        text-align: center;
                        margin: 0%;

                    }
                }
            }
        }
    }
}
@include phone{
    .conversation{
        width: 90%;
        font-size: 14px;
    }
}
}
</style>