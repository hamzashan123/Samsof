<template>
    <div class="feature-grid">
        <div class="feature-grid-parent">
            <div class="feature-cell v1">
                <div class="feature-cell-block" href="#">
                    <div class="feature-cell-body">
                        <div>
                            <h6 class="title">SASMFOS<br> Virtual Congress<br> 2021</h6>
                            <p>
                                17 – 19 September 2021
                            </p>
                        </div>
                    </div>
                    <div class="arrow down"></div>
                </div>
                <div class="feature-cell-block congress" href="#">
                    <div class="bg-image"></div>
                    <div class="feature-cell-body">
                        <div>
                            <h6 class="title">SASMFOS<br>Congress 2021</h6>
                            <p>
                                We are thrilled to announce that our annual congress will take place from 17 to 19 September. 
                            </p>
                            <p class="mt-1  ">
                                Join us for our virtual SASMFOS Congress – register today!
                            </p>
                        </div>
                        <div class="feature-buttons">
<!--                            <a class="button is-rounded is-red is-small" href="https://congress.sasmfos.org/registration.php"><strong>BOOK YOUR SPOT</strong></a>-->
                            <a class="button is-rounded is-yellow is-small" href="https://congress.sasmfos.org/" target="_blank"><strong>FIND OUT MORE</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-cell h1">
                <div class="feature-cell-block" href="#">
                    <div class="feature-cell-body">
                        <div>
                            <h6 class="title">SASMFOS Members</h6>
                            <p>
                                With around 12 million patients in South Africa, SASMFOS aims to represent our surgeons and
                                to engage, on their behalf, with medical aid funds to facilitate coverage of medical
                                procedures, hospitals, healthcare providers, patients and regulatory authorities.
                            </p>
                        </div>
                        <div class="feature-buttons">
                            <a href="mailto:info@sasmfos.org?subject=Tell%20me%20more%20about%20SASMFOS%20membership" class="button is-rounded is-yellow is-small"><strong>FIND OUT MORE</strong></a>
                        </div>
                    </div>
                    <div class="arrow right"></div>
                </div>
                <div class="feature-cell-block" href="#">
                    <div class="feature-cell-body">
                        <div>
                            <h6 class="title">SASMFOS Members</h6>
                            <p>
                                The SASMFOS members’ room provides a simple platform for members to keep their details
                                up-to-date.
                            </p>
                        </div>
                        <div class="feature-buttons">
                            <a :href="route('members.register')" class="button is-rounded is-red is-small"><strong>REGISTER</strong></a>
                            <a :href="route('members.login')" class="button is-rounded is-blue is-small"><strong>LOGIN</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-cell s1">
                <div class="feature-cell-block procedures" :class="proceduresClass" href="#">
                    <div class="bg-image"></div>
                    <div class="feature-cell-body">
                        <div>
                            <h6 class="title">PROCEDURES<br>&amp; FUNDERS</h6>
                            <p>
                                MFO specialists offer various procedures which will save time, provide value and are safer
                                to do with a qualified specialist.
                            </p>
                        </div>
                        <div class="feature-buttons">
                            <a :href="route('members')" class="button is-rounded is-light-blue"><strong>TELL ME MORE</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-cell s2">
                <div class="feature-cell-block xrays" :class="referralClass" href="#">
                    <div class="bg-image"></div>
                    <div class="feature-cell-body">
                        <div>
                            <h6 class="title">REFERRAL FROM<br>YOUR DOCTOR</h6>
                            <p>
                                SASMFOS assists patients and their doctors to find MFO specialists.
                            </p>
                        </div>
                        <div class="feature-buttons">
                            <a href="/members#directory" class="button is-rounded is-yellow"><strong>FIND A SPECIALIST</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-cell s3">
                <div class="feature-cell-block half-empty"><div class="blocker"></div></div>
            </div>
            <div class="feature-cell s4">
                <div class="feature-cell-block doctors" :class="surgeonClass" href="#">
                    <div class="bg-image"></div>
                    <div class="feature-cell-body">
                        <div>
                            <h6 class="title">FIND AN MFO<br>SURGEON</h6>
                            <p>
                                SASMFOS assists healthcare professionals to find MFO specialists.
                            </p>
                        </div>
                        <div class="feature-buttons">
                            <a :href="route('members')" class="button is-rounded is-red"><strong>FIND A SURGEON</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-cell s5">
                <div class="feature-cell-block empty">
                </div>
            </div>
            <div class="feature-cell s6">
                <div class="feature-cell-block meeting" :class="purposeClass" href="#">
                    <div class="bg-image"></div>
                    <div class="feature-cell-body">
                        <div>
                            <h6 class="title">OUR<br>PURPOSE</h6>
                            <p>
                                To add significant value to the South African healthcare and dental value chain through the
                                uniquely specialised offerings of our members.
                            </p>
                        </div>
                        <div class="feature-buttons">
                            <a :href="route('who')" class="button is-rounded is-green"><strong>READ MORE</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-cell s7">
                <div class="feature-cell-block operating" :class="careClass" href="#">
                    <div class="bg-image"></div>
                    <div class="feature-cell-body">
                        <div>
                            <h6 class="title">QUALITY<br>CARE</h6>
                            <p>
                                We ensure that we remain current with the latest innovations and trends to ensure the best
                                access to quality care to our patients.
                            </p>
                        </div>
                        <div class="feature-buttons">
                            <a :href="route('cares')" class="button is-rounded is-yellow"><strong>READ MORE</strong></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="feature-cell s8">
                <div class="feature-cell-block notes" :class="educationClass" href="#">
                    <div class="bg-image"></div>
                    <div class="feature-cell-body">
                        <div>
                            <h6 class="title">EDUCATION<br>&amp; TRAINING</h6>
                            <p>
                                Our members benefit from support on best practice management, further education, research
                                and professional development.
                            </p>
                        </div>
                        <div class="feature-buttons">
                            <a :href="route('education')" class="button is-rounded is-light-blue"><strong>FIND OUT MORE</strong></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FeatureGrid",
        data () {
            return {
                proceduresClass: this.randomCover(),
                referralClass: this.randomCover(),
                surgeonClass: this.randomCover(),
                purposeClass: this.randomCover(),
                careClass: this.randomCover(),
                educationClass: this.randomCover(),
            }
        },
        methods: {
            randomCover () {
                const classes = [
                    'white',
                    'blue',
                    'yellow',
                    'grey',
                    'green',
                ];

                return classes[Math.floor(Math.random() * classes.length)];
            }
        },
        mounted () {
            setInterval(() => {
                this.procedureClass = this.randomCover();
                this.referralClass = this.randomCover();
                this.surgeonClass = this.randomCover();
                this.purposeClass = this.randomCover();
                this.careClass = this.randomCover();
                this.educationClass = this.randomCover();
            }, 1200);
        }
    }
