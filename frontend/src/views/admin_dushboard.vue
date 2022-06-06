<template>
    <Navigation/>
      
    <div class="dushboard">
        <div class="heading">
         <h1> Welcome to Admin's dushboard</h1>
        </div> 
        <div class="container">
            <div class="admin">
                <div class="flex flex-col gap-1 text-center items-center">
                    <p class="font-semibold"> {{info_admin.name}} </p>
                    <img class="h-32 w-32 bg-[#F9C784] p-2 rounded-full shadow mb-4"
                        :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ info_admin.photo"
                        alt="profile pic">
                    <div class="text-sm leading-normal text-gray-400 flex justify-center items-center">
                        {{info_admin.email}}
                    </div>
                    <p class="font-semibold"> {{info_admin.CIN}} </p>
                </div>
            </div>
            <section class="statistics_holder">
                <div class="statistics">
                    <div class="users_counter">
                        <div class="title">
                            <img src="../assets/images/icons/userss.png" alt="">
                            users :    
                            <div class="number">
                                {{users_num}}
                            </div>
                        </div>
                    </div>
                    <div class="users_counter">
                        <div class="title">
                            <img src="../assets/images/icons/posts.png" alt="">
                            Posts :
                            <div class="number">
                                {{posts_num}}
                            </div>
                        </div>
                    </div>
                    <div class="users_counter">
                        <div class="title">
                            <img src="../assets/images/icons/commentss.png" alt="">
                            Comments :
                            <div class="number">
                                {{comments_num}}
                            </div>
                        </div>
                    </div> 
                    <div class="users_counter">
                        <div class="title">
                            <img src="../assets/images/icons/commentss.png" alt="">
                            Contacts :
                            <div class="number">
                                {{contacts_num}}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- users table  -->


                <div class="recent_orders">
                    <h2>Users table</h2>
                    <table class="table_users">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr v-for="elements in users">
                                <td> <div class="user"><img :src="'http://localhost/ToTheTop/backend/public/imgUploaded/'+ elements.user_photo" alt="">
                                 {{elements.full_name}} </div> </td>
                                <td>{{elements.email}}</td>
                                <!-- <td>{{elements.id_user}}</td> -->
                                <td class="delete_user"><img @click="DeletUser(elements.id_user,elements.full_name)" src="../assets/images/icons/delete.png" alt=""> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <div class="recent_orders">
                    <h2>Contact messages</h2>
                    <table class="table_users">
                        <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Messages</th>
                                <th>options</th>
                            </tr>
                        </thead>
                        <tbody >
                            <tr v-for="elements in contacts">
                                <td> {{elements.Full_name}}</td>
                                <td>{{elements.email}}</td>
                                <td> {{elements.message}} </td>
                                <td class="delete_user"> <img @click="DeleteMessage(elements.id)" src="../assets/images/icons/delete.png"> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </section>
        </div>
        
    </div>
</template>

<script>
    import Navigation from '@/components/Navigation.vue';
    import axios from 'axios';
export default {
     components :{
        Navigation,
    },
    data() {
        return {
            admin:"",
            info_admin:[],
            users_num:"",
            posts_num:"",
            comments_num:"",
            contacts_num:"",
            contacts:[],
            users:[],
        }
    },
    mounted() {
        this.checkadmin()
        this.getadmininfo()
        this.getNumberUser()
        this.getNumberPosts()
        this.getNumberComments()
        this.getAllUsers()
        this.getNumberContacts()
        this.getAllContacts()
    },
    methods: {
        checkadmin(){
            this.admin = sessionStorage.getItem("name")
            if (this.admin != "Med gaba") {
                this.$router.push('/')
            }
            console.log(this.admin)
        },
        getadmininfo(){
            axios.get('http://localhost/ToTheTop/backend/Admin/GetInfoAdmin')
            .then(res => {
                this.info_admin = res.data
            })
        },
        getNumberUser(){
            axios.get('http://localhost/ToTheTop/backend/Admin/getNumberUser')
            .then(res => {
                this.users_num = res.data.counter
            })
        },
        getNumberComments(){
             axios.get('http://localhost/ToTheTop/backend/Admin/getNumberComments')
            .then(res => {
                this.comments_num = res.data.counter
            })
        },
        getNumberPosts(){
            axios.get('http://localhost/ToTheTop/backend/Admin/getNumberPosts')
            .then(res => {
                this.posts_num = res.data.counter
            })
        },
        getAllUsers(){
            axios.get('http://localhost/ToTheTop/backend/Admin/getAllUsers')
            .then(res => {
                this.users = res.data
            })
        },
        getNumberContacts(){
            axios.get('http://localhost/ToTheTop/backend/Contact/getNumberContact')
            .then(res => {
                this.contacts_num = res.data.counter
            })
        },
        getAllContacts(){
            axios.get('http://localhost/ToTheTop/backend/Contact/getAllContacts')
            .then(res => {
                this.contacts = res.data
                console.log(this.contacts);
            })
        },
        DeletUser(id,name){
            this.$swal(
                {
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }
            ).then((result) => {
            if (result.isConfirmed){
                axios.post('http://localhost/ToTheTop/backend/admin/DeleteUserById',id
                ).then(res => this.getAllUsers())
                this.$swal(
                {
                title:'Deleted!',
                text:'Your file has been deleted.',
                icon: 'success'
                }
            )
            }
            })
             
        },
        DeleteMessage(id){
            this.$swal(
                {
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }
            ).then((result) => {
            if (result.isConfirmed){
                axios.post('http://localhost/ToTheTop/backend/admin/DeleteMessageById',id
                ).then(res => this.getAllContacts())
                this.$swal(
                {
                title:'Message Deleted!',
                icon: 'success'
                }

            )
            }
            })
             
        }
    },
}
</script>

