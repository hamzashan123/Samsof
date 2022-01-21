<template>
    <div class="pop-uploader">
        <div class="columns">
            <div class="column date-picker">
                <div>
                    <label>
                        Date of payment
                    </label>
                </div>
                <date-time-picker :selected-date="Date($date)"
                    field-name="payment_at"
                    :time-active="false"></date-time-picker>
            </div>
            <div class="column">
                <file-uploader name="pop-uploader" :endpoint="route('members.payments.pop')"
                        label="Upload proof of payment" class="mt-1" @uploaded="uploadComplete"></file-uploader>
            </div>
        </div>
        <div class="pt-1" v-if="uploaded">
            <button type="submit" class="button is-primary">
                Submit Proof Of Payment
            </button>
        </div>
    </div>
    
</template>

<script>
    export default {
        name: "PopUploader",
        props: {
            member: Object,
            date: String,
        },
        data () {
            return {
                uploaded: false,
            }
        },
        methods: {
            uploadComplete () {
                this.uploaded = true;
            }
        }
    }
</script>

<style scoped>
.date-picker {
    position: relative;
    z-index: 1002;
}
</style>
