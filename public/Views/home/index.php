<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/estilos.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    
    <title>Contactanos</title>

</head>
<body>
   
<div class="container">
        <div class="row">
        <div class="col card px-5">
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="example">
                        <div  class = "mb-3" >
                            <div  class = "btn btn-primary "  data-bs-toggle="modal" data-bs-target="#crear" data-bs-whatever="@mdo" > Crear Actor </div>
                        </div>
                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($contactanos as $actor){ ?>
                                <tr>
                                    <td><?php echo $actor['id'] ?></td>
                                    <td><?php echo $actor['name'] ?></td>
                                    <td width="10px" class="d-flex">
                                        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?php echo $actor['id']?>" data-bs-whatever="@mdo">Editar 📝</a>
                                        <form class="destroy"action="../logica/actorSave.php?idactor=<?php echo $actor['id']?>" method="POST">
                                            <button type="submit"class="btn btn-danger ml-1">Eliminar 🗑️</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "language": {
                "lengthMenu": "Mostrar "+
                            `<select>
                            <option value ='3'>3</option>
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
                "infoEmpty": "No records available",
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

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
            $('.destroy').submit(function(e){
                e.preventDefault();
                Swal.fire({
                title: '¿Estas Seguro?',
                text: "que quieres eliminar este Actor!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'

                }).then((result) => {
                    if (result.isConfirmed) {
                    Swal.fire(
                    'Eliminado!',
                    'El actor ha eliminado con exito',
                    'success'
                    )
                    this.submit();
                }
            })
            });
    </script>


</body>
</html>
