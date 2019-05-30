// import { Calendar } from '@fullcalendar/core';
// import dayGridPlugin from '@fullcalendar/daygrid';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('datatable', require('./components/dataTable.vue'));
Vue.component('calendar-container', require('./components/calendarContainer.vue'));

window.addEventListener('load', () => {
	let translatorPlugin = {}

	translatorPlugin.install = function (Vue, options) {
		let { translations } = options

		Vue.prototype.$trans = string => _.get(translations, string);
	}

	Vue.use(translatorPlugin, {
		translations: i18n
	})

	const app = new Vue({
	    el: '#app',
	});
})







