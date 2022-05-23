<template>
    <header :class="{ 'scrolled-nav':scrollPosition }">
        <nav>
            <div class="branding">
                <img src="../assets/images/logo/Group 16.png" alt="logo to the top">
            </div>
                <ul v-show ="!mobile"  class="navigation">
                    <li><router-link to="/"><a class="nav_item" href="">Home</a></router-link></li>
                    <li><router-link to=""><a class="nav_item" href="">Profile</a></router-link>  </li>
                    <li><router-link to="/posts"><a class="nav_item" href="">Posts</a></router-link>  </li>
                    <li><router-link to="/Messanger"><a class="nav_item" href="">Messanger</a> </router-link> </li>
                </ul>
    
            <div class="auth" @click="destroyId" v-show ="!mobile" v-if="id">
                <li ><router-link class="auth" to="/Login">logout </router-link>  </li>
            </div>
            <div class="auth" v-show ="!mobile" v-if="!id">
                <li ><router-link class="auth" to="/Login">Sign in </router-link>  </li>
            </div>

            <div  @click="toggleMobileNav" v-show="mobile" class="menu" :class="{'icon-active':mobileNav} " >
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <transition name="mobile_nav">
            <ul v-show ="mobileNav" class="dropdown-nav">
                <li><router-link to="/"><a class="nav_item" href="">Home</a></router-link></li>
                <li><router-link to=""><a class="nav_item" href="">Profile</a></router-link>  </li>
                <li><router-link to="/posts"><a class="nav_item" href="">Posts</a></router-link>  </li>
                <li><router-link to="/Messanger"><a class="nav_item" href="">Messanger</a> </router-link> </li>
                <li v-if="!id" ><router-link class="auth" to="/Login">Sign in </router-link>  </li>
                <li v-if="id" @click="destroyId"><router-link class="auth" to="/Login">logout</router-link>  </li>
            </ul>
            </transition>
        </nav>
    </header>
</template>
<script>
export default {
    name: "navigation",
    data(){
    return{
        scrollPosition: null,
        mobile: null,
        mobileNav: null,
        windowwidth: null,
        id:""
  };
  
},
    // created() {
        
    // },
    beforeMount(){
        window.addEventListener("resize", this.checkScreen);
        this.checkScreen();
    },
    mounted() {
            // console.log(sessionStorage.getItem('ID'));
        this.checkregistration()

    },
    methods: {
        toggleMobileNav(){
            this.mobileNav = !this.mobileNav
        },
        checkScreen (){
            this.windowwidth=window.innerWidth
            if (this.windowwidth <= 750){
            this.mobile=true;
            return;
            }
            this.mobile=false;
            this. mobileNav=false;
            return;
        },
        checkregistration(){
            if(sessionStorage.getItem('ID')){
                this.id = sessionStorage.getItem('ID')
            }
        },
        destroyId(){
            sessionStorage.removeItem('ID');
        }

    },
}
</script>
<style lang="scss" scoped>
    @import '../assets/styles/config';


header{
    @include flexRow(center,space-around);
    background-color: $white ;
    position: fixed;
    z-index: 100;
    top: 0;
    left: 0;
    width: 100%;
    height: 60px;
    box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px;
    transition: 0.5s ease all;
}
.branding img {
            width: 150px;
        }
nav{
    @include flexRow(center,space-between);
    width: 90%;
    transition: 0.5s ease all;
    ul{
         @include flexRow(center,space-between);
            width: 35%;
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
            transition: 0.5s ease all;
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
            color: $white;
            padding: 8px 10px;
            li{
                a{
                    text-decoration: none;
                }
                list-style: none;
            }
        }
    .menu {
            margin: 8px;
            cursor: pointer;
            div{
                background-color: #000000;
                width: 28px;
                height: 5px;
                margin:4px;
                border-radius: 10px;
                transition: all 0.3s ease-in;

            }

        }
        .icon-active{
            transform: rotate(180deg);
            .line1{
            transform: rotate(-45deg) translate(-4px,6px);
        }
            .line2{
            opacity: 0;
        }
            .line3{
            transform: rotate(45deg) translate(-6px,-9px);
        }
        }
    .dropdown-nav{
        @include flexColumn(center,space-evenly);
        position:fixed;
        width: 100%;
        max-width: 350px;
        height: 70%;
        background-color: $white;
        top: 8vh;
        right: 0;
    }
    .mobile_nav-enter-active,
    .mobile_nav-leave-active{
    transition: .4s ease all;
    }
    .mobile_nav-enter-from{
        transform: translateX(250px);
        }
    
    .mobile_nav-enter-to {
        transform: translateX(0);
    }
    
    
}
</style>