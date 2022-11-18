
import './bootstrap';
import { createApp } from 'vue';

import OrderProgress from './components/OrderProgress.vue'
import OrderAlert from './components/OrderAlert.vue'
import OrderNotifications from './components/OrderNotifications.vue'
//Vue.component('progress-order', () => import('./components/OrderProgress.vue'));


const app = createApp({
	el: '#app',
	mounted(){
		window.Echo.channel('notify-pizza')
		.listen('OrderStatusChangedEvent', (e) =>
		{
			console.log('OMG lo lograste')
		}); 			
	}
});

app.component('progress-order', OrderProgress);
app.component('alert-order', OrderAlert);
app.component('notifications-order', OrderNotifications);
app.mount('#app');
