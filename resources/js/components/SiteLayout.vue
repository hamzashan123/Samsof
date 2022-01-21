<template>
    <div class="site-layout">
        <div class="sidebar" :class="{ 'open' : sidebarState }">
            <nav>
                <div class="columns">
                    <div class="column">
                        <div class="has-text-centered has-text-grey">
                            <b-icon icon="account-circle" size="is-large"></b-icon>
                            <h1>
                                {{ username }}
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <b-menu class="is-dark">
                            <b-menu-list label="administrator">
                                <b-menu-item icon="home" label="Dashboard" href="/admin" :active="active === 'dashboard'"></b-menu-item>
                                <b-menu-item icon="account-group" label="Staff" :href="route('admin.staff.index')" :active="active === 'staff'"></b-menu-item>
                                <b-menu-item icon="newspaper" label="Media Releases" :href="route('admin.releases.index')" :active="active === 'media-releases'"></b-menu-item>
                                <b-menu-item icon="video-vintage" label="Media Coverage" :href="route('admin.coverages.index')" :active="active === 'media-coverage'"></b-menu-item>
                                <b-menu-item icon="volume-high" label="SASMFOS Opinions" :href="route('admin.opinions.index')" :active="active === 'opinions'"></b-menu-item>
                                <b-menu-item icon="calendar" label="Events" href="/admin/events" :active="active === 'events'"></b-menu-item>
                                <b-menu-item icon="bullhorn" label="Announcements" href="/admin/announcements" :active="active === 'announcements'"></b-menu-item>
                            </b-menu-list>
                            <b-menu-list label="Media">
                                <b-menu-item icon="image-multiple" label="Photos" :href="route('admin.photos.index')" :active="active === 'photos'"></b-menu-item>
                                <b-menu-item icon="file-pdf" label="Documents" :href="route('admin.documents.index')" :active="active === 'documents'"></b-menu-item>
                                <b-menu-item icon="filmstrip" label="Videos" :href="route('admin.videos.index')" :active="active === 'videos'"></b-menu-item>
                                <b-menu-item icon="image-multiple" label="Post Images" :href="route('admin.images.index')" :active="active === 'images'"></b-menu-item>
                            </b-menu-list>
                            <b-menu-list label="members">
                                <b-menu-item icon="account-card-details" label="All Members" :href="route('admin.members.index')" :active="active === 'members'"></b-menu-item>
                                <b-menu-item icon="account-card-details" label="Hospitals" :href="route('admin.hospitals.index')" :active="active === 'hospitals'"></b-menu-item>
                                <b-menu-item icon="account-card-details" label="Cities" :href="route('admin.cities.index')" :active="active === 'cities'"></b-menu-item>
                                <b-menu-item icon="account-card-details" label="Countries" :href="route('admin.countries.index')" :active="active === 'countries'"></b-menu-item>
                            </b-menu-list>
                        </b-menu>
                        <hr>
                        <form method="post" :action="route('admin.logout')">
                            <input type="hidden" name="_token" :value="csrfToken">
                            <b-button class="is-block is-fullwidth has-text-left" icon-left="lock" label="Logout" native-type="submit"></b-button>
                        </form>

                    </div>
                </div>
            </nav>
        </div>
        <div class="menu-button has-background-light">
            <section class="section">
                <div>
                    <div class="menu-toggle-button" @click="toggleSidebarState">
                        <div class="menu-line has-background-grey"></div>
                        <div class="menu-line has-background-grey"></div>
                        <div class="menu-line has-background-grey"></div>
                    </div>
                </div>
            </section>
        </div>
        <div class="page-container">
            <div class="page" :class="{ 'open' : sidebarState }">
                <slot name="page"></slot>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        username: String,
        active: String,
    },
    data () {
        return {
            sidebarState: false,
        }
    },
    computed: {
        csrfToken () {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    },
    methods: {
        storeSidebarState (open = false) {
            localStorage.setItem('sidebar-state', open ? '1' : '0');
        },
        getSidebarState () {
            return localStorage.getItem('sidebar-state') === '1';
        },
        toggleSidebarState () {
            this.sidebarState = !this.sidebarState;
            this.storeSidebarState(this.sidebarState);
        }
    },
    mounted () {
        this.sidebarState = this.getSidebarState();
    }
}
</script>
<style lang="scss">
@import "../../sass/admin/variables";
    .site-layout {
        width: 100%;
        min-height: 100vh;
        display: flex;

        .sidebar {
            flex: 0 0 0;
            padding: 20px;
            display: none;
            transition: all .3s ease;
            box-shadow: inset -8px 0px 6px 0px rgba(0, 0, 0, 0.1);

            @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                flex: 0 0 240px;
            }

            &.open {
                flex: 0 0 calc(100% - 70px);
                display: block;

                @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                    flex: 0 0 250px;
                }
            }
        }

        .menu-button {
            flex: 0 0 70px;

            .menu-toggle-button {
                cursor: pointer;

                .menu-line {
                    width: 100%;
                    height: 3px;
                    margin: 5px 0;
                }

                &:hover {
                    .menu-line {
                        background-color: $secondary;
                    }
                }
            }
        }

        .page-container {
            flex: 1 1 100%;
            .page {
                display: block;

                &.open {
                    display: none;

                    @media only screen and (min-width: map_get($grid-breakpoints, md)) {
                        display: block;
                    }
                }
            }
        }
    }
</style>

