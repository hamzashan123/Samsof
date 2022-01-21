<template>
    <div class="">
        <div class="columns">
            <div class="column is-one-fifth">
                <div class="field">
                    <b-switch v-model="isSwitchedCustom"
                        true-value="Yes"
                        false-value="No">
                        {{ isSwitchedCustom }}
                    </b-switch>
                </div>
            </div>
        </div>
        <div class="columns" v-if="isSwitchedCustom === 'Yes'">
            <div class="column">
                <div>
                    <label class="label">
                        Media Type
                    </label>
                    <slot name="dropdown"></slot>
                </div>
                <div>
                    <label class="label">Media Link</label>
                    <input class="input" name="media" :value="value">
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        value: String,
        activateSwitch: String,
    },
    data() {
        return {
            isSwitchedCustom: this.activateSwitch,
        }
    },
}
</script>
