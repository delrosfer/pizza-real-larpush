<template>
    <div :v-model="showAlert" class="alert alert-primary alert-dismissible fade show position-absolute top-0 start-100 translate-middle" ondurationchange="400" role="alert">
      <strong>Atención!!</strong> El pedido "{{ order_id }}" ha sido actualizado.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
</template>
<script>

    export default {
        props: ['user_id'],

        data(){
            return {
                showAlert: false,
                order_id: ''
            }    
        },    
        mounted() {
            //window.Echo.channel('notify-pizza.' + this.order_id)
            window.Echo.channel('notify-pizza')
            .listen('OrderStatusChangedEvent', (order) =>
            {
                if (this.user_id == order.user_id) {
                this.showAlert = true
                this.order_id = order.id    
                }
                
            });         
        },
    };
</script>