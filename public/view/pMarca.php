<?php 
    include '../../app/productController.php';
    $producto = new ProductosController;
    if(isset($_GET['categoria'])){
        $objt = strip_tags(strtr($_GET['categoria']," ","-"));
        $productos = $producto->cat($objt);
    }else{

    }
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
                            Categoria:
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <?php foreach($productos as $lista):
                            $srt = $lista->name.'||'.$lista->description.'||'.$lista->features.'||'.$lista->brand_id.'||'.$lista->id;
                            include '../../public/templates/products.template.php';
                        endforeach; ?>
                    </div>
                </section>
                <!-- Modal -->
                <?php 
                include '../templates/modal.template.php'
                ?>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>