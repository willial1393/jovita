import AppForm from '../app-components/Form/AppForm';

Vue.component('ofreproveedor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                identificacion:  '' ,
                descuento:  '' ,
                estado:  '' ,
                unidad:  '' ,
                precio:  '' ,
                proveedor_id:  '' ,
                insumo_id:  '' ,
                
            }
        }
    }

});