</script>

<style lang="scss">
    @import '../../sass/public/variables';

    .feature-grid {
        display: flex;
        justify-content: flex-end;
        margin-top: -152px;
        //margin-left: -100%;

        @media only screen and (min-width: map_get($grid-breakpoints, md)) {
            //margin-left: -50%;
        }

        @media only screen and (min-width: map_get($grid-breakpoints, lg)) {
            margin-top: -200px;
            //margin-left: -33%;
        }

        .button {
            font-size: 1em;

            &.is-light-blue {
                background: $light-blue;
                border-color: darken($light-blue, 1%);
                color: #fff;
            }
            &.is-blue {
                background: $blue;
                border-color: darken($blue, 1%);
                color: #fff;
            }
            &.is-yellow {
                background: $yellow;
                border-color: darken($yellow, 1%);
                color: #fff;
            }
            &.is-red {
                background: $red;
                border-color: darken($red, 1%);
                color: #fff;
            }
            &.is-green {
                background: $green;
                border-color: darken($green, 1%);
                color: #fff;
            }
        }

        .feature-grid-parent {
            display: grid;
            flex: 0 0 100%;
            max-width: 1200px;
            grid-auto-rows: 1fr;

            grid-template-areas:
                "v1 s1"
                "v1 s2"
                "h1 h1"
                "s4 s6"
                "s7 s8";

            @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                grid-template-areas:
                    "v1 s1 s2"
                    "v1 s3 s4"
                    "h1 h1 s5"
                    "s6 s7 s8";
            }

            @media only screen and (min-width: map_get($grid-breakpoints, lg)) {
                grid-template-areas:
                    "v1 s1 s2 s3"
                    "v1 s4 s5 s6"
                    "h1 h1 s7 s8";
            }

            .feature-cell {
                position: relative;
                width: 100%;
                display: flex;
                overflow: hidden;
                will-change: auto;

                .feature-cell-block {
                    width: 100%;
                    min-height: 100%;
                    position: relative;
                    background: #f0f1f1;
                    font-size: .85em;
                    line-height: 1.3em;
                    will-change: auto;


                    &.empty {
                        background: #fff;
                    }

                    &.half-empty {
                        background: linear-gradient(to right, #8ab14b, #f8ad1e);
                        .blocker {
                            position: absolute;
                            left: 0;
                            right: 0;
                            bottom: 0;
                            height: 50px;
                            background: #fff;
                        }
                    }

                    &:after {
                        content: '';
                        //padding-bottom: 100%;
                        display: block;
                    }

                    .bg-image {
                        position: absolute;
                        left: 0;
                        right: 0;
                        top: 0;
                        bottom: 0;
                        z-index: 0;
                        background-size: cover;
                        background-position: center center;
                        background-repeat: no-repeat;

                        &:after {
                            content: '';
                            position: absolute;
                            left: 0;
                            right: 0;
                            top: 0;
                            bottom: 0;
                            z-index: 1;
                        }
                    }

                    .title {
                        font-size: 1.3em;

                        @media (min-width: map-get($grid-breakpoints, md)) {
                            font-size: 1.1em;
                        }
                        @media (min-width: map-get($grid-breakpoints, lg)) {
                            font-size: 1.3em;
                        }
                        @media (min-width: map-get($grid-breakpoints, xl)) {
                            font-size: 1.6em;
                        }

                    }

                    &.congress {
                        .bg-image {
                            background-image: url('/images/features/century-city.jpg');
                            &:after {
                                background-color: rgba(0,0,0,0.5);
                            }
                        }
                    }

                    &.procedures {
                        .bg-image {
                            background-image: url('/images/features/procedures.jpg');
                        }
                    }

                    &.xrays {
                        .bg-image {
                            background-image: url('/images/features/xrays.jpg');
                        }
                    }

                    &.doctors {
                        .bg-image {
                            background-image: url('/images/features/doctor-nurse.jpg');
                        }
                    }

                    &.meeting {
                        .bg-image {
                            background-image: url('/images/features/doctor-meeting.jpg');
                        }
                    }

                    &.operating {
                        .bg-image {
                            background-image: url('/images/features/operating.jpg');
                        }
                    }

                    &.notes {
                        .bg-image {
                            background-image: url('/images/features/notes.jpg');
                        }
                    }

                    transition: all 1s ease;
                    .title {
                        transition: all 1s ease;
                    }
                    .bg-image {
                        &:after {
                            transition: all 1s ease;
                        }
                    }

                    &.white {
                        color: #000 !important;
                        .title {
                            color: #000;
                        }
                        .bg-image {
                            &:after {
                                background-color: rgba(255, 255, 255, 0.75);
                            }
                        }
                    }

                    &.blue {
                        color: #fff !important;
                        .title {
                            color: #fff;
                        }
                        .bg-image {
                            &:after {
                                background-color: transparentize($blue, .3);
                            }
                        }
                    }
                    &.green {
                        color: #fff !important;
                        .title {
                            color: #fff;
                        }
                        .bg-image {
                            &:after {
                                background-color: transparentize(darken($green, 10%), .3);
                            }
                        }
                    }
                    &.yellow {
                        color: #fff !important;
                        .title {
                            color: #fff;
                        }
                        .bg-image {
                            &:after {
                                background-color: transparentize(darken($yellow, 10%), .3);
                            }
                        }
                    }
                    &.grey {
                        color: #fff;
                        .title {
                            color: #fff;
                        }
                        .bg-image {
                            &:after {
                                background-color: transparentize(#666, .3);
                            }
                        }
                    }

                    .arrow {
                        position: absolute;
                        display: block;
                        width: 15px;
                        height: 15px;
                        background: #056db6;
                        z-index: 1;

                        &.down {
                            bottom: -8px;
                            left: 50%;
                            transform: translateX(-50%) rotateZ(45deg);
                            background: inherit;
                        }
                        &.right {
                            right: -8px;
                            top: 50%;
                            transform: translateY(-50%) rotateZ(45deg);
                            background: inherit;
                        }
                    }

                    .feature-cell-body {
                        position: relative;
                        min-height: 300px;
                        left: 0;
                        right: 0;
                        top: 0;
                        bottom: 0;
                        z-index: 1;
                        padding: 2.2em;
                        height: 100%;
                        //text-align: center;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;

                        > div:first-child {
                            //overflow: hidden;
                            flex-shrink: 0;
                            margin-bottom: 5px;
                        }

                        .title {
                            font-family: $family-sans-serif;
                            font-weight: 500;
                            min-height: 35px;
                            margin-bottom: 0;

                            @media only screen and (min-width: map_get($grid-breakpoints, lg)) {
                                min-height: 60px;
                            }
                        }

                        .feature-buttons {
                            padding: .5em 0;
                            flex-shrink: 1;
                            flex-grow: 1;
                            display: flex;
                            justify-content: flex-start;
                            align-items: flex-start;
                            flex-wrap: wrap;

                            .button {
                                margin: 0 .2em .3em 0;
                                font-size: .8em;
                                padding: 0 .8em;
                            }
                        }
                    }
                }

                &.v1 {
                    grid-area: v1;
                    border-top-left-radius: 100px;
                    flex-direction: column;

                    .feature-cell-block {
                        &:first-child {
                            background: #d4555a;
                            color: #fff;
                            min-height: 50%;

                            .feature-cell-body {
                                padding-top: 4em;
                            }

                            .title {
                                color: #fff;
                                font-size: 1em;

                                @media (min-width: map_get($grid-breakpoints, md)) {
                                    font-size: 1.1em;
                                }
                                @media (min-width: map_get($grid-breakpoints, lg)) {
                                    font-size: 1.4em;
                                }
                                @media (min-width: map_get($grid-breakpoints, xl)) {
                                    font-size: 2.1em;
                                }
                            }
                        }
                        &:last-child {
                            color: #fff;
                            min-height: 50%;

                            .title {
                                color: #fff;
                            }
                        }
                    }
                }

                &.h1 {
                    grid-area: h1;

                    .feature-cell-block {
                        &:first-child {
                            background: #056db6;
                            color: #fff;
                            .title {
                                color: #fff;
                            }
                        }
                        &:last-child {
                            color: #056db6;
                            .title {
                                color: #056db6;
                            }
                        }
                    }
                }

                &.s1 {
                    grid-area: s1;
                }
                &.s2 {
                    grid-area: s2;
                }
                &.s3 {
                    display: none;
                    @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                        display: block;
                        grid-area: s3;
                    }
                }
                &.s4 {
                    grid-area: s4;
                }
                &.s5 {
                    display: none;
                    @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                        display: block;
                        grid-area: s5;
                    }
                }
                &.s6 {
                    grid-area: s6;
                }
                &.s7 {
                    grid-area: s7;
                }
                &.s8 {
                    grid-area: s8;
                }
            }
        }
    }
</style>
