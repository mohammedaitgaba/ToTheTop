<template>
    <section class="generator">
        <div class="generator_head">
            <div class="titles_holder">
                <div class="title1">Quotes &nbsp; </div>
                <div class="title2">Generator</div>
            </div>
            <div class="paragraph">
                Taking a look at one or two random quotes each morning.
                can be a good exercise for journaling prompts.
            </div>
        </div>
        <transition name="quote_animation">
            <div class="quote" v-if="quots">
                <label> {{quots}} </label>
            </div> 
        </transition>

        <form class="generator_submit" v-on:submit.prevent="generate">
            <div class="select_holder">
                <select v-model="category" name="category" class="category" required>
                    <option value="" selected disabled>--choose a type</option>
                    <option value="Work" >Work</option>
                    <option value="Confidence">Confidence</option>
                    <option value="Success">Success</option>
                    <option value="Fear">Fear</option>
                </select>
                <div class="category_arrow"></div>
            </div>
            <button class="generate">
                new quote
            </button>

        </form>

    </section>
</template>

<script>
import axios from 'axios';
export default {
    data() {
        return {
            category: "",
            quots:"",
            toggle: false
        }
    },
    methods: {
        generate(){
            axios.post('http://localhost/ToTheTop/backend/Generator/generateQuote',{
                type:this.category
            }).then(res => {
                this.quots =(res.data.corp)
                this.toggle = true
                console.log(this.quots); 
            })
        },
    },

}
</script>

<style lang="scss" scoped>
@import '../assets/styles/config';

.generator {
    background-image: linear-gradient(#ded2c912, #f3a0334b, #0000008a), url('../assets/images/backgrounds/quotesBG.png');
    background-size: cover;
    background-repeat: no-repeat;
    // background-position: top;
    background-attachment: fixed;
    height: 50vh;
    @include flexColumn(center, space-evenly);

    .generator_head {
        @include flexColumn(center, center);

        .paragraph {
            font-size: 16px;
            width: 85%;
            text-align: center;
            color: $white;
        }
    }

    .titles_holder {
        @include flexRow(center, space-between);
        font-size: 28px;
        font-weight: 800;

        .title2 {
            color: $white;
        }
    }

    .quote {
        @include flexRow(center, space-between);
        width: 80%;
        font-size: 20px;
        text-align: center;
        color: $white;
        
    }

    .generator_submit {
        @include flexRow(center, space-evenly);
        position: relative;
        width: 40%;

        .select_holder {
            position: relative;
            width: 40%;

            .category {
                display: inline-block;
                width: 100%;
                cursor: pointer;
                padding: 10px 15px;
                outline: 0;
                border: solid 2px rgba(255, 255, 255, 0.6);
                padding: 6px 12px;
                border-radius: 7px;
                -webkit-box-shadow: 0px 1px 6px -1px #000;
                box-shadow: 0px 1px 6px -1px #000;
                background: $white;
                color: black;
                appearance: none;
                -webkit-appearance: none;
                -moz-appearance: none;
                -webkit-transition: ease all 0.2s;
                -o-transition: ease all 0.2s;
                transition: ease all 0.2s;
            }

            .category_arrow {
                position: absolute;
                top: 18px;
                right: 15px;
                width: 0;
                height: 0;
                pointer-events: none;
                border-style: solid;
                border-width: 8px 5px 0 5px;
                border-color: #7b7b7b transparent transparent transparent;
            }
        }

        .generate {
            @include button;
            // background-color: $white;
            // color: $orange1;
        }
    }


    @include tablet {
        .quote {
            font-size: 18px;
        }

        .generator_submit {
            width: 70%;

            .generate {
                padding: 8px 12px;
            }
        }

        .generator_head {
            .paragraph {
                font-size: 14px;
            }
        }
    }

    @include phone {
        height: 80vh;

        .titles_holder {
            font-size: 24px;
        }

        .generator_head {
            .paragraph {
                font-size: 12px;
            }
        }

        .generator_submit {
            width: 100%;
        }
    }
    // .quote_animation
    .quote_animation-enter-active,
    .quote_animation-leave-active {
    transition: opacity 0.5s ease;
    }

    .quote_animation-enter-from,
    .quote_animation-leave-to {
    opacity: 0;
    }
}
</style>