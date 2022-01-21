<template>
    <div>
        <FullCalendar defaultView="dayGridMonth"
            :plugins="calendarPlugins"
            :events="events"></FullCalendar>
    </div>
</template>
<script>
import FullCalendar from '@fullcalendar/Vue';
import dayGridPlugin from '@fullcalendar/daygrid';

export default {
    components: {
        FullCalendar
    },
    props: {
        calendarEvents: Array,
    },
    computed: {
        events () {
            return this.calendarEvents.map(event => {
                return {
                    title: event.title,
                    start: event.start_date,
                    end: event.end_date,
                    color: event.color,
                    url: event.edit_link,
                }
            });
        }
    },
    data () {
        return {
            calendarPlugins: [dayGridPlugin],
        }
    }
}
</script>
<style lang="scss">

@import '~@fullcalendar/core/main.css';
@import '~@fullcalendar/daygrid/main.css';

</style>
