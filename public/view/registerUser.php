<?php 
include '../../app/AuthController.php';
$user = new AuthController; 
    
if(!$user->isLogin()){
    header("Location:../../index.php");
}
include '../templates/head.template.php'
?>

<body>
    <div class="container">
        <section class="cont">
            <div class="row cont justify-content-md-center aling align-items-center">
                <div class="col-md-6 col-sm-12 justify-content-md-center aling align-items-center">
                    <form method="post" action="../../app/AuthController.php" enctype="multipart/form-data">
                        <h1 class="text-center">
                            Registrar nuevo socio:
                        </h1>

                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="name" class="form-control" placeholder="Nombre/s" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="lastname" class="form-control" placeholder="Apellido/s" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="email" name="email" class="form-control" placeholder="Correo" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="phone_number" class="form-control" placeholder="Numero de telefono" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="create_by" class="form-control" placeholder="Creado por:" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="role" class="form-control" placeholder="Rol" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="password" name="password" class="form-control" placeholder="******" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="file" name="imagen" class="form-control"  required>
                            </div>
                        </div>
                        <div class="d-grid gap-2 col-3 mx-auto">
                            <button type="submit" class="btn btn-primary">Continuar</button>
                            <input type="hidden" name="action" value="create">
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