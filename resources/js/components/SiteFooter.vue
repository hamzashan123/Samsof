<template>
<div class="columns is-gapless">
    <div class="column">
        <slot name="main-footer"></slot>
    </div>
    <div class="column is-narrow is-hidden-touch" v-if="showSidebar">
        <slot name="site-sidebar"></slot>
    </div>
</div>
</template>

<script>
export default {
    props: {
        showSidebar: {
            type: Boolean,
            default: false,
        }
    }
}
</script>

