import AppForm from '../app-components/Form/AppForm';

Vue.component('detalleventum-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                consecutivo:  '' ,
                totalVenta:  '' ,
                cantidad:  '' ,
                PrecioUnidad:  '' ,
                estado:  '' ,
                facturaVenta_id:  '' ,
                producto_codigo:  '' ,
                
            }
        }
    }

});