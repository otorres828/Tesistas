

<script>
    $(document).ready(function() {
        $('#profesor').DataTable({
            "language": {
            "lengthMenu": "Mostrar "+
                        `<select>
                        <option value ='5'>5</option>
                        <option value ='10'>10</option>
                        <option value ='25'>25</option>
                        <option value ='50'>50</option>
                        <option value ='100'>100</option>
                        <option value ='-1'>ALL</option>
                        </select>`+
                        " registro por pagina",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate":{
                'next':'siguiente',
                'previous':'anterior'
            }
            },    responsive: true

        });           
    });
    
</script> 