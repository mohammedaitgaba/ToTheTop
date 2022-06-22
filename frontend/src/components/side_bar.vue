<template>
    <section class="side_bar">
        <div class="sidbar_head">
            <div class="helpers">
                <div class="add" @click="show"><img src="../assets/images/icons/add.png" alt=""></div>
                <div class="add" @click="reload"><img src="../assets/images/icons/home.png" alt=""></div>
            </div>
            <div class="search">
                <input type="search" placeholder="search" v-model="search">
            </div>
            <div class="search">
                People You May Know
            </div>
        </div>
        <div for=""> </div>
        <div class="friends_holder" v-if="user">
                <div class="friend" v-for="elements in filterUsers">
                    <div class="friendinfo">
                        <div class="friendpic">
                            <img :src="'http://localhost/ToTheTop/backend/public/imgUploaded/' + elements.user_photo" alt="">
                        </div>
                        <div class="friendname">
                            <label> {{elements.full_name}} </label>
                        </div>
                    </div>
                    
                    <form class="add_friend" @submit.prevent="add_friend(elements.id_user)">
                    <!-- v-if="elements.id_user != added" -->
                        <button type="submit" >
                            <img src="../assets/images/icons/addFriend.png" alt="">
                        </button>
                    </form>
                </div>
                <div class="friend" v-if="filterUsers.length == 0 ">
                    <label for="">Oups user not found</label>
                </div>
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
        <form enctype="multipart/form-data" @submit.prevent="addPost">
            <div class="title">
                Add Post
            </div>
            <div class="post_title">
                <label> Post title </label>
                <input type="text" placeholder="Title" v-model="title" required >
            </div>
            <div class="post_title">
                <label> Post description </label>
                <textarea placeholder="description" v-model="description" required ></textarea>
            </div>
            <div class="add_img">
                <span> Post photo </span>
                <label for="image"> Choose picture </label>
                <input type="file" id="image" name="image" hidden @change="AddedPic">
            </div>
            <div class="post_submit">
                <button class="submit" type="submit" >Add</button>
                <button class="cancel" type="button" @click="show">cancel</button>
            </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios';
const postinfo = {

}
export default {

    data() {
        return {
            Visible: false,
            title: "",
            description:"",
            selectedImg:"",
            id:"",
            friends:[],
            added:[],
            user:"",
            success:"",
            search:"",
        }
    },
    mounted() {
      this.checkregistration();
      this.RandomFriends();
      this.user = sessionStorage.getItem('ID')
    },
    computed:{
        filterUsers:function(){
            return this.friends.filter((elements)=>{
                return elements.full_name.match(this.search)
            })
        }
    },
    methods: {
        show(){
            this.Visible = !this.Visible
        },
        AddedPic(event) {
            this.selectedImg = event.target.files[0]
        },
        addPost() {
           let config = {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            };
            const data = {
                title:this.title,
                description:this.description,
                image:this.selectedImg,
                id:this.id,
                id_admin:sessionStorage.getItem('id_admin')
            };
            const asformData = new FormData();
            Object.keys(data).forEach((key) => {
                asformData.append(key, data[key]);
            });
            axios.post('http://localhost/ToTheTop/backend/Posts/AddNewPosts',
                    asformData
                ,config).then(res => { console.log(res); this.success = res.data
                    if (this.success == 'ok') {
                        this.$swal(
                        {
                        title:'Succesfully!',
                        text:'Your post has been added.',
                        icon: 'success'
                        }
                    )
                    this.$router.go('/posts')
                    }
                }
                
                )
                
            
        },
        checkregistration(){
            if(sessionStorage.getItem('ID')){
                this.id = sessionStorage.getItem('ID')
            }
        },
        RandomFriends(){
            axios.post('http://localhost/ToTheTop/backend/User/GetRandUsers',{
                id : sessionStorage.getItem('ID')
            }
            )
            .then(res => {
                this.friends = res.data
                console.log(this.friends);
            })
        },
        add_friend(id){
            axios.post('http://localhost/ToTheTop/backend/User/AddFreind',{
                id_sender:sessionStorage.getItem('ID'),
                id_reciver:id
            }).then(res=>{
                this.added = res.data
                this.RandomFriends()
            })
        },

        reload(){
            this.$router.go('/posts')
        }

    },

}
</script>
<style lang="scss" scooped>
@import '../assets/styles/config';
        
