<template>
    <div class="post_react">
        <div class="claps">
            <img src="../assets/images/icons/claps.png" alt="">
            <label for="">30</label>
        </div>
        <div class="claps">
            <img src="../assets/images/icons/love.png" alt="">
            <label for="">30</label>

        </div>
    </div>
    <!-- <div class="post_react">
        <div class="claps">
            <img src="../assets/images/icons/claps full.png" alt="">
        </div>
        <div class="claps">
            <img src="../assets/images/icons/love full.png" alt="">
        </div>
    </div>-->
</template>
<script>
import axios from 'axios';
export default {
    
}
</script>
<style lang="scss" scoped>
    @import '../assets/styles/config';
    .post_react{
        padding-left: 20px;
        @include flexRow(center,flex-start);
        .claps{
            @include flexColumn(center,flex-start);
            img{
                width: 30px
            }
        
        }
    }
</style>