<template>
    <navigation />
    <div class="update_popup" v-show="Updater">
        <form enctype="multipart/form-data" @submit.prevent="update_user_info">
            <div class="title">
                Update Info
                
            </div>
            <img class="h-16 w-16 bg-white  rounded-full  mb-4"
                                   :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ ProfilePic"
                                    alt="profile pic">
            <div class="post_title">
                <label> Name </label>
                <input type="text" placeholder="Edit your name" v-model="fullName">
            </div>
            <div class="post_title">
                <label> Email </label>
                <input type="text" placeholder="Edit your email" v-model="email">
            </div>
            <div class="add_img">
                <span> Post photo </span>
                
                <label for="image"> Change picture </label>
                <input type="file" id="image" name="image" hidden @change="modifiedPic">
            </div>
            <div class="post_submit">
                <button class="submit" type="submit" @click="UpdateInfo" >Update</button>
                <button class="cancel" type="button" @click="UpdateInfo">cancel</button>
            </div>
        </form>
    </div>
    <section class="p-4 lg:p-20 bg-gray-100 ">
        <div class=" mt-6 flex items-center justify-center" >
            <div class="app bg-gray-100 w-full lg:w-11/12 flex ">

                <main class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2  my-12 mx-12 w-2xl container px-2 mx-auto content-center">

                    <aside class="lg:w-11/12 sidebare_">
                        <div class="bg-white shadow rounded-lg p-5 User_info" >
                            <div class="flex flex-col gap-1 text-center items-center">
                                <img class="h-32 w-32 bg-white p-2 rounded-full shadow mb-4"
                                   :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ ProfilePic"
                                    alt="profile pic">
                                <p class="font-semibold"> {{fullName}} </p>
                                <div class="text-sm leading-normal text-gray-400 flex justify-center items-center">
                                   {{email}}
                                </div>
                            </div>
                            <div class="flex justify-center items-center gap-2 my-3">
                                <div class="font-semibold text-center mx-4">
                                    <p class="text-black"> {{counter}} </p>
                                    <span class="text-gray-400">Posts</span>
                                </div>
                                <div class="font-semibold text-center mx-4">
                                    <p class="text-black">{{friends.length}} </p>
                                    <span class="text-gray-400">Friends</span>
                                </div>
                            </div>
                            <div class="edit_info_user" @click="UpdateInfo">
                                <img src="../assets/images/icons/clarity_edit-solid.png" alt="">
                            </div>
                        </div>

                         <div class="bg-white shadow mt-6  rounded-lg p-6" >
                            <h3 class="text-gray-600 text-lg font-semibold mb-4">Freinds Requests {{requests.length}} </h3>
                            <ul class="flex items-center space-x-2 overflow-x-scroll" v-if="requests" > 
                                <li class="flex flex-col w-14 min-w-[80px] items-center space-y-2" v-for="elements in requests">
                                    <img class="w-[80px] h-[80px] rounded-full" :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ elements.user_photo" alt="freind">
                                    <span class="text-xs text-gray-500">
                                        {{elements.full_name}}
                                    </span>
                                    <div class="flex cursor-pointer">
                                        <img class="w-[25px]" src="../assets/images/icons/success.png" alt="accept friend" @click="accept_friend(elements.id_user)">
                                        <img class="w-[25px]" src="../assets/images/icons/close.png" alt="remove friend" @click="reject_friend(elements.id_user)" >
                                    </div>
                                </li>
                            </ul>
                            <ul class="flex items-center space-x-2 overflow-x-scroll" v-if="requests.length==0">
                                <li>
                                    You have no friends Requests
                                    <img src="" alt="">
                                </li>
                            </ul>
                        </div>

                        <div class="bg-white shadow mt-6  rounded-lg p-6 ">
                            <h3 class="text-gray-600 text-lg font-semibold mb-4">Freinds</h3>
                            <ul class="flex items-center space-x-2 overflow-x-scroll" v-if="friendsCounter != 0" > 
                                <li class="flex flex-col w-14 min-w-[80px] items-center space-y-2 friend_holder" v-for="elements in friends">
                                    <img class="w-[80px] h-[80px] rounded-full friend_pic" :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ elements.user_photo" alt="freind">
                                    <span class="text-xs text-gray-500">
                                        {{elements.full_name}}
                                    </span>
                                    <div class="unfriend" @click="unfriend(elements.id_user)"><img src="../assets/images/icons/unfriended.png" alt="unfriend user"></div>

                                </li>
                            </ul>
                            <ul class="flex items-center space-x-2 overflow-x-scroll" v-if="friendsCounter == 0">
                                <li>
                                    You have no friends 
                                    <img src="" alt="">
                                </li>
                            </ul>
                        </div>
                       

                    </aside>

                    <section class="posts_container" v-if="counter != 0">
                        <section class="post" v-for="elements in postData">
                            <posts :posts_data="elements" />
                        </section>
                    </section> 

                    <section class="posts_container" v-if="counter == 0" >
                        <div class="No_posts">
                            <label for="">Oups  </label>
                            <label for="">You have no posts yet !!</label>
                        </div>
                    </section>
                </main>

            </div>
        </div>

    </section>
