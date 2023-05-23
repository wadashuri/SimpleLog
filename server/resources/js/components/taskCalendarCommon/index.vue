<script setup>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import { defineProps, ref } from 'vue';

const props = defineProps({
    events: {
        type: Object,
        required: true,
    },
});

const calendarOptions = ref({
    plugins: [dayGridPlugin, interactionPlugin],
    initialView: 'dayGridMonth',
    dateClick: handleDateClick,
    events: props.events.data
});

function handleDateClick(arg) {
    alert('date click! ' + arg.dateStr);
}

</script>
<template>
    <fullCalendar :options="calendarOptions"></fullCalendar>
</template>