.side_bar {
    @include flexColumn(center, space-between);
    position: sticky;
    --header-height: 101px;
    top: calc(var(--header-height) + 27px);
    background-color: $white;
    width: 30%;
    z-index: 20;
    height: 70vh;
    padding-bottom: 12px;
    border-radius: 8px;

    ::-webkit-scrollbar{
        width: 10px;
        }
    ::-webkit-scrollbar-thumb{
        background: linear-gradient(transparent,$orange2);
        border-radius: 5px;
        }

    .sidbar_head{
        @include flexColumn(center, center);
        width: 100%;
        .search{
            font-weight: 600
        }
    }
    .helpers {
        @include flexRow(center, center);

        .add {
            padding: 10px;
            cursor: pointer;

            img {
                width: 30px;
            }
        }
    }

    .search {
        @include flexRow(center, center);
        position: relative;
        width: 80%;
        font-size: 15px;

        input {
                width: 100%;
                height: 33px;
                border: 1px solid $orange2;
                padding: 10px;
                border-radius: 20px;
                
            }
            input:focus{
                outline: none;
            }

        img {
            position: absolute;
            right: 3px;
            width: 25px;
        }
    }

    .posts_footer {
        @include flexColumn(stretch, space-evenly);
        padding: 10px;
    }

    .copyriths {
        font-size: 10px;
        padding: 10px;
        @include flexRow(center, center);

        img {
            width: 15px;
        }
    }

    .social {

        @include flexRow(center, space-evenly);

        img {
            width: 20px;
            cursor: pointer;
        }
    }
    .friends_holder{

        @include flexColumn(center, space-between);
        width: 90%;
        margin-top: 20px;
        overflow-y: scroll;

       

        .friend {
            @include flexRow(center, space-between);
            padding: 5px;
            width: 100%;

            .friendinfo {
                @include flexRow(center, center);

                .friendpic {
                    @include flexRow(center, center);
                    width: 40px;
                    height: 40px;

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
            .add_friend{
                cursor: pointer;
                img{
                    transition: 0.4s;
                }
                img:hover{
                    width: 30px;
                    background-color: $orange3;
                    border-radius: 50%;
                }
            }
        }
        .friend:hover{
        background-color: #F4F4F4;
        cursor: pointer;
        }
        }

    @include tablet {
        @include flexColumn(center, center);
        position: fixed;
        top: 60px;
        width: 100%;
        height: 130px;
        border-radius: 0;
        background-color: #F4F4F4;
        box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; 

        ::-webkit-scrollbar{
        height: 5px;
        }
        ::-webkit-scrollbar-thumb{
        background: linear-gradient(transparent,$orange2);
        border-radius: 5px;
        }
        .sidbar_head{
            @include flexRow(center, center);
            flex-direction: row-reverse;
        }
        .friends_holder{
            @include flexRow(center, flex-start);
            overflow-y: hidden;
            overflow-x: scroll;

            margin: 0;
            .friend{
                @include flexRow(center, center);
                min-width: 100px;
                min-height: 80px;
                padding: 0 10px 0 10px;
                .friendinfo{
                    @include flexColumn(center, center);
                }
                .add_friend{
                    min-width: 50px;
                }
            }
        }
        .posts_footer {
            display: none;
        }

        .search {
            input {
                width: 90%;
            }

            img {
                right: 36px;
            }
        }
    }

    @include phone {
        .search {
            img {
                right: 20px;
            }
        }

        .helpers {
            .add {
                img {

                    width: 25px;
                }
            }
        }
    }

}

.add_popup {
    @include flexColumn(center, center);
    background-color: rgba(0, 0, 0, 0.55);
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0%;
    z-index: 100;

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
                padding:8px;
                display:block;
                border:none;
                background-color:$white ;
                border-bottom:1px solid $orange1;
                width:100%;
                margin-bottom: 10px;
                font-size: 16px;
            }
            input:focus{
            outline: none;
            
            }

            textarea {
                width: 100%;
                resize: none;
                height: 70px;
                font-size: 18px;
                padding: 10px;
                // padding:8px;
                display:block;
                border:none;
                background-color:$white ;
                border-bottom:1px solid $orange1;
                width:100%;
                margin-bottom: 10px;
                font-size: 16px;
            }
            textarea:focus{
                outline: none;
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