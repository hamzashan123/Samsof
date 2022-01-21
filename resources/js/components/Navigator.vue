<template>
    <nav class="navigator" :class="{open: open}" :style="navigatorStyle">
        <a href="#" class="menu-toggle" @click.prevent="toggleMenu">
            <div class="menu-toggle-icon">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <span class="label">MENU</span>
        </a>
        <div class="navigator-menu" :style="navigatorMenuStyle">
            <a class="navigator-menu-link" :class="{active: active === 'home'}" href="/">
                <span>HOME</span>
            </a>
            <a class="navigator-menu-link" :class="{active: active === 'who'}" href="/who-we-are">
                <span>WHO WE ARE</span>
            </a>
            <div class="navigator-menu-dropdown" :class="{open: active === 'resources'}">
                <a class="navigator-menu-link" href="#" :class="{active: active === 'resources'}" @click.prevent="toggleDropdown($event)">
                    <span>RESOURCES</span>
                </a>
                <div class="navigator-menu-dropdown-sub">
                    <a class="navigator-menu-link" href="/resources" @click="toggleMenu">
                        <span>MEDICAL FUNDERS</span>
                    </a>
                    <a class="navigator-menu-link" href="/resources#patients" @click="toggleMenu">
                        <span>PATIENTS</span>
                    </a>
                    <a class="navigator-menu-link" href="/resources#hospitals" @click="toggleMenu">
                        <span>HOSPITALS</span>
                    </a>
                    <a class="navigator-menu-link" href="/resources#healthcare-professionals" @click="toggleMenu">
                        <span>HEALTHCARE PROFESSIONALS</span>
                    </a>
                    <a class="navigator-menu-link" href="/resources#key-views" @click="toggleMenu">
                        <span>KEY VIEWS AND ISSUES</span>
                    </a>
                </div>
            </div>
