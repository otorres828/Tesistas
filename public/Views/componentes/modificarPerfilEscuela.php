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
                <form action="escuela-perfil-modificarClave" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <label >Clave Actual</label>
                            <input class="form-control" name="claveactual" type="password" placeholder="Ingrese su clave actual" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nueva Clave</label>
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

<!-- MODAL MODIFICAR CORREO -->
<div class="modal fade" id="modificarCorreo" tabindex="-1" aria-labelledby="modificarCorreo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar Correo</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="escuela-perfil-modificarCorreo" method="POST" enctype="multipart/form-data">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address">Nueva Correo personal</label>
                            <input class="form-control" type="email" name="correo" placeholder="Ingrese su nuevo correo personal" required>
                        </div>
                    </div>
                    <button name="modificarcorreo" type="submit" class="btn btn-primary" required>Modificar Correo</button>
                    <button type="button" class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </form>
            </div>
        </div>
    </div>
</div>

