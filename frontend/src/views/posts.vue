<template>
    <!-- <navbar/> -->
    <Navigation/>
    <div class="container">
        <!-- popup update post -->
    <div class="update_popup" v-show="Updater">
        <form enctype="multipart/form-data" @submit.prevent="update_post">
            <div class="title">
                Update Post
            </div>
            <div class="post_title">
                <label> Post title </label>
                <input type="text" placeholder="Title" v-model="title">
            </div>
            <div class="post_title">
                <label> Post description </label>
                <textarea placeholder="description" v-model="description"></textarea>
            </div>
            <div class="add_img">
                <span> Post photo </span>
                <label for="image"> Choose picture </label>
                <input type="file" id="image" name="image" hidden @change="modifiedPic">
            </div>
            <div class="post_submit">
                <button class="submit" type="submit" >Update</button>
                <button class="cancel" type="button" @click="update_popup">cancel</button>
            </div>
        </form>
    </div>
        
        <!-- sidebar section  -->
       <side_bar/>

        <section class="posts_container">
            <section class="post" v-for="elements in post">
               <div class="user_info" >
                   <div class="post_head">
                       <div class="profile_pic">
                           <img src="../assets/images/ProfilePic/dog-dating-app-2.jpg" alt="">
                       </div>
                       <div class="username_time">
                           <div>
                               <label class="username"> {{elements.full_name}} </label>
                               <label class="username">  </label>
                               <!-- <label class="username"> {{elements.id_post}} </label> -->
                           </div>
                           <div class="time ">
                               <label > 20h Ago</label>
                               
                           </div>
                       </div>
                   </div>
                    <div class="post_more"  @click="drop(elements.id_post)" v-if="elements.id_maker == loggedid">
                        
                        <img src="../assets/images/icons/ep_more-filled.png" alt="">
                        <div class="dropdown_more" v-show="Visibe" >
                            <!-- <input v-model="elements.id_post"> -->
                            <div class="dropped_item_update">
                                <button @click="update_popup(elements.id_post)">Update</button>
                            </div>
                            <div class="dropped_item_delete">
                                <button @click="deletePost(elements.id_post)">Delete  </button>
                            </div>
                        </div>
                    </div>

               </div>
    
               <div class="post_title">

                   {{elements.title}}
               </div>
               <div class="post_description">
                   {{elements.description}}
               </div>
                <div class="post_pic">
                   <img alt="" :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ elements.photo" >
                </div>
                <Reacts/>
                <comments_section :post_id="elements.id_post" />

               </section>
        </section>
    </div>
</template>


<script>
import axios from 'axios';
import side_bar from '@/components/side_bar.vue';
import Navigation from '@/components/Navigation.vue';
import update_popup from '@/components/update_popup.vue';
import Reacts from '@/components/Reacts.vue';
import comments_section from '@/components/comments_section.vue';
import { EmojiPickerPlugin } from 'vue-emoji-picker'

export default {
    components :{
        side_bar,
        Navigation,
        update_popup,
        Reacts,
        comments_section
    },
    data() {
        return {
            post:[],
            Visibe: false,
            Updater: false,
            post_id:null,
            title: "",
            description: "",
            id_post:"",
            selectedFile: "",
            loggedid:"",
            
        }
    },
    mounted() {
        this.getallposts()
        this.loggedid = sessionStorage.getItem('ID')
    },
    methods: {
        getallposts(){
            axios.get('http://localhost/ToTheTop/backend/Posts/GetAllPosts')
            .then(res=>{
                this.post = res.data
                this.post_id = res.data.id
            })
        },
        drop(id){
            const dropped_id = id
            this.post.forEach(element =>{
                if (element.id_post==dropped_id) {
                    this.Visibe = !this.Visibe
                }
            })
            
        },
        update_popup(id){
            this.Updater = !this.Updater
            this.post.forEach(element =>{
                if (element.id_post==id) {
                    this.title = element.title
                    this.description = element.description
                    this.id_post = id
                }
            })
        },
        modifiedPic(event) {
            this.selectedFile = event.target.files[0]
            console.log(this.selectedFile);
        },
        update_post(){
             let config = {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            };
            const data = {
                title: this.title,
                description: this.description,
                image: this.selectedFile,
                id_post:this.id_post
            };
            const formData = new FormData();
            Object.keys(data).forEach((key) => {
                formData.append(key, data[key]);
            });
            axios.post('http://localhost/ToTheTop/backend/Posts/UpdatePost',
                    formData
                ,config).then(res => console.log(res))
        },
    },
}
</script>

<style lang="scss" scoped>
    @import '../assets/styles/config';
    
    .container{
        @include flexRow(flex-start,space-around);
        width: 100%;
        height: 100%;
        padding: 90px;
        margin-top: 40px;
        position: relative;
        background-color: #F4F4F4;
    
    .posts_container{
        
        @include flexColumn(stretch,space-evenly);
        width: 55%;
        .post{
            background-color: $white; 
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;  
            margin-bottom: 30px;  
        }    
    .post_head{
            @include flexRow(center,space-between);
        }
            .post_more{
                position: relative;
                cursor: pointer;
                img{
                    width: 25px;
                }
                 .dropdown_more{
                    @include flexColumn(center,space-between);
                    box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
                    background-color:#F4F4F4;  
                    position: absolute;
                    border-radius: 5px;
                    right: 0px;
                    width: 130px;
                    height: 50px;
                    .dropped_item_update{
                        width:100%;
                        button{
                            width:100%;
                            border-radius: 5px;
                        }
                        button:hover{
                            background-color: #EAEAEA;
                        }
                    }
                    .dropped_item_delete{
                          width:100%;
                        button{
                            width:100%;
                            border-radius: 5px;
                        }
                        button:hover{
                            color: red;
                            background-color: #EAEAEA;
                        }
                    }

                }
            }
           
        .user_info{
            padding: 10px;
            @include flexRow(center,space-between);
            .profile_pic{
                width: 60px;
                height: 60px;
                img{
                    width: 100%;
                    height: 100%;
                    border-radius: 50%;
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
        @include flexRow(center,center);
        width: 100%;

    }
        .post_description{
            padding: 10px 30px 5px 30px;
            font-size: 16px;
        }

        .post_pic{
            width: 100%;
            padding: 5px;
            img{
                width: 100%;
            }
        }
        
        
        }
        @include tablet {
            width: 100%;
            .post_title{
                font-size: 16px;
            }
            .post_description{
                font-size: 14px;
                padding: 20px 10px 20px 10px;
            }
            
        }
        @include phone{
            padding: 90px 15px 70px 15px   ;
        }
        }
    
    .update_popup {
    @include flexColumn(center, center);
    background-color: rgba(0, 0, 0, 0.55);
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0%;
    z-index: 1;

    form {
        @include flexColumn(center, space-around);
        position: fixed;
        top: 22%;
        width: 40vw;
        height: 70vh;
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