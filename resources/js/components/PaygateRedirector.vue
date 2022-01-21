<template>
    <div class="paygate-redirector">
        <form method="post" :action="endpoint">
            <input type="hidden" name="PAY_REQUEST_ID" :value="payRequestId">
            <input type="hidden" name="CHECKSUM" :value="checksum">
        </form>
    </div>
</template>

<script>
    export default {
        name: "PaygateRedirector",
        props: {
            payRequestId: String,
            checksum: String,
            endpoint: String,
        },
        mounted () {
            this.$el.querySelector('form').submit();
        }
    }
</script>

<style scoped>

</style>
