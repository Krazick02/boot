<?php 
include 'app/config.php';
include 'app/AuthController.php';
$user = new AuthController; 
    
if(!$user->isLogin()){
    header("Location:".BASE_PATH."public/view/productos");
}

include 'public/templates/head.template.php'?>
<?php ?>
<body>
    <div class="container">
        <section class="cont">
            <div class="row cont justify-content-md-center aling align-items-center">
                <div class="col-md-6 col-sm-12 justify-content-md-center aling align-items-center">
                    <form method="post" action="<?= BASE_PATH?>auth">
                        <h1 class="text-center">
                            Iniciar sesion
                        </h1>

                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="email" class="form-control" placeholder="Usuario" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="password" name="pwd" class="form-control" placeholder="******" required>
                            </div>
                        </div>
                        
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled">
                            <label class="form-check-label" for="flexSwitchCheckDisabled">Recordar Usuario</label>
                        </div>
                        <div class="d-grid gap-2 col-3 mx-auto">
                            <button type="submit" class="btn btn-primary">Continuar</button>
                            <input type="hidden" name="action" value="access">
                            <input type="hidden" name="super_token" value="<?php echo $_SESSION['super_token'];?>">
                        </div>
                    </form>
                    <div class="row " style="width: 100%;">
                        <div class="text-center col-sm-6"><a class="enlace" href="public/view/registerUser">Registrar</a></div>
                        <div class="text-center col-sm-6"><a class="enlace" href="public/view/recovery">Recuperar Contraseña</a></div>
                    </div>
                </div>
                <?php include 'public/templates/footer.template.php'?>
            </div>
        </section>
    </div>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>