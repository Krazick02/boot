<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Articulo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../app/productController.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="input-group flex-nowrap">
                        <input type="file" name="imagen" class="form-control" placeholder="Seleccione la imagen">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Nombre</span>
                        <input type="text" name="name" class="form-control" placeholder="Nombre del articulo">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Descripcion</span>
                        <input type="text" name="description" class="form-control" placeholder="Descripcion del articulo">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Caracteristicas</span>
                        <input type="text" name="features" class="form-control" placeholder="Caracteristicas del articulo">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Marca</span>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Selecciona la marca</option>
                            <?php foreach($marcas as $marca): ?>
                                <option value="<?php echo $marca->id; ?>"><?php echo $marca->name; ?></option>
                            <?php endforeach; ?>
                          </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                    <input type="hidden" name="action" value="create">
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="updateProduct" tabindex="-1" aria-labelledby="updateProduct" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Articulo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../../app/productController.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Nombre</span>
                        <input type="text" id="nameU"  name="name" class="form-control" placeholder="">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Descripcion</span>
                        <input type="text" id="descriptionU" name="description" class="form-control" placeholder="">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Caracteristicas</span>
                        <input type="text" id="featuresU" name="features" class="form-control" placeholder="">
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text" id="addon-wrapping">Marca</span>
                        <input type="text" id="brand_idU" name="brand_id" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                    <input type="hidden" name="action" value="update">
                    <input type="hidden" name="objetivo" id="objetivoId">
                </div>
            </form>
        </div>
    </div>
</div>