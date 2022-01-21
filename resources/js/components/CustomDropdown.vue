<template>
    <div class="custom-dropdown">
        <input type="hidden" :name="name" v-if="name" :value="selected">
        <a class="custom-dropdown-control"
           :class="{open: open}"
           :style="controlStyle"
           href="#"
           @click.prevent.capture.stop="toggleMenu">

            <div class="custom-dropdown-control-gradient" v-if="!flat"></div>
            <div class="custom-dropdown-control-content">
                <span class="placeholder">{{ selectedPlaceholder }}</span>
                <span class="caret"><fa icon="caret-down"></fa></span>
            </div>

        </a>

        <transition name="custom-menu-transition">
            <div class="custom-dropdown-menu" v-if="open" @click.stop>
                <div class="custom-dropdown-menu-filter" v-if="withFilter">
                    <div class="field has-addons">
                        <div class="control is-expanded">
                            <input type="text" placeholder="Filter..." class="input" v-model="filter" @keydown.esc="clearFilter">
                        </div>
                        <div class="control" v-if="filter.length > 0">
                            <button class="button is-danger" @click="clearFilter"><fa :icon="['fas', 'times']"></fa></button>
                        </div>
                    </div>
                </div>
                <div class="custom-dropdown-menu-items">
                    <div class="custom-dropdown-menu-item" v-for="option in filteredOptions"
                         :class="{active: value === option.value}" :key="option.value">
                        <template v-if="option.label">
                            <span class="custom-dropdown-menu-label">{{ option.title }}</span>
                        </template>
                        <template v-else>
                            <a class="custom-dropdown-menu-link" href="#" @click.prevent.self="selectOption(option)">{{ option.title }}</a>
                        </template>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</template>

<script>
    export default {
        props: {
            value: null,
            placeholder: String,
            name: String,
            flat: Boolean,
            bgColor: String,
            fgColor: String,
            options: {
                type: null,
                default: [],
            },
            withFilter: Boolean,
            showSelected: Boolean,
            closeOnSelect: {
                type: Boolean,
                default: true,
            }
        },
        data () {
            return {
                filter: '',
                open: false,
                selected: this.options.length && this.value ? this.options.filter(option => {
                    return option.value === this.value
                })[0] : null,
            }
        },
        computed: {
            filteredOptions () {
                if (this.filter.length === 0) {
                    return this.options;
                }

                return this.options.filter(option => {
                    if (!option.label) {
                        return option.title.toLowerCase().includes(this.filter.toLowerCase());
                    }
                });
            },
            selectedPlaceholder () {
                if (this.showSelected && this.selected && this.selected.value !== null) {
                    return this.selected.title;
                }
                return this.placeholder;
            },
            controlStyle () {
                let style = {};

                if (this.bgColor) {
                    style['background'] = this.bgColor;
                }
                if (this.fgColor) {
                    style['color'] = this.fgColor;
                }

                return style;
            }
        },
        methods: {
            closeMenu () {
                this.open = false;
            },
            toggleMenu () {
                document.querySelectorAll('.custom-dropdown-control.open').forEach(dropdown => {
                    dropdown.click();
                });

                this.open = !this.open;

                if (this.open) {
                    setTimeout(() => {
                        this.$el.querySelector('.input').focus();
                    }, 100);
                }
            },
            clearFilter () {
                this.filter = '';
            },
            selectOption (key) {
                this.$emit('input', key.value);
                this.selected = key;

                if (this.closeOnSelect) {
                    this.closeMenu();
                }
            },
            clearSelection () {
                this.$emit('input', null);
                this.selected = null;

                if (this.closeOnSelect) {
                    this.closeMenu();
                }
            }
        },
        mounted () {
            document.addEventListener('click', (e) => {
                e.stopPropagation();
                this.closeMenu();
            });
        }
    }
</script>

<style lang="scss">
    @import '../../sass/public/variables';

    .custom-dropdown {

        $custom-dropdown-bg: $light-blue !default;
        $custom-dropdown-bg-hover: darken($light-blue, 5%) !default;
        $custom-dropdown-bg-pressed: darken($light-blue, 5%) !default;
        $custom-dropdown-menu-active-bg: $light-blue !default;

        position: relative;
        margin: .5em 0;

        .custom-dropdown-control {
            padding: .5em 1em;
            //background: $custom-dropdown-gradient;
            background: $custom-dropdown-bg;
            border-radius: 4px;
            color: #fff;
            text-decoration: none;
            position: relative;
            display: block;
            overflow: hidden;
            border: 1px rgba(0,0,0,0.1) inset;
            transition: all .3s ease;

            .custom-dropdown-control-gradient {
                transition: all .3s ease;
                background: linear-gradient(transparent, rgba(0,0,0,0.3));
                position: absolute;
                z-index: 2;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
            }

            .custom-dropdown-control-content {
                position: relative;
                z-index: 2;
                display: flex;
            }

            .placeholder {
                font-weight: bold;
                flex: 1 1 100%;
                text-shadow: 1px 1px 0 rgba(0,0,0,0.2);
                padding-right: 1em;
            }

            .caret {
                flex: 0 0 25px;
            }

            &:after {
                content: '';
                position: absolute;
                left: 0;
                right: 0;
                top: 0;
                bottom: 0;
                z-index: 1;
                transition: all .3s ease;
            }

            &:hover {
                &:after {
                    background: rgba(0,0,0,0.1);
                }
            }

            &.open {
                &:after {
                    background: rgba(0,0,0,0.1);
                }
                .custom-dropdown-control-gradient {
                    background: linear-gradient(rgba(0,0,0,0.3), transparent);
                }

                > .placeholder {
                    text-shadow: -1px -1px 0 rgba(0,0,0,0.2);
                }
            }
        }

        .custom-dropdown-menu-filter {
            padding: 0.5em 1em;
            border-bottom: 1px #eee solid;
            margin-bottom: .5em;
        }

        .custom-dropdown-menu {
            position: absolute;
            left: 0;
            background: #fff;
            border: 1px solid #ddd;
            min-width: 300px;
            width: 100%;
            z-index: 999;

            border-radius: 4px;
            top: calc(100% + 2px);
            padding: .4em 0;
            box-shadow: 2px 3px 25px rgba(0,0,0,0.2);
            list-style: none;
            margin: 0;
        }

        .custom-dropdown-menu-link {
            display: block;
            padding: .3em 1em;
            color: #333;

            &:hover {
                background: #f4f4f4;
            }
        }

        .custom-dropdown-menu-label {
            display: block;
            padding: .3em 1em;
            border-top: 1px #eee solid;
            color: $primary;
            font-weight: bold;
            margin-top: .7em;
        }

        .custom-dropdown-menu-items {
            max-height: 15em;
            overflow: auto;
        }

        .custom-dropdown-menu-item {
            display: block;
            margin-bottom: .1em;

            &.active {
                .custom-dropdown-menu-link {
                    background: $custom-dropdown-menu-active-bg;
                    color: #fff;
                }
            }
        }

        .custom-menu-transition {
            &-enter-active, &-leave-active {
                transition: all .3s ease;
                overflow: hidden;
            }

            &-enter, &-leave-to {
                transform: translateY(-10px);
                opacity: 0;
            }

            &-leave, &-enter-to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    }
</style>
