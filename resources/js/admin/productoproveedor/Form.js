import AppForm from '../app-components/Form/AppForm';

Vue.component('productoproveedor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                producto_id:  '' ,
                ofreProveedor_id:  '' ,
                
            }
        }
    }

});