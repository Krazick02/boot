<?php 
    include '../../app/productController.php';
    $producto = new ProductosController;
    $productos = $producto->productos();
    
    include '../../public/templates/head.template.php'
?>
<body>
    <?php include '../../public/templates/navBar.template.php'?>

    <div class="container-fluid">
            <?php include '../../public/templates/bar.template.php'?>
            <div class="col">

                <section>
                    <div class="row">
                        <div class="col">
                            <label for="">
                                Productos
                            </label>
                        </div>
                        <div class="col">
                            <button class="btn float-end btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Añadir</button>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <?php foreach($productos as $lista):
                            include '../../public/templates/products.template.php';
                        endforeach; ?>
                    </div>
                </section>
                <!-- Modal -->
                <?php 
                // include '../templates/modal.template.php'
                ?>
                <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Articulo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../../app/productController.php" method="POST">
                        <div class="modal-body">
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
                </div>
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>