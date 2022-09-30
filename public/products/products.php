<div class="col-md-3 p-2">
    <div class="card mb-1" style="width: 18rem;">
        <img src="<?php echo $lista->cover ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title text-center"><?php echo $lista->name ?></h5>
            <p class="card-text"><?php echo $lista->description ?></p>
            <div class="row">
                <button type="button" class="btn btn-success">Detalles</button>
                <button type="button" class="btn btn-danger" onclick="alerta(1)">Eliminar</button>
                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addProduct">Editar</button>
            </div>
        </div>
    </div>
</div>