<style lang="scss" scoped>
@import '../assets/styles/config';
    .dushboard{
            @include flexColumn(center, space-evenly);
            padding: 100px 40px 45px 40px;
            background-color: #F4F4F4; 
            // height: 100vh;
            .heading{
                margin-bottom: 50px;
                width: 100% ;
                text-align: center;
                h1{
                    font-size: 28px;
                }
            }
            @include phone{
                padding: 80px 20px 45px 20px;

            }
        
    .container{
        @include flexRow(flex-start, space-evenly);
        width: 100%;
        .admin{
            @include flexColumn(center, space-between);
            position: sticky;
            --header-height: 101px;
            top: calc(var(--header-height) + 27px);
            background-color: $white;
            width: 30%;
            height: 47vh;
            padding-bottom: 12px;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
        }
        .statistics_holder{
             @include flexColumn(center, space-evenly);
                width: 100%;
    
            .statistics{
                @include flexRow(center, space-evenly);
                width: 100%;
    
                .users_counter{
                    @include flexColumn(center, space-between);
                    width: 30%;
                    margin: 0 10px 0 10px;
                    height: 10vh;
                    border-radius: 10px;
                    background-color: $white;
                    
                    box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; 
                    .title{
                        @include flexRow(center,center);
                        font-size: 20px;
                        padding-right: 5px;
                        width: 98%;
                        height: 100%;
                        font-weight: 700;
                    }
                    .number{
                        // width: 100%;
                        padding-left: 25px;
                        font-size: 20px;
                    }
                }
            }
            .recent_orders{
                @include flexColumn(center, space-between);
                
                width: 100%;
                h2{
                    margin:20px 0 20px 0;
                    font-size: 24px;
                    text-align: center;
                }
                .table_users{
                    box-shadow: rgba(0, 0, 0, 0.03) 0px 1px 3px 0px, rgba(0, 0, 0, 0.06) 0px 1px 2px 0px; 
                    width: 80%;
                    // margin: 0 30px 0 30px ;
                    border-radius: 10px;
                    thead{
                        // background-color: rgba(241, 241, 240, 0.543)
                        background-color: rgba(255, 255, 255, 0.429);
                        
                    }
                    tbody{
                        background-color: rgb(255, 255, 255);
                        text-align: center;
                        td{
                            padding: 10px;
                            border-bottom: 0.3px solid rgb(215, 209, 209) ;
                            .user{
                                @include flexRow(center, flex-start);
                                width: 100%;
                                img{
                                    width: 50px;
                                    height: 50px;
                                    border-radius: 50%;
                                    margin: 5px;
                                }
                            }
                        }
                        .delete_user{
                            img{
                                min-width: 30px;
                                cursor: pointer;
                            }
                        }
                    }
                }

            }
        }
        }
        @include large-tablet{
            .container
            .statistics_holder
            .statistics{
                flex-wrap: wrap;
                .users_counter{
                    width: 40%;
                    margin: 10px
                }
            }
        }
        @include tablet {
            @include flexColumn(center, space-between);
            padding: 60px 20px 45px 20px;

            .container{
                @include flexColumn(center, space-between);
                .admin{
                    position: static;
                    width: 100%;
                    height: 50vh;
                }
                .statistics_holder{

                    .statistics{
                        @include flexColumn(center, space-between);
                        width: 100%;
                        .users_counter{
                            width: 100%;
                            margin: 20px 0 20px 0;
                            .title{
                                font-size: 16px;
                            }
                        }
                    }
                    .recent_orders{
                        h2{
                            font-size: 20px;
                        }
                        .table_users{
                            width: 100%;
                        }
                    }
                }
            }
        }
        @include phone{
            .container
            .statistics_holder
            .recent_orders{
            .table_users{
                overflow-x: scroll;
                display: block;
                td{
                    min-width: 100px;
                }
                }
            }
        }

}

</style>