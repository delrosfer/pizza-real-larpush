<notifications-order></notifications-order>
<template>
    <li class="nav-item dropdown">
    <a class="nav-link" data-bs-toggle="dropdown" aria-expanded="false" href="#" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
          <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
        </svg>
    <button type="button" class="btn btn-warning">
        <span class=" badge rounded-pill badge-secondary text-dark" v-if="notifications.length > 0">{{ notifications.length }}</span>
    </button>
    
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <li v-for="notification in notifications">
      <a :href="notification.url" class="dropdown-item">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
          <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
        </svg> {{ notification.description }}
        <span class="ml-3 pull-right text-muted text-sm">
            <!--<time-ago refresh long locale="en" :datetime="notification.time"></time-ago>
                <template v-slot="{ timeago }">
                  <span class="text-gray-600 text-sm">
                    {{ timeago }}
                  </span>
                </template>-->
              
        </span>
      </a>
    </li>

    <div class="dropdown-divider"></div>

    <li>
      <div class="text-center">
        <a href="#" class="dropdown-item dropdown-footer" v-if="notifications.length > 0">
          <strong>Consultar todas las notificaciones</strong>
          <i class="fa fa-angle-right"></i>
        </a>
        <div v-else>No hay notificaciones</div>
      </div>
    </li>
  </ul>
</li>    
    
</template>
<script>
import TimeAgo from "vue3-timeago";

    export default {
        name: "app",
        components: {
          TimeAgo
        },
        props: ['user_id'],

        data(){
            return {
                notifications: []
            }    
        },    
        mounted() {
            //window.Echo.channel('notify-pizza.' + this.order_id)
            window.Echo.channel('notify-pizza')
            .listen('OrderStatusChangedEvent', (order) =>
            {
                if (this.user_id == order.user_id) {
                  this.notifications.unshift({
                    description: 'Orden ID: ' + order.id + ' _Actualizado',
                    url: '/order/' + order.id,
                    time: new Date(),
                  })
                }
            });         
        },
    };
</script>