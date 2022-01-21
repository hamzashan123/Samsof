<template>
    <div class="floating-image" :style="imageStyle">
        <img :src="src" :alt="alt">
    </div>
</template>

<script>
    export default {
        props: {
            src: String,
            alt: String,
            distance: {
                type: String,
                default: 0,
            },
            imagePosition: {
                type: String,
                default: 'top',
            },
            imageWidth: {
                type: String,
                default: '300px',
            },
        },
        computed: {
            imageStyle () {
                if (this.imagePosition === 'top') {
                    return {
                        top: this.distance,
                        width: this.imageWidth,
                    }
                } else {
                    return {
                        bottom: this.distance,
                        width: this.imageWidth,
                    }
                }
            }
        }
    }
</script>

<style lang="scss">
    @import '../../sass/public/variables';

    .floating-image {
        position: absolute;
        right: 0;
        display: none;
        width: 300px;
        z-index: 899;

        img {
            display: block;
            width: 100%;
        }

        @media (min-width: map_get($grid-breakpoints, md)) {
            display: block;
        }

        @media (min-width: map_get($grid-breakpoints, lg)) {
            width: 380px;
        }
    }
</style>
