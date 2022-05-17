<template>
    <section class="contact_us">
        <form action="">
            <div class="title">
                Send us a message
            </div>
            <div class="contact_inputs">
                <div >
                    <label for="">Full Name</label>
                    <input class="input" type="text" name="fullname">
                </div>
                <div>
                    <label for="">Email</label>
                    <input class="input" type="email" name="email">
                </div>
                <div>
                    <label for="">Message</label>
                    <textarea class="input text" name="message" id="" ></textarea>
                </div>

               
            </div>
            <div >
                <button class="contact_send" type="submit" name="submit">Send</button>
            </div>
        </form>
    </section>
</template>
<style lang="scss" scoped>
    @import '../assets/styles/config';
    .contact_us{
       @include flexColumn(center,space-evenly);
        height: 86vh;
        form{
            @include flexColumn(center,space-evenly);
            background-color: $secondary;
            opacity: 0.8;
            width: 45%;
            height: 80%;
            border-radius: 10px;
            box-shadow: rgb(0 0 0 / 3%) 5.4px 5.4px 3.2px;        
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
            background-color:$secondary ;
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
    
    @include phone{
        form{
            width: 90%;
        }
    }
    }
</style>