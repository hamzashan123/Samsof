<template>
    <div class="columns sasmfos-values">
        <div class="column" v-for="(item, index) in valueItems" :key="item.title" :class="{ 'is-offset-1' : index === 0 }">
            <h1 class="title is-5" :style="textStyle(item)">
                {{ item.title }}
            </h1>
            <img :src="item.image_url" class="item-image mb-2">
            <hr :style="backgroundStyle(item)">
            <p>
                {{ item.content }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            /* backgroundStyle: 'background-color: ' + this.textColor + ';',
            textStyle: 'color: ' + this.textColor + ';', */
            valueItems: [
                {
                    title: 'Integrity',
                    content: 'To hold ourselves to consistently higher standards by promoting strong moral principles within our association.',
                    image_url: '/images/icons/integrity.svg',
                    textColor: '#f9ac1d',
                },
                {
                    title: 'Transparency',
                    content: 'To encourage openness and accountability, efficiency and effectiveness, to improve our day-to-day activities and how we create and implement our policies.',
                    image_url: '/images/icons/transparency.svg',
                    textColor: '#28b573',
                },
                {
                    title: 'Innovation',
                    content: 'To find the best possible way of adding value to the lives of those who rely on us and by always placing our patients first.',
                    image_url: '/images/icons/innovation.svg',
                    textColor: '#00aac5',
                },
                {
                    title: 'Respect',
                    content: 'To identify and appreciate our strengths and accept our vulnerabilities, to make it easier to truly respect the value of others in our conduct, treating them the way we wish to be treated.',
                    image_url: '/images/icons/respect.svg',
                    textColor: '#056cb6',
                },
                {
                    title: 'Care',
                    content: 'To maintain respectful relations with all our stakeholders and, most of all, to safeguard the well-being of our patients who are at the core of our speciality.',
                    image_url: '/images/icons/care.svg',
                    textColor: '#d3545a',
                }
            ]
        }
    },
    methods: {
        textStyle (item) {
            return {
                color: item.textColor,
            }
        },
        backgroundStyle (item) {
            return {
                backgroundColor: item.textColor,
            }
        }
    }
}
</script>

<style lang="scss">
    .sasmfos-values {
        .title {
            font-family:  'Barlow', sans-serif;
        }
        
        .item-image {
            max-width: 200px;
            max-height: 200px;
        }
    }
</style>

