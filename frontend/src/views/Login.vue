<template>
    <background>
    <section class="registration_container">
        <div class="title">
            Good to see you again
        </div>
        <form action="" @submit.prevent="checkUser" class="registration">
            <router-link to="/" class="back_home">
                <img src="../assets/images/icons/bx_arrow-back.png" alt="">Home
            </router-link>

            <div class="form_title">
                Login
            </div>
            <div class="inputs">
                <label for="">Email </label>
                <input type="text" placeholder="Your Email" v-model="email">
                <span for=""> {{message2}} </span>
            </div> 
            
            <div class="inputs">
                <label for="">Password</label>
                <input type="Password" placeholder="Password" v-model="password" >
                <span for=""> {{message}} </span>
            </div> 
            <button type="submit" name="submit" class="creat_acc">Sign in</button>

            <router-link to="/Registration" class="tosign_in">Don’t have an account</router-link>

        </form>
    </section>
    </background>

</template>

<script>
import background from '@/components/background.vue';
import axios from 'axios';
export default {
    components :{
        background
    },
    data() {
        return {
            email:"",
            password:"",
            user:[],
            message:"",
            message2:""
        }
    },
    mounted() {
        this.checkauth()
    },
    methods:{
        checkUser(){
            let password = this.password.slice(0,6)
            if (password == "admin_") {
                axios.post('http://localhost/ToTheTop/backend/Admin/check_admin',{
                    email:this.email,
                    password:this.password
                }).then((res) => { 
                    this.message=res.data.message1
                    this.message2=res.data.message2
                    if (res.data.name) {
                        sessionStorage.setItem('name',res.data.name)
                        sessionStorage.setItem('id_admin',res.data.id)
                        console.log(sessionStorage.getItem('id_admin'));
                        this.$router.push("admin_dushboard")
                    }
                })
            }else{
                axios.post('http://localhost/ToTheTop/backend/User/check_user',{
                    email:this.email,
                    password:this.password
                }).then((res) => { 
                    this.message=res.data.message1
                    this.message2=res.data.message2
                    console.log(this.message)
                    sessionStorage.setItem('ID',res.data.data.id_user.toString())
                    this.$router.push("/")
                })
            }
        },
        checkauth(){
            if (sessionStorage.getItem('ID')){
                // this.$router.push('/')
            }else{
                this.$router.push('/Login')
            }
        }
    }
}
</script>

<style lang="scss" scoped>
    @import '../assets/styles/config';
    .registration_container{
        width: 100%;
        height: 100%;
        @include flexColumn(center,center);
        .title{
            font-size: 32px;
            padding: 30px;
            color: $white;
        }

        .registration{
            position: relative;
            width: 400px;
            border-radius: 15px;
            padding: 10px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            background-color: $white;
            @include flexColumn(center,center);
            .back_home{
                @include flexRow(center,center);
                position: absolute;
                top: 6px;
                left: 8px;
                text-decoration: none;
                color: black;
                img{
                    width: 25px;
                }
            }
            .back_home:hover{
                color: $orange1;
            }
            .form_title{
                font-size: 20px;
            }
            .inputs{
                @include flexColumn(flex-start,center);
                width: 85%;
                padding: 10px;
                input{
                    width: 100%;
                    height: 40px;
                    padding: 10px;
                    margin-top: 5px;
                    font-size: 16px;
                    border: 0.8px solid $orange2;
                    border-radius: 7px;
                }
                span{
                    color: red;
                }
            }
            .creat_acc{
                margin: 10px;
                @include button
            }
            .tosign_in{
                @include flexRow(flex-start,flex-start);
                width: 80%;
                color: black;

            } 
        }
        @include phone{
            .title{
                font-size: 24px;
                text-align: center;
            }
            .registration{
                width: 90%;
                .creat_acc{
                    padding: 6px 20px;
                }
            }
        }
    }
</style>