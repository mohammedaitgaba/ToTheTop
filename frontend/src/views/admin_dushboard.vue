<template>
    <Navigation/>
      
    <div class="dushboard">
        <div class="heading">
         <h1> Welcome to Admin's dushboard</h1>
        </div> 
        <div class="container">
            <section class="statistics">
                <div class="users_counter">
                    <div class="flex flex-col gap-1 text-center items-center">
                        <img class="h-32 w-32 bg-white p-2 rounded-full shadow mb-4"
                            :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ ProfilePic"
                            alt="profile pic">
                        <p class="font-semibold"> ook </p>
                        <div class="text-sm leading-normal text-gray-400 flex justify-center items-center">
                            ooooo@gmail.com
                        </div>
                    </div>
                </div>
                <div class="users_counter">
                    <div class="title">
                        Number of users     
                    </div>
                    <div class="number">
                        45
                    </div>
                    <div class="more">
                        More info
                    </div>
                </div>
                <div class="users_counter">
                    <div class="title">
                        Number of Posts
                    </div>
                    <div class="number">
                        20
                    </div>
                </div>
                <div class="users_counter">
                    <div class="title">
                        Number of Comments
                    </div>
                    <div class="number">
                        45
                    </div>
                </div>
            </section>
        </div>
        
    </div>
</template>

<script>
    import Navigation from '@/components/Navigation.vue';
export default {
     components :{
        Navigation,
    },
    data() {
        return {
            admin:"",
        }
    },
    mounted() {
        this.checkadmin()
    },
    methods: {
        checkadmin(){
            this.admin = sessionStorage.getItem("name")
            if (this.admin != "Med gaba") {
                this.$router.push('/')
            }
            console.log(this.admin)
        }
    },
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/config';
    .dushboard{
            @include flexColumn(center, space-evenly);
            padding: 110px 50px 45px 50px;
            background-color: #F4F4F4; 
            // height: 100vh;
            .heading{
                margin: 20px 0 20px 0;
                width: 100% ;
                text-align: center;
                h1{
                    font-size: 28px;
                }
            }
            @include phone{
                padding: 80px 20px 45px 20px;

            }
        }
    .container{
        @include flexRow(center, space-evenly);
        width: 100%;
        .admin_holder{
            @include flexColumn(center, space-evenly);
            width: 25%;
            box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; 
            .admin_info{
                @include flexRow(center, space-evenly);
                width: 100%;
                background-color: $orange3;
                padding: 5px;
                .admin_pic{
                    img{
                        width: 60px;
                        height: 60px;
                        border-radius: 50%;
                    }
                }
                .admin_name{
                    font-weight: 600;
                    font-size:20px;
                }
            }

        }
        .statistics{
            @include flexRow(center, space-evenly);
            width: 100%;
        
            .users_counter{
                @include flexColumn(center, space-between);
                width: 30%;
                height: 40vh;
                background-color: $white;
                
                box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; 
                .title{
                    @include flexRow(center, space-evenly);
                    width: 100%;
                    height: 35%;
                    font-weight: 700;
                    box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; 
                }
                .number{
                    width: 100%;
                    padding-left: 20px;
                    font-size: 26px;
                }
                .more{
                    margin-bottom: 10px;
                    padding-bottom: 2px; 
                    position: relative;
                    cursor: pointer;
                }
                .more::before{
                    content:"";
                    position: absolute;
                    bottom: 0;
                    width: 0;
                    height: 3px;
                    border-radius: 10px;
                    background-color: $orange1;
                    transition: width 0.35s ease-out;
            }
                .more:hover::before{
                    width: 100%;

                }

            }
    }
        @include phone {
            @include flexColumn(center, space-between);
            .admin_holder{
                
                width: 100%;
                }

            .statistics{
                @include flexColumn(center, space-between);
                width: 100%;
                .users_counter{
                    width: 100%;
                    margin: 20px 0 20px 0;
                }
            }
        }
}

</style>