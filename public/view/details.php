<?php
    include '../../app/AuthController.php';
    include '../../app/BrandController.php';
    include '../../app/productController.php';
    include '../../app/CategoryController.php';
    $brandss = new BrandController;
    $marcas = $brandss->getBrands();
    $categoriess = new CategoryController;
    $categories = $categoriess->getCategories();
    $user = new AuthController; 
    
    if($user->isLogin()){
        header("Location:../../index");
    }


    $producto = new ProductosController;

    $slug = strip_tags($_GET['slug']);

    $productoEspecifico = $producto->spcfP($slug);

    $brand = $productoEspecifico->brand;
    $tags = $productoEspecifico->tags;
    $categories = $productoEspecifico->categories;
    $providers = $productoEspecifico->providers;
    $presentations = $productoEspecifico->presentations;


    include '../../public/templates/head.template.php'
?>

<body>
    <?php include '../../public/templates/navBar.template.php' ?>

    <div class="container-fluid">
        <?php include '../../public/templates/bar.template.php' ?>
        <div class="col">
            <section>
                <div class="col">
                    <div class="row">
                        <div class="col align-self-center text-center">
                            <h3>
                                Producto:
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-sm-5 mb-1 align-items-center">
                            <img src="<?php echo $productoEspecifico->cover ?>" alt="..." style="width:80%;">
                        </div>
                        <div class="col">
                            <div class="row" style="padding:20px 30px 20px 30px;">
                                <?php echo $productoEspecifico->name ?>
                            </div>
                            <div class="row" style="padding:20px 30px 20px 30px;">
                                <?php echo $productoEspecifico->description ?>
                            </div>
                            <div class="row" style="padding:20px 30px 20px 30px;">
                                <?php echo $productoEspecifico->features ?>
                            </div>
                            <?php if (isset($brand)) :
                                echo '
                                    <div class="row">
                                    <div class="row">
                                        Marca:
                                    </div>
                                    <div class="row">
                                            <div class="row">
                                                <div class="col">
                                                    <a href="pBrand?brand=' . $brand->id . '">
                                                    ' . $brand->name . '
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                            endif;

                            if (sizeof($tags) > 0) :
                                echo '<div class="row">
                                        <div class="row">
                                            Etiquetas:
                                        </div>';
                                foreach ($tags as $tag) :
                                    echo '
                                        <div class="col">
                                        <a href="pTag?tag=' . $tag->id . '">
                                                ' . $tag->name . '
                                                </a>
                                        </div>';
                                endforeach;

                                echo '</div>';
                            endif;

                            if (sizeof($categories) > 0) :
                                echo '<div class="row">
                                        <div class="row">
                                            Categorias:
                                        </div>';
                                foreach ($categories as $category) :
                                    echo '
                                        <div class="col">
                                        <a href="pCategoria?categoria=' . $category->id . '">
                                            ' . $category->name . '
                                                </a>
                                        </div>';
                                endforeach;

                                echo '</div>';
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Modal -->
            <?php include '../templates/modal.template.php' ?>
        </div>
    </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>