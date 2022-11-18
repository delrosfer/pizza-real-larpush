<template>

    <div class="progress" style="height: 40px;">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" 
           :aria-valuenow="progressPercentage" 
           aria-valuemin="0" 
           aria-valuemax="100"
           :style="`width: ${progressPercentage}%;`">
           <b><h4>{{progressPercentage}}%</h4> </b>
        </div>
    </div> 

    <div class="order-status" align="center">
        <br>
        <strong>Estatus de Orden: </strong><h2 class="text-success"> {{ statusNew }} </h2>
        <br>
        <img src="/img/pizza-hawaiana.gif" alt="delivery" v-if="progressPercentage >= 100">
    </div>
</template>
<script>

    export default {
        props: ['status', 'initial', 'order_id'],

        data(){
            return {
                statusNew: this.status,
                progressPercentage: this.initial
            }    
        },    
        mounted() {
            window.Echo.channel('notify-pizza.' + this.order_id)
            .listen('OrderStatusChangedEvent', (order) =>
            {
            this.statusNew = order.status_name
            this.progressPercentage = order.status_percent
            });         
        },
    };
</script>