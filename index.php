<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '/xampp/htdocs/IDSTV/boot/public/templates/head.template.php'?>
</head>
<body>
    <div class="container">
        <section class="cont">
                <div class="row cont justify-content-md-center aling align-items-center">
                <div class="col-md-6 col-sm-12">
                    <form method="post" action="/idstv/boot/app/AuthController.php">
                        <h1 class="text-center">
                            Acceso
                        </h1>

                        <div class="mb-3">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="email" class="form-control" placeholder="Username">
                            </div>
                        </div>
                        <div class="mb-3">

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="password" name="pwd" class="form-control" placeholder="******">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Iniciar Seción</button>
                        <input type="hidden" name="action" value="access">
                    </form>
                </div>
            </div>
        </section>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>