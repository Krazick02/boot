<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../layouts/head.template.php"?>    
</head>
<body>
<?php include "../layouts/navbar.template.php"?>    
    <!-- Modal -->
    <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div>
    <div class="container-fluid">
        <?php include "../layouts/sidebar.template.php"?> 
            <div class="col-lg-10">
                <div class="row d-flex flex-row justify-content-between mt-2 border-bottom">
                    <div class="col mt-4 mb-4">
                        <h1>Productos</h1>
                    </div>
                    <div class="col-2"><button class="btn btn-info mb-4 mt-4" data-bs-toggle="modal" data-bs-target="#modalAgregar">Añadir producto</button></div>
                </div>
                <div class="row">
                <div class="col-sm-3 col-md-3 mb-5">
                        <div class="card bg-light " style="width: 20rem;">
                            <img src="../img/img.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title ">Coquita</h5>
                                <p class="card-text ">Coquita Helada</p>
                                <div class="row">
                                    <div class="col">
                                        <a href="#" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#modalAgregar">Editar</a>
                                    </div>

                                    <div class="col">
                                        <a href="#" class="btn btn-danger w-100" onclick="remove(this)">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <?php include "../layouts/scripts.template.php"?>
    <script src="public/js/main.js"></script>  
</body>
</html>