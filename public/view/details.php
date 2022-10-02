<?php
include '../../app/productController.php';
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
                <div class="row">
                    <div class="col">
                        <label for="">
                            Productos
                        </label>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="row align-items-center">
                        <img src="<?php echo $productoEspecifico->cover ?>" alt="..."  style="height: 300px; width: 400px;">
                    </div>
                    <div class="row">
                        <div class="row">
                            <?php echo $productoEspecifico->name ?>
                        </div>
                        <div class="row">
                            <?php echo $productoEspecifico->description ?>
                        </div>
                        <div class="row">
                            <?php echo $productoEspecifico->features ?>
                        </div>
                        <?php if (isset($brand)) :
                            echo '
                                    <div class="row">
                                    <div class="row">
                                        Brand:
                                    </div>
                                    <div class="row">
                                            <div class="row">
                                                <div class="col">
                                                    ' . $brand->name . '
                                                </div>
                                                <div class="col">
                                                    ' . $brand->description . '
                                                </div>
                                                <div class="col">
                                                    ' . $brand->slug . '
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                        endif;

                        if (isset($tags)):
                            echo '<div class="row">
                                        <div class="row">
                                            Tags:
                                        </div>';
                            foreach ($tags as $tag) :
                                echo '
                                        <div class="col">
                                            ' . $tag->name . '
                                        </div>';
                            endforeach;

                            echo '</div>';
                        endif;

                        if (isset($categories)):
                            echo '<div class="row">
                                        <div class="row">
                                            Categories:
                                        </div>';
                            foreach ($categories as $category) :
                                echo '
                                        <div class="col">
                                            ' . $category->name . '
                                        </div>';
                            endforeach;

                            echo '</div>';
                        endif;
                        ?>
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