</template>
<script>
import Navigation from '@/components/Navigation.vue';
import Reacts from '@/components/Reacts.vue';
import posts from '@/components/posts.vue';
import comments_section from '@/components/comments_section.vue';
import axios from 'axios';
export default {
    components: {
        Navigation,
        Reacts,
        comments_section,
        posts
        
    },
    data() {
        return {
            fullName:"",
            ProfilePic:"",
            email:"",
            postData:[],
            counter:"",
            friendsCounter:"",
            friends:[],
            requests:[],

            selectedFile:"",
            Updater:false
        }
    },
    mounted() {
        this.GetUser();
        this.getUserPosts();
        this.PostsCounter();
        this.FriendsCounter();
        this.getFriends()
        this.checkauth()
        this.getRequests()
    },
    methods: {
        GetUser(){
            axios.post('http://localhost/ToTheTop/backend/User/GetUserById',{
                id:sessionStorage.getItem('ID')
            }).then(res=>{
                this.fullName=res.data[0]['full_name']
                this.ProfilePic=res.data[0]['user_photo']
                this.email=res.data[0]['email']
            })
        },
        getUserPosts(){
            axios.post('http://localhost/ToTheTop/backend/Posts/GetPostsByIdMaker',{
                id:sessionStorage.getItem('ID')
            }).then(res=>{
                this.postData=res.data

            })
        },
        PostsCounter(){
            axios.post('http://localhost/ToTheTop/backend/Posts/CountPostsByIdUser',{
                id:sessionStorage.getItem('ID')
            }).then(res=>{
                this.counter=res.data.counter
            }
            )
        },
        FriendsCounter(){
            axios.post('http://localhost/ToTheTop/backend/User/CountUserFriends',{id:sessionStorage.getItem('ID'),
            }).then(res=>{
                this.friendsCounter = res.data.COUNTER
            })
        },
        getFriends(){
            axios.post('http://localhost/ToTheTop/backend/User/GetAllFriends',{
                id:sessionStorage.getItem('ID')
                }).then(res=>{
                    this.friends = res.data
                })
        },
        getRequests(){
            axios.post('http://localhost/ToTheTop/backend/User/GetAllRequests',{
                id:sessionStorage.getItem('ID')
            }).then(res=> { this.requests = res.data }
            )
        },
        accept_friend(id){
            axios.post('http://localhost/ToTheTop/backend/User/accept_friend',{
                id:sessionStorage.getItem('ID'),
                id_user:id
            }).then(res=> {
                if (res.data==true) {
                    this.getFriends()
                    this.getRequests()
                }
            })
        }, 
        reject_friend(id){
            axios.post('http://localhost/ToTheTop/backend/User/reject_friend',{
                id:sessionStorage.getItem('ID'),
                id_user:id
            }).then(res=> {
                if (res.data==true) {
                    this.getRequests()
                }
            })
        },
        UpdateInfo(){
            this.Updater = !this.Updater
        },
        modifiedPic(event) {
            this.selectedFile = event.target.files[0]
        },

        update_user_info(){
             let config = {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            };
            const data = {
                fullName: this.fullName,
                email: this.email,
                image: this.selectedFile,
                oldimage:this.ProfilePic,
                id:sessionStorage.getItem('ID')
            };
            const formData = new FormData();
            Object.keys(data).forEach((key) => {
                formData.append(key, data[key]);
            });
            axios.post('http://localhost/ToTheTop/backend/User/UpdateUserInfo',
                    formData
                ,config).then(res => this.GetUser())
        },
        checkauth(){
            if (!sessionStorage.getItem('ID')) {
                this.$router.push('/Login')
            }
        },
        unfriend(id){
            axios.post('http://localhost/ToTheTop/backend/User/UnfriendUser',{
                id_friend:id,
                id_user:sessionStorage.getItem('ID')
            }).then(res => {console.log(res)
            this.getFriends()
            })
        }
    },
}
</script>
<style lang="scss" scoped>
@import '../assets/styles/config';
  ::-webkit-scrollbar{
            width: 8px;
            margin-left: 2px;
            height: 5px;
        }
    ::-webkit-scrollbar-thumb{
          background: rgb(122, 121, 121);
          border-radius: 5px;
    }
    .friend_holder{
        position: relative;
        .friend_pic{
            opacity: 1;
            transition: .5s ease;
            backface-visibility: hidden;
        }
        .unfriend{
            position: absolute;
            top:20px;
            opacity: 0;
        }
    }
    .friend_holder:hover{
         .unfriend {
                opacity: 1;
                cursor: pointer;
            }
        .friend_pic{
                opacity: 0.3;
            }
    }
