<template>
    <div class="recaptcha">
        <input type="hidden" :name="name" v-model="token" />
        <div id="g-recaptcha"
             class="g-recaptcha"
             :data-sitekey="siteKey">
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            siteKey: String,
            name: String,
        },
        data () {
            return {
                token: null,
            }
        },
        methods: {
            execute () {
                window.grecaptcha.execute(this.siteKey).then(token => {
                    this.token = token;
                });
            },
            reset () {
                window.grecaptcha.reset(this.siteKey)
            },
            render () {
                setTimeout(() => {
                    if (window.grecaptcha) {
                        window.grecaptcha.ready(() => {
                            this.execute();
                        });
                    }
                }, 1000);
            }
        },
        mounted () {
            this.render();
        }
    }
</script>