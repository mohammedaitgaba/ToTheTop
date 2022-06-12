<template>
    <!-- <navbar/> -->
    <Navigation />
    <section class="container">
        <section class="ChatList">
            <div class="search">
                <input type="search" placeholder="search">
                <img src="../assets/images/icons/dashicons_search.png" alt="">
            </div>
            <div class="friends_holder">
                <div class="friend" v-for="elements in friends" @click="getmyfriend(elements.id_user,elements.full_name,elements.user_photo)">
                    <div class="friendinfo">
                        <div class="friendpic">
                            <img :src="'http://localhost/ToTheTop/backend/public/imgUploaded/' + elements.user_photo"
                                alt="freind">
                        </div>
                        <div class="friendname">
                            <label> {{ elements.full_name }} </label>
                        </div>
                    </div>
                    <div class="status" v-if="elements.status == 1">
                        <img src="../assets/images/icons/online.png" alt="">
                    </div>
                    <div class="status" v-if="elements.status != 1">
                        <img src="../assets/images/icons/offline.png" alt="">
                    </div>
                </div>

            </div>
        </section>
        <section class="conversation" v-if="!friend_id">
            <div class="empty_conv">
                Would like to start a conversation ! <br>
                Go Select who you wanna talk with
            </div> 
        </section>

        <section class="conversation" v-if="friend_id">
            <div class="head">
                <div class="friendpic"><img :src="'http://localhost/ToTheTop/backend/public/imgUploaded/' + friend_pic " alt=""></div>
                <div class="friendname"><label> {{friend_name}} </label></div>
            </div>
            <div class="body">
                <div v-for="elements in msgsended" :class="{ 'sender' : (elements.id_sender == idnow), 'reciver' : (elements.id_reciver == idnow)}" >
                    <div class="message" >
                        <!-- <p> Hello med how are yousssssss</p> -->
                        {{elements.message}}
                    </div>
                    <div class="time">
                        {{elements.Created_at}}
                    </div>
                </div>
                
                <div v-for="elements in MessageWs" :class="{ 'sender' : (elements.id_sender == idnow ), 'reciver' : (elements.id_reciver == idnow)}" >
                <div v-if="elements.id_sender == idnow && elements.id_reciver == friend_id">
                    <div class="message" >
                        {{elements.message}}
                    </div>
                    <div class="time">
                        {{elements.Created_at}}
                    </div>
                </div>
                <div v-if="elements.id_sender == friend_id && elements.id_reciver == idnow">
                    <div class="message" >
                        <p > {{elements.message}} </p>
                    </div>
                    <div class="time">
                        {{elements.Created_at}}
                    </div>
                </div>
                </div>
                <!-- <div class="reciver" v-for="elements in msgsended">
                    <div class="name"> Kayn darkblade </div>
                    <div class="message" >
                        <p> Hello med how are dude its been a long time </p>
                        <p v-html="elements"></p>
                    </div>
                    <div class="time">
                        15min ago
                    </div>
                </div> -->
                <!-- <div class="sender">
                    <div class="message">
                        <p> Hello med how are yousssssss
                        </p>
                    </div>
                    <div class="time">
                        15min ago
                    </div>
                </div> -->
                <!-- <div class="sender">
                    <div class="message" >
                        <p> Hello med how are yousssssss
                        </p>
                        <p v-html="ok"></p>
                    </div>
                    <div v-html="ok">

                    </div>
                    <div class="time">
                        15min ago
                    </div>
                </div> -->
            </div>
            <form class="send_message" @submit.prevent="sendMessage">
                <input type="text" v-model="message">
                <button name="submit"><img src="../assets/images/icons/send.png" alt="" ></button>
            </form>
        </section>
    </section>

</template>

<script>
import Navigation from '@/components/Navigation.vue';
import axios from 'axios';
import Pusher from 'pusher-js'
import { io } from "socket.io-client";

