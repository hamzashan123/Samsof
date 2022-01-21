<template>
    <section>
        <button class="button is-pulled-right is-danger is-outlined is-small"
            @click="isCardModalActive = true">
            <span class="icon">
                <fa icon="trash"></fa>
            </span>
            <span>Delete</span>
        </button>
        <b-modal :active.sync="isCardModalActive" has-modal-card>
            <delete-modal :title="title" :action="action" :warning="warning"></delete-modal>
        </b-modal>
    </section>
</template>

<script>

    export default {
        props: {
            title: String,
            action: String,
            warning: String,
        },
        data() {
            return {
                isCardModalActive: false
            }
        }
    }
</script>
