<template>
    <div class="scroll-top-button">
        <a class="scroll-top-link text-white rounded-top" @click="scrollToTop" :class="{ hiddenButton: scrollPosition < 300, displayButton: scrollPosition > 300 }">
            <fa icon="chevron-up" class="scroll-up-arrow"></fa>
        </a>
    </div>
</template>

<script>
export default {
    data () {
        return {
            scrollPosition: null
        }
    },
    methods: { 
        updateScroll () {
            this.scrollPosition = window.scrollY
        },
        scrollToTop() {
            window.scrollTo(0,0);
        }
    },
    mounted () {
        window.addEventListener('scroll', this.updateScroll);
    },
}
</script>

<style lang="scss">
@import "../../sass/public/variables";

    .scroll-top-button {
        position: fixed; 
        right: 0;
        bottom: 0;
        z-index: 10;
        margin-bottom: 30px;
        margin-right: 30px;

        .scroll-top-link {
            font-size: 18px;
            background-color: transparentize( #000, 0.5);
            color: #fff;
            padding: .8rem 1rem;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            line-height: 1.5;
            transition: all .3s ease;
            border-radius: 3000px;

            .scroll-up-arrow {
                width: 20px;
                height: 20px;
            }

            &.displayButton {
                opacity: 1;
            }

            &.hiddenButton {
                opacity: 0;
            }

            &:hover {
                background-color: $primary;
                cursor: pointer;
            }
        }
    }
</style>

