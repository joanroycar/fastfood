 
 <script src="{{asset('dist/js/app.js')}}"></script>
 <script src="{{asset('js/snackbar.min.js')}}"></script>
 <script src="{{asset('js/sweetalert2.min.js')}}"></script>

 <script src="{{asset('js/alpine.js')}}"></script>

<script>

    window.addEventListener('noty', event =>{
        Snackbar.show({
            text: event.detail.msg,
            actionText: 'CERRAR',
            actionTextColor: '#fff',
            backgroundColor: event.detail.type == 'success' ? '#2187EC' : '#e7515a',
            pos: 'top-right'

        });
    })


    function destroy(componentName, methodName = 'destroy', rowId){

        swal({
            title: '¿Confirmas eliminar el registro?',
            text: '',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText:'Eliminar',
            confirmButtonColor: '#e7515a',
            cancelButtonText:'Cerrar',
            padding: '2em'

        }).then(function(result){

            if(result.value){
                window.livewire.emitTo(componentName, methodName, rowId)
                swal.close()
            }

        })




    }



</script>