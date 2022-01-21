<template>
    <div class="privacy">
        <!--start::Cookies Message-->
        <div v-if="!cookie" class="cookies">
            <div class="container">
                <div class="cookie-content">
                    <!-- <div class="px-2">
                        <div class="d-flex justify-content-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" stroke-width=".5" stroke="#cacaca" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M8 13v.01"></path>
                                <path d="M12 17v.01"></path>
                                <path d="M12 12v.01"></path>
                                <path d="M16 14v.01"></path>
                                <path d="M11 8v.01"></path>
                                <path d="M13.148 3.476l2.667 1.104a4 4 0 0 0 4.656 6.14l.053 .132a3 3 0 0 1 0 2.296c-.497 .786 -.838 1.404 -1.024 1.852c-.189 .456 -.409 1.194 -.66 2.216a3 3 0 0 1 -1.624 1.623c-1.048 .263 -1.787 .483 -2.216 .661c-.475 .197 -1.092 .538 -1.852 1.024a3 3 0 0 1 -2.296 0c-.802 -.503 -1.419 -.844 -1.852 -1.024c-.471 -.195 -1.21 -.415 -2.216 -.66a3 3 0 0 1 -1.623 -1.624c-.265 -1.052 -.485 -1.79 -.661 -2.216c-.198 -.479 -.54 -1.096 -1.024 -1.852a3 3 0 0 1 0 -2.296c.48 -.744 .82 -1.361 1.024 -1.852c.171 -.413 .391 -1.152 .66 -2.216a3 3 0 0 1 1.624 -1.623c1.032 -.256 1.77 -.476 2.216 -.661c.458 -.19 1.075 -.531 1.852 -1.024a3 3 0 0 1 2.296 0z"></path>
                            </svg>
                        </div>
                    </div> -->
                    <div class="cookie-px-2 cookie-text text-white">
                        <div class="font-weight-light text-center text-md-left"><strong class="text-white">Cookies Policy</strong> | Our website uses cookies to analyse how the site is used and to ensure your experience is consistent between visits. <a class="action text-white font-weight-bold" href="/privacy-policy">Learn more</a></div>
                    </div>
                    <div class="cookie-px-2">
                        <a href="/accept-cookie-policy" class="text-white">
                            <div class="accept">
                                <div>
                                    Accept
                                </div>
                                <div class="pl-1 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Cookies Message-->
    </div>
</template>

<script>
    export default {
        name: 'CookieMonster',
        props: {
            cookie: Boolean,
        },
    }
</script>

<style scoped>
.cookie-content {
    display: flex;
    align-items: center;
    justify-content: flex-start;
}

.font-weight-light {
    font-weight: 200;
}

.text-center {
    text-align: center;
} 

.cookie-px-2 {
    padding: .5rem;
}

.text-white {
    color: #fff;
}

.justify-items-center {
    justify-items: center;
} 

.text-decoration-none {
    text-decoration: none;
}

.flex {
    display: flex;
}

.items-center {
    align-items: center;
}

.mt-4 {
    margin-top: 1rem;
}

.privacy {
    left: 0;
    right: 0;
    bottom: 0;
    position: fixed;
    font-size: 12px;
    font-weight: 300;
    font-family: sans-serif;
    color: #fff;
    z-index: 9;
}

.cookies {
    padding: 4px 0px;
    background-color: #000;
    background-color: #056db6;
}

.cookie-text {
    flex: 1 1 0%;
}

.accept {
    border: 1px solid #fff;
    border-radius: 30px;
    padding: 6px 8px;
    display: flex;
    justify-content: center;
    align-item: center;
    text-decoration: none !important;
    color: #fff;
    background: transparent;
}

.accept:hover {
    color: #000;
    background: #fff
}

@media only screen and (max-width: 768px) {
    .text-md-left {
        text-align: left !important;
    } 
    .mt-md-0 {
        margin-top: 0 !important;
    }
}
</style>