<!--            <a class="navigator-menu-link" :class="{active: active === 'conference'}" href="/congress">-->
<!--                <span>SASMFOS<br>CONGRESS 2020</span>-->
<!--            </a>-->
            <div class="navigator-menu-dropdown" :class="{open: active === 'members'}">
                <a class="navigator-menu-link" :class="{active: active === 'members'}" href="#" @click.prevent="toggleDropdown($event)">
                    <span>FIND AN MFO SURGEON</span>
                </a>
                <div class="navigator-menu-dropdown-sub">
                    <a class="navigator-menu-link" href="/members#code-of-conduct" @click="toggleMenu">
                        <span>CODE OF CONDUCT</span>
                    </a>
                    <a class="navigator-menu-link" href="/members#value" @click="toggleMenu">
                        <span>THE VALUE OF AN MFO SURGEON</span>
                    </a>
                    <a class="navigator-menu-link" href="/members#directory" @click="toggleMenu">
                        <span>DIRECTORY OF MFO SURGEONS</span>
                    </a>
                </div>
            </div>
            <div class="navigator-menu-dropdown" :class="{open: active === 'education'}">
                <a class="navigator-menu-link" :class="{active: active === 'education'}" href="#" @click.prevent="toggleDropdown($event)">
                    <span>EDUCATION AND RESEARCH</span>
                </a>
                <div class="navigator-menu-dropdown-sub">
                    <a class="navigator-menu-link" href="/education" @click="toggleMenu">
                        <span>VALUE OF SASMFOS MEMBERSHIP</span>
                    </a>
                    <a class="navigator-menu-link" href="/education#peers" @click="toggleMenu">
                        <span>WORLD-CLASS PEERS AND RESEARCH</span>
                    </a>
                    <a class="navigator-menu-link" href="/education#network" @click="toggleMenu">
                        <span>ACCESS TO OUR WORLD-CLASS NETWORK</span>
                    </a>
                </div>
            </div>
            <div class="navigator-menu-dropdown" :class="{open: active === 'cares'}">
                <a class="navigator-menu-link" :class="{active: active === 'cares'}" href="#" @click.prevent="toggleDropdown($event)">
                    <span>SASMFOS CARES</span>
                </a>
                <div class="navigator-menu-dropdown-sub">
                    <a class="navigator-menu-link" href="/cares" @click="toggleMenu">
                        <span>ABOUT SASMFOS CARES</span>
                    </a>
                    <a class="navigator-menu-link" href="/cares#case-studies" @click="toggleMenu">
                        <span>PRO BONO CASE STUDIES</span>
                    </a>
                    <a class="navigator-menu-link" href="mailto:info@sasmfos.co.za?subject=Get%20Involved" @click="toggleMenu">
                        <span>GET INVOLVED</span>
                    </a>
                </div>
            </div>
            <div class="navigator-menu-dropdown" :class="{open: active === 'media'}">
                <a class="navigator-menu-link" :class="{active: active === 'media'}" href="#" @click.prevent="toggleDropdown($event)">
                    <span>MEDIA</span>
                </a>
                <div class="navigator-menu-dropdown-sub">
                    <a class="navigator-menu-link" href="/media" @click="toggleMenu">
                        <span>MEDIA RELEASES</span>
                    </a>
                    <a class="navigator-menu-link" href="/media#coverage" @click="toggleMenu">
                        <span>MEDIA COVERAGE</span>
                    </a>
                    <a class="navigator-menu-link" href="/media#opinions" @click="toggleMenu">
                        <span>SASMFOS OPINIONS</span>
                    </a>
                    <a class="navigator-menu-link" href="/media#resources" @click="toggleMenu">
                        <span>MEDIA RESOURCES</span>
                    </a>
                </div>
            </div>
            <div class="navigator-menu-dropdown" :class="{open: active === 'ask'}">
                <a class="navigator-menu-link" :class="{active: active === 'ask'}" href="#" @click.prevent="toggleDropdown($event)">
                    <span>ASK SASMFOS</span>
                </a>
                <div class="navigator-menu-dropdown-sub">
                    <a class="navigator-menu-link" href="/ask" @click="toggleMenu">
                        <span>DIRECTORY OF PROCEDURES</span>
                    </a>
                    <a class="navigator-menu-link" href="/ask#specialists" @click="toggleMenu">
                        <span>DIRECTORY OF SPECIALISTS</span>
                    </a>
                    <a class="navigator-menu-link" href="/ask#enquiries" @click="toggleMenu">
                        <span>CONTACT SASMFOS OFFICE</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        name: "Navigator",
        props: {
            active: String,
            top: {
                type: Number,
                default: 20,
            },
            gap: {
                type: Number,
                default: 0,
            }
        },
        computed: {
            navigatorStyle () {
                return {
                    top: this.top + 'px',
                    right: this.gap + 'px',
                }
            },
            navigatorMenuStyle () {
                return {
                    right: '-' + (300 + this.gap) + 'px',
                }
            }
        },
        data () {
            return {
                open: false,
            }
        },
        methods: {
            toggleMenu () {
                this.open = !this.open;
            },
            toggleDropdown (e) {
                const dropdown = e.currentTarget.parentNode;
                if (dropdown.classList.contains('open')) {
                    this.closeDropdown(dropdown);
                    return;
                }
                this.closeAllDropdowns();
                this.openDropdown(dropdown);
            },
            openDropdown (dropdown) {
                const menu = dropdown.querySelector('.navigator-menu-dropdown-sub');
                const size = this.getDropdownMenuSize(menu);
                dropdown.classList.add('open');
                menu.style.height = size + 'px';
            },
            closeDropdown (dropdown) {
                const menu = dropdown.querySelector('.navigator-menu-dropdown-sub');
                dropdown.classList.remove('open');
                menu.style.height = 0;
            },
            closeAllDropdowns () {
                this.$el.querySelectorAll('.navigator-menu-dropdown').forEach(dropdown => {
                    this.closeDropdown(dropdown);
                });
            },
            getDropdownMenuSize (menu) {
                return menu.querySelectorAll('.navigator-menu-link').length * 55;
            },
            openDefaultMenu () {
                const menu = this.$el.querySelector('.navigator-menu-dropdown.open');
                if (menu) {
                    this.openDropdown(menu);
                }
            },
        },
        mounted () {
            window.addEventListener('click', e => {
                if (!e.path.includes(this.$el)) {
                    this.open = false;
                }
            });
            this.openDefaultMenu();
        }
    }
