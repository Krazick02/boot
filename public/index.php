<?php 
    include '../app/productController.php';
    $producto = new ProductosController;
    $productos = $producto->productos();
    
    include '../public/templates/head.template.php'
?>
<body>
    <?php include '../public/templates/navBar.template.php'?>

    <div class="container-fluid">
            <?php include '../public/templates/bar.template.php'?>
            <div class="col">

                <section>
                    <div class="row">
                        <div class="col">
                            <label for="">
                                Productos
                            </label>
                        </div>
                        <!-- <div class="col">
                            <button class="btn float-end btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Añadir</button>
                        </div> -->
                    </div>
                </section>
                <section>
                <div class="row">
                <?php foreach($productos as $lista):?> 
                    <div class="col-md-3 p-2">
                        <div class="card mb-1" style="width: 18rem;">
                        <img src="<?php echo $lista->cover ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $lista->name ?></h5>
                            <p class="card-text"><?php echo $lista->description ?></p>
                            <div class="row">
                                <button type="button" class="btn btn-success">Detalles</button>
                                <button type="button" class="btn btn-danger" onclick="alerta(1)">Eliminar</button>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addProduct">Editar</button>
                            </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    </div>
                </section>
                <!-- Modal -->
                <?php include 'templates/modal.template.php'?>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>