<template>
    <div class="posts-index">
        <b-button type="is-primary" @click="getPosts">Load Posts</b-button>
        <b-loading :is-full-page="true" :active="loading"></b-loading>
        <ul>
            <li v-for="post in posts">
                {{ post.title }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                posts: [],
                meta: null,
                loading: false,
            }
        },
        methods: {
            getPosts () {
                this.loading = true;

                let currentPage = this.meta ? this.meta.current_page : 0;

                if (this.meta) {
                    currentPage++;
                }

                axios.get(route('api.posts.index', {paginate: 3, page: currentPage})).then(response => {
                    this.posts.push(...response.data.data);
                    this.meta = response.data.meta;
                    this.loading = false;
                });
            }
        },
        mounted () {
            this.getPosts();
        }
    }
</script>

<style scoped>

</style>
