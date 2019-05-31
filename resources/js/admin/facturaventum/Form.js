import AppForm from '../app-components/Form/AppForm';

Vue.component('facturaventum-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                numero:  '' ,
                fecha:  '' ,
                estado:  '' ,
                cliente_id:  '' ,
                usuario_id:  '' ,
                
            }
        }
    }

});