<template>
    <div class="navbar">
        <div class="logo">
            <img src="../assets/images/logo/Group 16.png" alt="">
        </div>
        <div class="navlinks">

            <ul class="nav_items">
                <li><a class="nav_item" href="">home</a></li>
                <li><a class="nav_item" href="">Profile</a> </li>
                <li><a class="nav_item" href="">messanger</a> </li>
            </ul>
        </div>
        <div class="auth">

            <ul class="nav_items">
                <li><a href="">Sign in </a> </li>
                <!-- <li><a href="">Logout</a></li> -->
            </ul>
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
            width: 25%
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
            font-weight: 600;
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
         width: 100%;
}
        }
        .auth{
            @include button;
            a{
                color: $white;
            } 
            padding: 6px 10px;
        }
    
    @include tablet{
        .navlinks{
            display: none;
        }
        .auth{
            display: none;
        }
    }
    
    }
</style>