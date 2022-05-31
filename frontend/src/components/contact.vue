<template>
    <section class="contact_us">
        <form @submit.prevent="sendmsg">
            <div class="title">
                Send us a message
            </div>
            <div class="contact_inputs">
                <div >
                    <label for="">Full Name</label>
                    <input class="input" type="text" v-model="name"  required>
                </div>
                <div>
                    <label for="">Email</label>
                    <input class="input" type="email" v-model="email" required>
                </div>
                <div>
                    <label for="">Message</label>
                    <textarea class="input text" v-model="message" required ></textarea>
                </div>

               
            </div>
            <div >
                <button class="contact_send" type="submit" name="submit">Send</button>
            </div>
        </form>
    </section>
</template>
<script>
import axios from 'axios';
export default {
    
    data() {
        return {
            name:"",
            email:"",
            message:""
        }
    },
    methods: {
        sendmsg(){
            // console.log(this.fromstate);
            console.log();
            axios.post('http://localhost/ToTheTop/backend/Contact/contact_us',{
                name:this.name,
                email:this.email,
                message:this.message
            }).then(res => console.log(res))
            this.$swal(
                {
                title:'Message Deleted!',
                icon: 'success'
                }
            )
                this.name = ""
                this.email = ""
                this.message = ""
        }
    },
}
</script>
<style lang="scss" scoped>
    @import '../assets/styles/config';
    .contact_us{
       @include flexColumn(center,space-evenly);
        height: 86vh;
        form{
            @include flexColumn(center,space-evenly);
            background-color: #fab861;
            opacity: 0.8;
            width: 45%;
            height: 80%;
            border-radius: 10px;
            // box-shadow: rgb(0 0 0 / 3%) 5.4px 5.4px 3.2px;
            box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; 

            }
        .contact_inputs{
            width: 80%;
        }
        .title{
            font-size: 20px;
            font-weight: 600;
        }
        .input{
            padding:8px;
            display:block;
            border:none;
            background-color:$white ;
            border-bottom:1px solid $orange1;
            width:100%;
            margin-bottom: 10px;
            font-size: 16px;
        }
        .input:focus{
            outline: none;
        }
        .text{
              resize: none;
        }
        .contact_send{
            @include button;
        }
        .contact_send:hover{
            background-color: $secondary;
            //  background-color: $orange1;
            color: black;
        }
    
    @include phone{
        form{
            width: 90%;
        }
    }
    }
</style>