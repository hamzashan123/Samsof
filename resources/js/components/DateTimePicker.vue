<template>
    <div>
        <div class="columns">
            <div class="column">
                <b-field>
                    <b-datepicker
                        placeholder="Select a date..."
                        icon="calendar-today"
                        :name="fieldName + '_date'"
                        :date-formatter="dateFormatter"
                        :date-parser="dateParser"
                        v-model="oldDate"
                        editable></b-datepicker>
                </b-field>
            </div>
        </div>
        <div class="columns" v-if="timeActive === true">
            <div class="column">
                <b-field>
                    <b-timepicker
                        placeholder="Select a time..."
                        icon="clock"
                        v-model="oldDate"
                        :name="fieldName + '_time'"
                        editable>
                    </b-timepicker>
                </b-field>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        selectedDate: String,
        timeActive: Boolean,
        fieldName: String,
    },
    data () {
        return {
            oldDate: new Date(this.selectedDate),
        }
    },
    methods: {
        dateFormatter (date) {
            if (date) {
                return date.getFullYear() + '-' + (date.getMonth() + 1).toString().padStart(2, '0') + '-' + date.getDate().toString().padStart(2, '0')
            }
            return ''
        },
        dateParser (date) {
            if (date) {
                const s = date.split('-')
                if (s.length === 3) {
                return new Date(parseInt(s[0], 10), 0, 0, 0, 0, parseInt(s[1], 10) - 1, parseInt(s[2], 10))
                }
                return null
            }
            return null
        },
    }
}
</script>