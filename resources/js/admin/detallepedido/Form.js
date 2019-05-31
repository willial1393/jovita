import AppForm from '../app-components/Form/AppForm';

Vue.component('detallepedido-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                consecutivo:  '' ,
                cantidad:  '' ,
                valorTotal:  '' ,
                estado:  '' ,
                pedido_id:  '' ,
                producto_codigo:  '' ,
                
            }
        }
    }

});