export default {
    components: {
        Navigation
    },
    data() {
        return {
            friends: [],
            ok:[],
            friend_id:"",
            friend_name:"",
            friend_pic:"",
            conn:{},
            idnow:parseInt(sessionStorage.getItem('ID')),
            online:"",
            msgsended:[],
            message:"",
            MessageWs:[],
            

            fullmessage:{
                id_sender:"",
                id_reciver:"",
                message:"",
                Created_at:""
            }
            // mymsg:[],

        }
    },
    mounted() {
        this.checkauth()
        this.connected()
        this.getFriends()
        this.UserStatusOnline()
        
    },
    
    unmounted() {
        this.UserStatusOffline()
    },

    methods: {
        checkauth(){
            if (!sessionStorage.getItem('ID')) {
                this.$router.push('/Login')
            }
        },
        getFriends() {
            axios.post('http://localhost/ToTheTop/backend/User/GetAllFriends', {
                id: sessionStorage.getItem('ID')
            }).then(res => {
                this.friends = res.data
            })
        },

        connected(){
        this.conn = new WebSocket('ws://localhost:8080');
            this.conn.onopen = (e) => {
                console.log("Online!");
            };
            this.conn.onClose = (e) => {
                console.log("disconnected");
            }
            this.conn.onmessage = (e) => {
                if (toFriend.id_sender == this.friend_id) {
                    this.MessageWs.push(JSON.parse(e.data))
                }
            // this.MessageWs.push(e.data)
            console.log(JSON.parse(e.data));
            };
        
        },
        
        
        getmyfriend(id,name,pic){
            this.friend_id = id
            this.friend_name = name
            this.friend_pic = pic
            console.log(this.friend_id);
            this.getmessages()
        },
        sendMessage(){

        this.fullmessage.message = this.message
        this.fullmessage.id_sender = this.idnow
        this.fullmessage.id_reciver = this.friend_id
        this.fullmessage.Created_at = Date.now()

            let msg = {
                message : this.message,
                id_sender : this.idnow,
                id_reciver :this.friend_id,
                Created_at : Date.now()
                }
        this.MessageWs.push(msg)
        this.conn.send(JSON.stringify(this.fullmessage))
        axios.post('http://localhost/ToTheTop/backend/Messanger/AddMessage',{
            message:this.message,
            id_sender:sessionStorage.getItem('ID'),
            id_reciver:this.friend_id
        }).then(res=>console.log(res))
        this.MessageWs.push(this.message)
        this.message = ""

        },
        getmessages(){
            axios.post('http://localhost/ToTheTop/backend/Messanger/GetConversation',{
                id_sender:sessionStorage.getItem('ID'),
                id_reciver:this.friend_id
            }).then(res=>{
                console.log(res.data)
                this.msgsended =res.data
                })

            this.conn.onmessage = (e) => {
                let toFriend = JSON.parse(e.data)
                console.log(toFriend.id_reciver);
                console.log(toFriend.id_sender);
                console.log(this.friend_id);
                console.log(this.idnow);
                if (toFriend.id_sender == this.friend_id) {
                    this.MessageWs.push(JSON.parse(e.data))
                }
            // console.log(JSON.parse(e.data));
            
            // this.test=JSON.parse(e.data)
            // console.log(this.test);
            // console.log(this.MessageWs);
            };
                
            
        },
        disconnected(){
            
        },
        UserStatusOnline(){
            axios.post('http://localhost/ToTheTop/backend/User/UserStatusOnline',{
                id: sessionStorage.getItem('ID')
            }).then(res => this.online = 1)
        },
        UserStatusOffline(){
            axios.post('http://localhost/ToTheTop/backend/User/UserStatusOffline',{
                id: sessionStorage.getItem('ID')
            }).then(res => this.online = 0)
        },
        

    },
}
</script>
<style lang="scss" scoped>
@import '../assets/styles/config';

.container {
    @include flexRow(center, space-evenly);
    padding: 120px 130px 20px 130px;
    background-color: #F4F4F4;
    min-width: 100%;
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
            margin: 15px 0 10px 0;

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

        .friends_holder {

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

            .friend:hover {
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

        .empty_conv{
           @include flexRow(center,center); 
           height: 100%;
           font-size: 20px;
           font-weight: 600;
           width: 80%;
           text-align: center
        }
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

            .reciver {
                @include flexColumn(flex-start, flex-start);
                align-self: start;
                max-width: 60%;
                background-color: $white;
                border-radius: 15px;
                margin: 10px;
            }

            .message {
                padding: 8px;
                max-width: 100%;
                overflow-wrap: break-word;
            }

            .time {
                width: 100%;
                font-size: 12px;
                color: #9e9e9e;
                padding: 5px;
                display: flex;
                justify-content: flex-end;


            }

            .name {
                align-self: flex-end;
                padding: 5px;
            }
        }

        .send_message {
            width: 90%;
            position: relative;
            margin-bottom: 15px;
            background-color: #E1E1E1;

            input {
                width: 100%;
                height: 40px;
                border: 1px solid;
                padding: 10px;
                border-radius: 20px;
            }

            button {
                position: absolute;
                right: 10px;
                top: 3px;
                border: none;
                background-color: $white;
                border-radius: 30px;

                img {
                    width: 30px;
                    height: 30px;
                }
            }
        }
    }

    @include tablet {
        @include flexColumn(center, space-evenly);
        padding: 60px 0 0 0;

        .ChatList {
            width: 100%;
            overflow-y: hidden;
            height: 125px;
            margin-bottom: 15px;

            .search {
                margin: 5px;
            }

            .friends_holder {
                @include flexRow(center, flex-start);
                width: 100%;
                overflow-x: scroll;
                overflow-y: hidden;

                .friend {
                    @include flexColumn(center, space-evenly);
                    width: 100px;
                    min-width: 100px;

                    .friendinfo {
                        @include flexColumn(center, space-evenly);

                        .friendpic {
                            width: 40px;
                            height: 40px;
                        }

                        .friendname {
                            font-size: 12px;
                            text-align: center;
                            margin: 0%;

                        }
                    }
                }
            }
        }
    }

    @include phone {
        .conversation {
            width: 90%;
            font-size: 14px;
        }
    }
}
</style>