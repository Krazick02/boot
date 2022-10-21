<?php
include '../app/AuthController.php';
include '../app/BrandController.php';
include '../app/productController.php';
include '../app/CategoryController.php';
include '../app/TagController.php';
include '../app/PresentationController.php';
$tagss = new TagController();
$tags = $tagss->getTags();
$brandss = new BrandController;
$marcas = $brandss->getBrands();
$categoriess = new CategoryController;
$categories = $categoriess->getCategories();
$user = new AuthController;




$producto = new ProductosController;
$p = new PresentationController;

$slug = strip_tags($_GET['slug']);

$productoEspecifico = $producto->spcfP($slug);

$precentaciones = $p ->precentaciones($productoEspecifico->id);
$brand = $productoEspecifico->brand;
$tags = $productoEspecifico->tags;
$categories = $productoEspecifico->categories;


if ($user->isLogin()) {
    header("Location:../index.php");
} ?>
<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">


<head>

    <meta charset="utf-8" />
    <title>Menu</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="../assets/images/favicon.ico">

    <!-- jsvectormap css -->
    <link href="../assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="../assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <?php include '../assets/templates/css.template.php' ?>


</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- Inicia navbar -->
        <?php include '../assets/templates/navBar.template.php' ?>
        <!-- Termina navbar -->

        <!-- ========== App Menu ========== -->

        <?php include '../assets/templates/sidebar.template.php' ?>
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Product Details</h4>

                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Product Details</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row gx-lg-5">
                                        <div class="col-xl-4 col-md-8 mx-auto">
                                            <div class="product-img-slider sticky-side-div">
                                                <div class="swiper product-thumbnail-slider p-2 rounded bg-light">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <img src="<?= $productoEspecifico->cover?>" alt="" class="img-fluid d-block" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- end col -->

                                        <div class="col-xl-8">
                                            <div class="mt-xl-0 mt-5">
                                                <div class="d-flex">
                                                    <div class="flex-grow-1">
                                                        <h4>Full Sleeve Sweatshirt for Men (Pink)</h4>
                                                        <div class="hstack gap-3 flex-wrap">
                                                            <div><a href="#" class="text-primary d-block">Tommy Hilfiger</a></div>
                                                            <div class="vr"></div>
                                                        </div>
                                                    </div>
                                                    <div class="flex-shrink-0">
                                                        <div>
                                                            <a href="apps-ecommerce-add-product.html" class="btn btn-light" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i class="ri-pencil-fill align-bottom"></i></a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-wrap gap-2 align-items-center mt-3">
                                                    <div class="text-muted fs-16">
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star text-warning"></span>
                                                        <span class="mdi mdi-star text-warning"></span>
                                                    </div>
                                                </div>
                                                <h5>Precentations</h5>
                                                <div class="row">
                                                    <col-sm-4 class="col-md-3">
                                                    <?php 
                                                        foreach($precentaciones as $pres) :?>
                                                        <div class="swiper-slide">
                                                            <div class="nav-slide-item">
                                                                <a href="">
                                                                    <img src="<?= $pres->cover ?>" alt="" class="img-fluid d-block" style="width: 200px;"/>
                                                                </a>    
                                                            </div>
                                                        </div>
                                                        <?php endforeach;?></col-sm-4>
                                                </div>
                                                
                                                <!-- end row -->

                                                <div class="mt-4 text-muted">
                                                    <h5 class="fs-14">Description :</h5>
                                                    <?= $productoEspecifico->description ?>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="mt-3">
                                                            <h5 class="fs-14">Features :</h5>
                                                            <?= $productoEspecifico->features ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!-- end col -->
                                    </div>
                                    <!-- end row -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <script>document.write(new Date().getFullYear())</script> © Velzon.
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end d-none d-sm-block">
                                Design & Develop by Themesbrand
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> © UABCS EQUIPO 3.
                    </div>

                </div>
            </div>
        </footer>
        <!-- END layout-wrapper -->



        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <?PHP include '../assets/templates/js.template.php' ?>

        <!-- apexcharts -->
        <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Vector map-->
        <script src="../assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="../assets/libs/jsvectormap/maps/world-merc.js"></script>

        <!--Swiper slider js-->
        <script src="../assets/libs/swiper/swiper-bundle.min.js"></script>

        <!-- Dashboard init -->
        <script src="../assets/js/pages/dashboard-ecommerce.init.js"></script>

        <!-- App js -->
        <script src="../assets/js/app.js"></script>

        <script>
            function desc(name, target) {
                swal(name, target);
            }
        </script>
</body>


</html>