.posts_container {
    @include flexColumn(stretch, flex-start);
    width: 110%;
    display: block;
    overflow-y: scroll;
    height: 91vh;

  

    .post {
        background-color: $white;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
        margin-bottom: 30px;
    }
    .No_posts{
         @include flexColumn(stretch, flex-start);
        text-align: center;
        font-size: 24px;
        font-weight: 600;
    }
    @include tablet {
        margin-top: 30px;
        width: 100%;
    }


}
.User_info{
    position: relative;
    .edit_info_user{
        position: absolute;
        top: 15px;
        right: 15px;
        cursor: pointer;
        img{
            width: 30px;
        }
    }
}
.update_popup {
    @include flexColumn(center, center);
    background-color: rgba(0, 0, 0, 0.55);
    position: absolute;
    width: 100%;
    height: 140vh;
    top: 0%;
    z-index: 1;

    form {
        @include flexColumn(center, space-around);
        position: fixed;
        top: 22%;
        width: 40vw;
        height: 75vh;
        background-color: $white;
        border-radius: 10px;

        .title {
            padding-top: 10px;
            font-size: 24px;
            font-weight: 500
        }

        .post_title {
            @include flexColumn(flex-start, center);
            width: 90%;
            padding: 10px;

            input {
                border: 1px solid $orange1;
                border-radius: 10px;
                width: 100%;
                height: 40px;
                padding: 10px;
                font-size: 18px;
            }

            textarea {
                width: 100%;
                resize: none;
                height: 70px;
                font-size: 18px;
                padding: 10px;
            }


        }

        .add_img {
            @include flexColumn(flex-start, center);
            width: 90%;
            padding: 10px;

            label {
                cursor: pointer;
                align-self: center;
                text-align: center;
                background-color: bisque;
                width: 53%;
                padding: 8px 35px;
                border-radius: 20px
            }

        }

        .post_submit {
            @include flexRow(flex-start, space-around);
            width: 50%;
            padding: 10px;

            .submit {
                @include button;
                padding: 8px 30px;
            }

            .cancel {
                @include button;
                padding: 8px 20px;
                background-color: black;
            }

        }
    }

    @include tablet {
        height: 216vh;
        form {
            width: 60%;

            .title {
                font-size: 18px;
            }

            .post_title {
                font-size: 14px;
                padding: 5px;
            }

            .add_img {
                font-size: 14px;

                label {
                    padding: 5px 15px;
                }

            }

            .post_submit {
                padding: 5px;
                width: 60%;

                .submit {
                    font-size: 14px;
                }

                .cancel {
                    font-size: 14px;
                }
            }
        }
    }

    @include phone {
        form {
            width: 90%;

            .post_submit {
                width: 80%;
            }
        }
    }
}

</style>