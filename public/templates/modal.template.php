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
                        <input type="text" name="brand_id" class="form-control" placeholder="Marca del articulo">
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