import AppForm from '../app-components/Form/AppForm';

Vue.component('pedido-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                numeroPedido:  '' ,
                estado:  '' ,
                fecha:  '' ,
                proveedor_id:  '' ,
                usuario_id:  '' ,
                
            }
        }
    }

});