</script>

<style lang="scss">
    @import '../../sass/public/variables';

    .navigator {
        position: fixed;
        top: 0;
        right: 0;
        z-index: 999;
        max-height: 100%;

        .menu-toggle {
            position: absolute;
            z-index: 5;
            right: 0;
            top: 10px;
            transition: all .6s ease;
            width: 110px;
            height: 40px;
            background: rgba(0,0,0,0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;

            .label {
                color: #fff;
            }


            .menu-toggle-icon {
                position: relative;
                width: 20px;
                height: 14px;
                margin-right: 10px;
                .line {
                    position: absolute;
                    top: 0;
                    width: 100%;
                    height: 2px;
                    background: #fff;
                    border-radius: 20px;
                    box-shadow: 0 0 10px rgba(0,0,0,0.3);

                    &:nth-child(1) {
                        top: 0;
                        transform: rotateZ(0);
                        transition: all .3s ease;
                    }

                    &:nth-child(2) {
                        top: 50%;
                        transform: translateX(0);
                        opacity: 1;
                        visibility: visible;
                        transition: all .3s ease;
                    }

                    &:nth-child(3) {
                        top: 100%;
                        transform: rotateZ(0);
                        transition: all .3s ease;
                    }
                }
            }

            &:hover {
                background: transparentize($light-blue, .3);

                .menu-toggle-icon {
                    .line {
                        transform: rotateZ(180deg) !important;
                    }
                }
            }
        }

        .navigator-menu {
            width: 300px;
            max-height: 80vh;
            overflow: auto;

            @media (min-width: map_get($grid-breakpoints, md)) {
                max-height: none;
            }

            position: absolute;
            right: -300px;
            top: 0;
            transition: all .3s ease;
            box-shadow: none;


            .navigator-menu-link {
                display: flex;
                position: relative;
                height: 55px;
                background: $blue;
                color: #fff;
                align-items: center;
                padding: 0 2em;
                border: 1px $light-blue solid;
                border-top: none;
                text-align: right;

                span {
                    display: block;
                    width: 100%;
                    position: relative;
                    z-index: 1;
                }

                &.active {
                    border-right-width: 10px;
                }

                @media (min-width: map_get($grid-breakpoints, md)) {
                    &:after {
                        background: darken($blue, 5%);
                        position: absolute;
                        right: 0;
                        top: 0;
                        bottom: 0;
                        width: 0;
                        content: '';
                        transition: all .3s ease;
                    }

                    &:hover {
                        &:after {
                            width: 100%;
                        }
                    }

                }
            }

            .navigator-menu-dropdown {
                .navigator-menu-dropdown-sub {
                    overflow: hidden;
                    height: 0;
                    transition: all .3s ease;

                    .navigator-menu-link {
                        //height: 47px;
                        font-size: .9em;
                        padding-left: 4em;
                        background: darken($blue, 10%);
                    }
                }
            }
        }

        &.open {
            .menu-toggle {
                transform: translateX(-250px);
                width: 40px;
                background: transparent;
                .label {
                    display: none;
                }
                .menu-toggle-icon {
                    margin-right: 0;

                    .line {
                        &:nth-child(1) {
                            top: 50%;
                            transform: rotateZ(-45deg);
                        }

                        &:nth-child(2) {
                            top: 50%;
                            transform: translateX(-100%);
                            opacity: 0;
                            visibility: hidden;
                        }

                        &:nth-child(3) {
                            top: 50%;
                            transform: rotateZ(45deg);
                        }
                    }
                }
            }

            .navigator-menu {
                box-shadow: 0 0 15px rgba(0,0,0,0.3);
                right: 0 !important;
            }
        }
    }
</style>
