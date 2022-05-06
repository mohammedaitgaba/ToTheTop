<template>
    <section class="registration_container">
        <div class="title">
            Good to see you again
        </div>
        <form action="" class="registration">
            <div class="back_home">
                <a href="">
                    <img src="../assets/images/icons/ri_arrow-go-back-fill.png" alt="">
                    <label >Home</label> 
                </a>
            </div>
            <div class="form_title">
                Join Us Now
            </div>
            <div class="inputs">
                <label for="">Email</label>
                <input type="text" placeholder="Your Email" name="email">
            </div> 
            
            <div class="inputs">
                <label for="">Password</label>
                <input type="Password" placeholder="Password" name="Password">
            </div> 


            <button type="submit" name="submit" class="creat_acc">Sign in</button>
            <div class="tosign_in">
                <a href="">Don’t have an account</a>
            </div>
        </form>
    </section>
</template>

<script>

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
        }

        .registration{
            position: relative;
            width: 400px;
            border-radius: 15px;
            padding: 10px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            @include flexColumn(center,center);
            .back_home
                a{
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
            
            .back_home a :hover{
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
            }
            .creat_acc{
                margin: 10px;
                @include button
            }
            .tosign_in{
                @include flexRow(flex-start,flex-start);
                width: 80%;
                a{
                    color: black;
                }
            } 
        }
    }
</style>