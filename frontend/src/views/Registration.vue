<template>
    <background>
        <section class="registration_container">
            <div class="title">
                Welcome to the comunity of success
            </div>
            <form v-on:submit.prevent="add_user" class="registration">

                <router-link to="/" class="back_home">
                    <img src="../assets/images/icons/bx_arrow-back.png" alt="">Home
                </router-link>

                <div class="form_title">
                    Join Us Now
                </div>
                <div class="inputs">
                    <label for="">Full name</label>
                    <input v-model="form.full_name" type="text" placeholder="Your name" name="fullname" required>
                </div>

                <div class="inputs">
                    <label for="">Email</label>
                    <input v-model="form.email" type="email" placeholder="Your Email" name="email" required>
                    <span> {{email_dublicated}} </span>
                </div>

                <div class="inputs">
                    <label for="">Password</label>
                    <input v-model="form.password" type="Password" placeholder="Password" name="Password" minlength="8" required>
                </div>

                <div class="inputs">
                    <label for="">Confirme password</label>
                    <input v-model="form.passwordConfirmation" type="Password" placeholder="rentre password" name="Confirmation" required>
                    <span> {{errormessage}} </span>
                    
                </div>

                <button type="submit" name="submit" class="creat_acc">Create</button>

                <router-link to="/Login" class="tosign_in">Already have an account</router-link>

            </form>
        </section>
    </background>
</template>

<script>
import background from '@/components/background.vue';
import axios from 'axios';
const formState = {
    full_name: "",
    email: "",
    password: "",
    passwordConfirmation:"",

}
export default {
    components: {
        background
    },
    data() {
        return {
            form: formState,
            errormessage:"",
            email_dublicated:""
        }
    },
    mounted() {
        this.checkregistration()
        this.checkauth()
    },
    methods: {
        add_user() {
            if (this.form.password == this.form.passwordConfirmation) {
                
                axios.post('http://localhost/ToTheTop/backend/User/add_user', {
                    form: this.form
                }).then(res => {console.log(res)
                    if (res == true) {
                        
                        this.$swal(
                        {
                        title:'Your account has been created!',
                        icon: 'success'
                        }
                        )
                        this.$router.push("/Login")
                    }else{
                        this.email_dublicated = "An account with this info already exists"
                        console.log(this.email_dublicated)
                    }
                })
            } else {
                this.errormessage = "Please confirm your password"
            }
            

        },
        checkregistration(){
            if(sessionStorage.getItem('ID')){
                this.$router.push('/')
            }
        },
        checkauth(){
            if (sessionStorage.getItem('ID')) {
                this.$router.push('/')
            }
        }
    },
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/config';

.registration_container {
    width: 100%;
    height: 100%;
    @include flexColumn(center, flex-start);

    .title {
        font-size: 32px;
        padding: 30px;
        color: $white;
    }

    .registration {
        position: relative;
        width: 400px;
        border-radius: 15px;
        padding: 10px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        background-color: $white;
        @include flexColumn(center, center);

        .back_home {
            @include flexRow(center, center);
            position: absolute;
            top: 6px;
            left: 8px;
            text-decoration: none;
            color: black;

            img {
                width: 25px;
            }
        }

        .back_home:hover {
            color: $orange1;
        }

        .form_title {
            font-size: 20px;
        }

        .inputs {
            @include flexColumn(flex-start, center);
            width: 85%;
            padding: 7px;

            input {
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
                font-size: 14px;
            }
        }

        .creat_acc {
            margin: 10px;
            @include button;
            padding: 8px 25px;
        }

        .tosign_in {
            @include flexRow(flex-start, flex-start);
            width: 80%;
            color: black;
        }

        .tosign_in::before {
            content: "";
            position: absolute;
            bottom: 9px;
            width: 0;
            height: 3px;
            border-radius: 10px;
            background-color: $orange2;
            transition: width 0.35s ease-out;
        }

        .tosign_in:hover::before {
            width: 20%;
        }

        .tosign_in:hover {
            color: $orange2;

        }
    }

    @include phone {
        .title {
            font-size: 24px;
            text-align: center;
            padding: 5px;
        }

        .registration {
            width: 90%;

            .creat_acc {
                padding: 6px 20px;
            }

            .inputs {
                font-size: 14px;

                input {
                    font-size: 14px;
                }
            }
        }
    }
}
</style>