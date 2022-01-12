<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.tblscroll').niceScroll({
            cursorcolor: "#515365",
            cursorwidth: "30px",
            backgroud: "rgba(20,20,20,0.3)",
            cursorborder: "0px",
            cursorborderradius: 3,
        })
    })
    function Confirm(id, eventName, text){
        swal({
            title:'CONFIRMAR',
            text: text,
            type: 'warning',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff',
            confirmButtonColor: '#553d34',
            confirmButtonText: 'Aceptar'
        }).then(function(result){
            if(result.value){
                window.livewire.emit(eventName, id)
                swal.close()
            }
        })
    }
</script>