<template>
    <form :action="action" method="post">
        <input type="hidden" name="_token" :value="csrf">
        <input type="hidden" name="_method" value="delete">
        <div class="modal-card">
            <header class="modal-card-head has-background-danger">
                <h1 class="modal-card-title has-text-white">
                    Delete {{ title }}
                </h1>
            </header>
            <div class="modal-card-body">
                <div class="content">
                    <p>
                        Are you sure you want to delete this {{ title }}
                    </p>
                    <p class="has-text-danger">
                        {{ warning }}
                    </p>
                </div>
            </div>
            <footer class="modal-card-foot">
                <button type="button" class="button has-background-danger has-text-white" data-dismiss="modal" @click="$parent.close()">
                    <span class="icon">
                        <fa icon="ban"></fa>
                    </span>
                    <span>
                        Cancel
                    </span>
                </button>

                <button class="button" type="submit">
                    <span class="icon">
                        <fa icon="check"></fa>
                    </span>
                    <span>
                        Delete
                    </span>
                </button>
            </footer>
        </div>
    </form>
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
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }
}
</script>

