<template>
    <a class="button is-primary width-full text-center is-outlined is-fullwidth is-small" 
        @click.prevent="popApproval"
        href="#" v-if="!isApproved">
        <span class="icon">
            <fa icon="check"></fa>
        </span>
        <span>Approve Proof Of Payment</span>
    </a>
</template>

<script>
export default {
    name: 'ApprovePop',
    props: {
        member: Object,
    },
    data () {
        return {
            isApproved: false,
        }
    },
    methods: {
        popApproval () {
            axios.put('/api/approve-pop/' + this.member.id).then(response => {
                this.isApproved = response.data.approved;
            });
        }
    }
}
</script>