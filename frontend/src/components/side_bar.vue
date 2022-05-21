<template>
    <section class="side_bar">
        <div class="helpers">
            <div class="add" @click="show"><img src="../assets/images/icons/add.png" alt=""></div>
            <div class="add"><img src="../assets/images/icons/home.png" alt=""></div>
        </div>
        <div class="search">
            <input type="search" placeholder="search">
            <img src="../assets/images/icons/dashicons_search.png" alt="">
        </div>

        <div class="friends_holder">
                <div class="friend" v-for="elements in friends">
                    <div class="friendinfo">
                        <div class="friendpic"><img src="../assets/images/ProfilePic/dog-dating-app-2.jpg" alt=""></div>
                        <div class="friendname">
                            <label> {{elements.full_name}} </label>
                        </div>
                    </div>
                    <div class="add_friend">
                        <img src="../assets/images/icons/addFriend.png" alt="">
                    </div>
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
        <form enctype="multipart/form-data" @submit="addPost">
            <div class="title">
                Add Post
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
                <input type="file" id="image" name="image" hidden @change="selectedPic">
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
            description: "",
            selectedFile: "",
            id:"",

            friends:[],
        }
    },
    mounted() {
      this.checkregistration();
      this.RandomFriends();
    },
    methods: {
        show(){
            this.Visible = !this.Visible
        },
        selectedPic(event) {
            this.selectedFile = event.target.files[0]

            console.log(this.selectedFile);
        },
        addPost() {
            // const img =new FormData();
            let config = {
                headers: {
                    "Content-Type": "multipart/form-data",
                },
            };
            const data = {
                title: this.title,
                description: this.description,
                image: this.selectedFile,
                id:this.id
            };
            const formData = new FormData();
            Object.keys(data).forEach((key) => {
                formData.append(key, data[key]);
            });
            axios.post('http://localhost/ToTheTop/backend/Posts/AddNewPosts',
                    formData
                ,config).then(res => console.log(res))
            
        },
        checkregistration(){
            if(sessionStorage.getItem('ID')){
                this.id = sessionStorage.getItem('ID')
            }
        },
        RandomFriends(){
            axios.get('http://localhost/ToTheTop/backend/User/GetRandUsers')
            .then(res => {
                this.friends = res.data
                console.log(this.friends);
            })
        }
    },

}
</script>
<style lang="scss" scooped>
@import '../assets/styles/config';

.side_bar {
    @include flexColumn(center, space-between);
    position: sticky;
    background-color: $white;
    width: 30%;
    height: 65vh;
    --header-height: 101px;
    top: calc(var(--header-height) + 27px);
    padding-bottom: 12px;
    margin-left: 15px;
    border-radius: 8px;

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
                img:hover{
                    background-color: $orange3;
                    border-radius: 50%;
                }
            }
        }
        .friend:hover{
        background-color: #F4F4F4;
        }
        }

    @include tablet {
        position: fixed;
        top: 54px;
        width: 100%;
        height: 57px;
        border-radius: 0;
        @include flexRow(center, center);
        flex-direction: row-reverse;
        background-color: #F4F4F4;

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

// .add_popup-enter-active,
// .add_popup-leave-active{
//     transition: .4s ease all;

// }

// .add_popup-enter-from{
//     transform: translate(-50%, -50%);
//     }

// .add_popup{
//     transform: translate(0%,0%);

// }
</style>