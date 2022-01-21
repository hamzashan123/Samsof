<template>
    <div class="site-search">
        <transition name="search-fade">
            <div class="site-search-container" v-if="show">
                <div class="site-search-body">
                    <div class="field has-addons">
                        <div class="control is-expanded">
                            <input type="search-input" class="input" placeholder="Search..." v-model="query" @keypress.enter="performSearch">
                        </div>
                        <div class="control">
                            <button type="button" class="button" :disabled="query.length < 4" @click.prevent="performSearch">
                                <fa icon="search"></fa>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: {
            value: Boolean,
        },
        data () {
            return {
                show: this.value,
                query: '',
            }
        },
        watch: {
            value () {
                this.show = this.value;
            }
        },
        methods: {
            toggleSearch () {
                this.show = !this.show;
                this.$emit('input', this.show);
            },
            performSearch () {
                window.location.href = route('search', {q: this.query});
            }
        }
    }
</script>

<style lang="scss">

    .search-fade {
        &-enter-active, &-leave-active {
            transition: all .3s ease;
        }

        &-enter, &-leave-to {
            transform: translateY(-100%);
            opacity: 0;
        }

        &-leave, &-enter-to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .site-search-container {
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        background: rgba(0,0,0,0.8);
        z-index: 1999;
        display: flex;
        align-items: center;

        .site-search-body {
            padding: 3em;
            width: 100%;

            .input {
                background: transparent;
                border: none;
                border-bottom: 1px #fff solid;
                font-size: 1.5em;
                border-radius: 0;
                outline: none;
                box-shadow: none;
                color: #fff;

                &::placeholder {
                    color: #555;
                }
            }

            .button {
                font-size: 1.5em;
                background: transparent;
                border: 1px #fff solid;
                color: #fff;
            }
        }
    }
</style>
