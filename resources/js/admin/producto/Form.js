import AppForm from '../app-components/Form/AppForm';

Vue.component('producto-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                codigo:  '' ,
                nombre:  '' ,
                unidad:  '' ,
                precioP:  '' ,
                estado:  '' ,
                existencia:  '' ,
                tipo:  '' ,
                
            }
        }
    }

});