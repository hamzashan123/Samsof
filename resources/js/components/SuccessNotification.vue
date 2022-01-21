<template>
    <div class="columns">
        <div class="column">
            <b-notification
                auto-close type="is-success"
                :active.sync="isActive"
                :duration="3000"
                aria-close-label="Close notification">
                {{ message }}
            </b-notification>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            message: String,
        },
        data() {
            return {
                isActive: true
            }
        }
    }
</script>