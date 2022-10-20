<?php
include '../app/AuthController.php';
include '../app/BrandController.php';
include '../app/productController.php';
include '../app/CategoryController.php';
include '../app/TagController.php';


$producto = new ProductosController;
$productos = $producto->productos();
$brandss = new BrandController;
$marcas = $brandss->getBrands();
$categoriess = new CategoryController;
$categories = $categoriess->getCategories();
$user = new AuthController;


$tagss = new TagController();
$tags = $tagss->getTags();


if ($user->isLogin()) {
    header("Location:../index.php");
}
include '../assets/templates/head.template.php'
?>

<body>
    <?php include '../assets/templates/navBar.template.php' ?>

    <div class="container-fluid">
        <?php include '../assets/templates/bar.template.php' ?>
        <div class="col-md-10 col-lg-10 col-sm-12">
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
                    <?php foreach ($productos as $lista) :
                        $srt = $lista->name . '||' . $lista->description . '||' . $lista->features . '||' . $lista->brand_id . '||' . $lista->id;
                        include '../assets/templates/products.template.php';
                    endforeach; ?>
                    <!-- botonera crud -->
                    <div class="row">
                <button type="button" style="margin:10px 10px 10px 10px;" class="btn col btn-warning" data-bs-toggle="modal" data-bs-target="#updateProduct" onclick="llenarDatos('<?php echo $srt ?>');">Editar</button>
                <button type="button" style="margin:10px 10px 10px 10px;" class="btn col btn-success"><a class="dropdown-item" href="details.php?slug=<?php echo $lista->slug ?>">Detalles</a></button>
                <button type="button" style="margin:10px 10px 10px 10px;" class="btn col btn-danger" onclick="alerta('<?php echo $lista->id ?>','<?php echo $_SESSION['super_token'] ?>')">Eliminar</button>
            </div>
                </div>
            </section>
            <!-- Modal -->
            <?php
            include '../assets/templates/modal.template.php'
            ?>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>