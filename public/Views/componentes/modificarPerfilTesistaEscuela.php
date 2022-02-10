<!-- MODAL MODIFICAR CLAVE -->
<div class="modal fade" id="modificarClave" tabindex="-1" role="dialog" aria-labelledby="modificarClave" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar Clave</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="escuela-tesistas-mostrar-tesista" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input hidden name="cedula"value="<?php echo $propuesta['cedula'];?>">
                            <label for="address">Nueva Clave</label>
                            <input class="form-control" name="nuevaclave" type="password" placeholder="Ingrese su nueva clave" required>
                        </div>
                    </div>
                    <button name="modificarclave" type="submit" class="btn btn-primary" required>Modificar Clave</button>
                    <button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>


