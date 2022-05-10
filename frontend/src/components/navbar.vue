<template>
    <div class="navbar">
        <div class="logo">
            <img src="../assets/images/logo/Group 16.png" alt="">
        </div>
        <div class="navlinks">
            <ul class="nav_items">
                <li><router-link to="/"><a class="nav_item" href="">Home</a></router-link></li>
                <li><router-link to=""><a class="nav_item" href="">Profile</a></router-link>  </li>
                <li><router-link to="/posts"><a class="nav_item" href="">Posts</a></router-link>  </li>
                <li><router-link to="/Messanger"><a class="nav_item" href="">Messanger</a> </router-link> </li>
            </ul>
        </div>
        <!-- <div class="auth">
            
            <ul class="nav_auth">
                </ul>
        </div>    -->
        <div class="auth">
            
            <ul class="nav_items">
                <li><router-link class="auth" to="/Login">Sign in </router-link>  </li>
                <!-- <li><a href="">logout</a> </li> -->
            </ul>
        </div>

        <div  @click="navSlide" class="menu" >
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
            
        </div>
    </div>
</template>

<style lang="scss" scoped>
@import '../assets/styles/config';
    .navbar{
        @include flexRow(center,space-around);
        background-color: $white ;
        position: fixed;
        z-index: 100;
        top: 0;
        left: 0;
        width: 100%;
        height: 60px;
        box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;
        .logo img {
            width: 150px;
        }
        .navlinks{
            width: 35%
        }
        .nav_items{
            @include flexRow(center,space-between);   
        a{
            text-decoration: none; 
            color: black;
        }
        li{
            list-style: none;
        }
        .nav_item{
            padding-bottom: 0.25rem;
            position: relative;
            font-size: 18px;
            font-weight: 500;
        }
        .nav_item::before{
            content:"";
            position: absolute;
            bottom: 0;
            width: 0;
            height: 3px;
            border-radius: 10px;
            background-color: $orange1;
            transition: width 0.35s ease-out;
        }
        .nav_item:hover::before{
         width: 60%;
}
        }
        .auth{
            @include button;
            a{
                color: $white;
            } 
            padding: 6px 10px;
        }

        .menu {
            margin: 8px;
            cursor: pointer;
            display:  none;

            div{
                background-color: #000000;
                width: 28px;
                height: 5px;
                margin:4px;
                border-radius: 10px;
                transition: all 0.3s ease-in;

            }
        }
    
    
    @include tablet{

        .nav_items{
            position: absolute;
            @include flexColumn(center,center);
            right: 0; 
            margin:0;
            top: 12vh;
            background-color:$white;
            height: 80vh;
            width: 80vw;
            transform: translateX(100%);
            transition: 0.5s ease-in;
            li{
                margin: 15px;
            }
        }
        .nav_item {
            z-index: 12;
        }

        .menu{
    display: block;
        }
        .nav-active{
            transform: translateX(0%) !important;           
        }
        .toggle .line1{
            transform: rotate(-45deg) translate(-4px,6px);
        }
        .toggle .line2{
            opacity: 0;
        }
        .toggle .line3{
            transform: rotate(45deg) translate(-6px,-9px);
        }
            }
            }
</style>

<script>
export default {
    methods: {

    }

        
    }

</script>