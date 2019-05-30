<template>
	<div>
		<!-- <div class="form-group row mb-4">
			<label 
				for="change-language" 
				class="mr-2 col-form-label col-sm-2"
			>
				{{ changeLanguage }}
			</label>
			<select 
				@change="handleLocaleChange" 
				class="custom-select col-sm-2" 
				name="change-language"
			>
				<option 
					v-for="option in localeOptions" 
					:value="option"
				>
					{{ option }}
				</option>
			</select>
		</div> -->
		<!-- {{ $custom('user') }} -->
		<FullCalendar 
			defaultView="dayGridMonth" 
			:plugins="calendarPlugins"
			:weekends="false"
			:events="calendarEvents"
			@dateClick="handleDateClick"
			:editable="true"
			:droppable="true"
			:locale="initialLocaleCode"
			:locales="locales"
			:header="header"
		>
		</FullCalendar>
	</div>
</template>

<script>
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import listPlugin from '@fullcalendar/list'
import interactionPlugin from '@fullcalendar/interaction'
import esLocale from '@fullcalendar/core/locales/es';

export default {
	components: {
		FullCalendar,
	},
	props: {
		'changeLanguage': String, 
		'locale': String
	},
	data() {
		return {
		    calendarPlugins: [ 
		    	dayGridPlugin,
		    	timeGridPlugin,
		    	listPlugin,
		    	interactionPlugin, 
		    ],
		    calendarEvents: [
		    	{ title: 'today event', date: new Date() },
		    	{ title: 'event 1', date: '2019-05-01' },
		    	{ title: 'event 2', date: '2019-05-02', color: 'coral' },
		    ],
		    // localeOptions: [
		    // 	'es',
		    // 	'en',
		    // ],
		    initialLocaleCode: this.locale,
		    locales: [
		    	esLocale
		    ],
		    header: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
			},
		}
	},
	methods: {
		handleDateClick(arg) {
			// if (confirm('Would you like to add an event to ' + arg.dateStr + ' ?')) {
		 //        this.calendarEvents.push({ // add new event data
		 //        	title: 'New Event',
		 //        	start: arg.date,
		 //        	allDay: arg.allDay
		 //        })
			// }
			console.log(arg)
		},
		handleLocaleChange(e) {
			// this.specificLocale = e.target.value
		}
	},
	computed: {
		// specificLocale: {
		// 	get() {
		// 		return this.locale
		// 	},
		// 	set(newLocale) {
		// 		this.locale = newLocale
		// 	}
		// }
	},
	mounted() {
		console.log(this.$trans('strings.change-language'))
	}
}
</script>

<style lang="scss">

@import '~@fullcalendar/core/main.css';
@import '~@fullcalendar/daygrid/main.css';
@import '~@fullcalendar/timegrid/main.css';
@import '~@fullcalendar/list/main.css';

</style>