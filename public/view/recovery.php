<?php
include '../../app/config.php';
include '../../app/AuthController.php';
$user = new AuthController; 
    
if(!$user->isLogin()){
    header("Location:".BASE_PATH."public/view/productos");
}
include '../templates/head.template.php'?>

<body>
    <div class="container">
        <section class="cont">
            <div class="row cont justify-content-md-center aling align-items-center">
                <div class="col-md-6 col-sm-12 justify-content-md-center aling align-items-center">
                    <form method="post" action="<?= BASE_PATH?>recovery" enctype="multipart/form-data">
                        <h1 class="text-center">
                            Ingresa tu correo electronico:
                        </h1>
                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="email" name="email" class="form-control" placeholder="Correo" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <P>
                                <I>
                                    Se enviara un correo para la recuperacion de contraseña.
                                </I>
                            </P>
                        </div>
                        <div class="d-grid gap-2 col-3 mx-auto">
                            <button type="submit" class="btn btn-primary">Continuar</button>
                            <input type="hidden" name="action" value="recovery">
                            <input type="hidden" name="super_token" value="<?php echo $_SESSION['super_token'];?>">
                        </div>
                    </form>
                </div>
                <?php include '../templates/footer.template.php'?>
            </div>
        </section>
    </div>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>