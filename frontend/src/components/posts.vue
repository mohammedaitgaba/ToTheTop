<template> 
    <div class="user_info" >
        <div class="post_head">
            <div class="profile_pic" v-if="posts_data.id_admin != 1">
                <img :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ posts_data.user_photo" alt="">
            </div>
            <div class="profile_pic" v-if="posts_data.id_admin == 1">
                <img :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ posts_data.pic" alt="">
            </div>
            <div class="username_time">
                <div>
                    <label class="username" v-if="posts_data.id_admin != 1"> {{posts_data.full_name}} </label>
                    <label class="username" v-if="posts_data.id_admin == 1"> {{posts_data.name}} </label>
                    <label class="username_admin" v-if="posts_data.id_admin == 1"> admin </label>
                </div>
                <div class="time ">
                    <label > {{posts_data.created_at}}</label>
                    
                </div>
            </div>
        </div>
        <div class="post_more"  @click="drop()" v-if="posts_data.id_maker == loggedid || admin ==1 "  >
            <img src="../assets/images/icons/ep_more-filled.png" alt="">
            <div class="dropdown_more" v-show="Visibe" >
                <!-- <input v-model="elements.id_post"> -->
                <div class="dropped_item_update">
                    <button @click="update_popup">Update</button>
                </div>
                <div class="dropped_item_delete">
                    <button type="button" @click="deletePost(posts_data.id_post)">Delete </button>
                </div>

            </div>
        </div>
    </div>
    <div class="post_title">
        {{posts_data.title}}
    </div>
    <div class="post_description">
        {{posts_data.description}}
    </div>
    <div class="post_pic">
        <img alt="" :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ posts_data.photo" >
    </div>
            <Reacts :post_id="posts_data.id_post"/>
            <comments_section :post_id="posts_data.id_post" />
            <update_post :show_data="posts_data" :displayed="showPop" @update_popup="update_popup" /> 
</template>
<script>
import axios from 'axios';
import Reacts from '@/components/Reacts.vue';
import comments_section from '@/components/comments_section.vue';
import update_post from '@/components/update_post.vue';
export default {
    props:{
        posts_data:{
            type:Object
        }
    },
    components:{
        Reacts,
        comments_section,
        update_post
    },
    data() {
        return {
            loggedid:"",
            Visibe: false,
            showPop:false,
            admin:""

        }
    },
    mounted() {
        this.loggedid = sessionStorage.getItem('ID')
        this.admin = sessionStorage.getItem('id_admin')
        // console.log(this.posts_data.created_at.diffForHumans());
    },
    methods: {
        drop(){
            this.Visibe = !this.Visibe
        },
        update_popup(){
            this.showPop = !this.showPop
        },
        deletePost(id_post){

            this.$swal(
                {
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }
            ).then((result) => {
            if (result.isConfirmed){
                axios.post('http://localhost/ToTheTop/backend/Posts/DeletPost',{
                id_post
                }).then(res=>console.log(res))
                this.$swal(
                {
                title:'Post Deleted!',
                icon: 'success'
                }
            ).then((result) => {
                if (result.isConfirmed) {
                    this.$router.go('/posts')
                }})
            }
            })

           
        }
    },
}
</script>
<style lang="scss" scoped>
    @import '../assets/styles/config';

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
                    @include flexColumn(center,space-around);
                    box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
                    background-color:#F4F4F4;  
                    position: absolute;
                    border-radius: 5px;
                    right: 0px;
                    width: 150px;
                    height: 80px;
                    .dropped_item_update{
                            @include flexColumn(center,space-around);
                            width:100%;
                            height: 100%;
                        button{
                            width:100%;
                            height: 100%;
                        }
                        button:hover{
                            background-color: $orange2;
                        }
                    }
                    .dropped_item_delete{
                        @include flexColumn(center,space-around);
                        width:100%;
                        height: 100%;
                        button{
                            width:100%;
                            height: 100%;
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
                .username_admin{
                    margin-left: 10px;
                    background-color: #ffc267;
                    border-radius: 20px;
                    padding: 5px;
                    font-size: 13px;
                }
            }
        }
        .post_title{
        @include flexRow(center,center);
        font-size: 20px;
        width: 100%;
        font-weight: 700;

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
                max-height: 400px;
            }
        }



</style>