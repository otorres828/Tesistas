<!-- MODAL MODIFICAR CLAVE -->
<div class="modal fade" id="modificarClave" tabindex="-1" role="dialog" aria-labelledby="modificarClave" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modificar Clave</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="tesista-perfil-modificarClave" method="POST" enctype="multipart/form-data">                                                       
                    <div class="col-sm-12 mb-3">
                        <div class="form-group">
                            <label for="clave actual">Clave Actual</label>
                                <input  class="form-control" name="claveactual" type="password"placeholder="Ingrese su clave actual"required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address">Nueva Clave</label>
                            <input  class="form-control" name="nuevaclave"type="password" placeholder="Ingrese su nueva clave" required>
                        </div>
                    </div> 
                    <button name="modificarclave" type="submit" class="btn btn-primary" required>Modificar Clave</button>
                    <button type="button"  class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
   
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
<!-- MODAL MODIFICAR CORREO -->
<div class="modal fade" id="modificarCorreo" tabindex="-1" aria-labelledby="modificarCorreo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modificar Correo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="tesista-perfil-modificarCorreo" method="POST" enctype="multipart/form-data">                                                       
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address">Nueva Correo personal</label>
                            <input  class="form-control" type="email" name="correo"placeholder="Ingrese su nuevo correo personal"required>
                        </div>
                    </div> 
                    <button name="modificarcorreo" type="submit" class="btn btn-primary" required>Modificar Correo</button>
                    <button type="button"  class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        
                </form>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL MODIFICAR TELEFONO -->
<div class="modal fade" id="modificarTelefono" tabindex="-1" aria-labelledby="modificarTelefono" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modificar Telefono</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="tesista-perfil-modificarTelefono" method="POST" enctype="multipart/form-data">                                                       
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address">Nuevo Telefono</label>
                            <input  class="form-control" type="text" name="telefono"placeholder="Ingrese su nuevo numero de Telefono"required>
                        </div>
                    </div> 
                    <button name="modificartelefono" type="submit" class="btn btn-primary" required>Modificar Telefono</button>
                    <button type="button"  class="ml-1 btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        
                </form>
            </div>
            </div>
        </div>
    </div>
</div>