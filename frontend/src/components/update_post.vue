<template>
     <div class="update_popup" v-show="displayed">
        <form enctype="multipart/form-data" @submit.prevent="update_post(show_data.photo)">
            <div class="title">
                Update Post
            </div>
            <div class="post_title">
                <label> Post title </label>
                <input type="text" placeholder="Title" v-model="show_data.title">
            </div>
            <div class="post_title">
                <label> Post description </label>
                <textarea placeholder="description" v-model="show_data.description"></textarea>
            </div>
            <div class="add_img">
                <span> Post photo </span>
                <label for="pic"> Choose picture </label>
                <input type="file" id="pic" name="image" hidden @change="AddedPic">
            </div>
            <div class="post_submit">
                <button class="submit" type="submit" >Update</button>
                <button class="cancel" type="button" @click="hide_pop">cancel</button>
            </div>
        </form>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    emits:['displayed'],
    props:{
        show_data: {
            type:Object
        },
        displayed:{
            type:Boolean
        }
    },
    data() {
        return {
            selectedImg:"",
            // NewTitle:this.show_data.title,
            // NewDesc:this.show_data.description,
            // id_post:this.show_data.id_post,
        }
    },
    created() {
    },
    methods: {
        
    AddedPic(event) {
            this.selectedImg = event.target.files[0]
            console.log(this.selectedImg);
        },

    update_post(old_pic){
        let config = {
        headers: {
            "Content-Type": "multipart/form-data",
        },
        };
        const data = {
            title:this.show_data.title,
            description:this.show_data.description,
            images:this.selectedImg,
            old_image:old_pic,
            id_post:this.show_data.id_post
        };
        const formData = new FormData();
        Object.keys(data).forEach((key) => {
            formData.append(key, data[key]);
        });
        axios.post('http://localhost/ToTheTop/backend/Posts/UpdatePost',
                formData
            ,config).then(res => {console.log(res)
            if (res.data== 'ok') {
                        this.$swal(
                        {
                        title:'Succesfully!',
                        text:'Your post has been added.',
                        icon: 'success'
                        }
                    )
                    this.$router.go('/posts')
                    }
            })
    },
        hide_pop(){
            this.$emit("update_popup");
        }

    },
}
</script>
<style lang="scss" scoped>
@import '../assets/styles/config';
.update_popup {
    @include flexColumn(center, center);
    background-color: rgba(0, 0, 0, 0.55);
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0%;
    left: 0;
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
                width: 100%;
                border: none;
                border-bottom: 1px solid $orange2;
                height: 40px;
                padding: 10px;
                font-size: 18px;
            }
            input:focus{
                outline: none;
            }

            textarea {
                border: none;
                border-bottom: 1px solid $orange2;
                width: 100%;
                resize: none;
                height: 70px;
                font-size: 18px;
                padding: 10px;
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
            .submit:hover{
                 background-color: $orange1;
            }

            .cancel {
                @include button;
                padding: 8px 20px;
                background-color: black;
            }
            .cancel:hover{
                opacity: 0.8;
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