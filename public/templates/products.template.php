<div class="col-md-4 col-lg-3 col-sm-6 p-2">
    <div class="card text-center presentacion mb-2">
        <a href="details.php?slug=<?php echo $lista->slug ?>" style="width:100%;">
            <img src="<?php echo $lista->cover ?>" class="card-img-top" alt="...">
        </a>
        <div class="card-body">
            <p class="card-title text-center" style="
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 25px;
            "><b><?php echo $lista->name?></b> </p>
            <?php 
                if(isset($lista->brand->name )){
                    echo '<p class="card-text ">'.$lista->brand->name.'</p>';
                }
            ?>

            <div class="accordion accordion-flush" id="accordionFlushExample<?php echo $lista->id ?>">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne<?php echo $lista->id ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                      Descripcion
                    </button>
                  </h2>
                  <div id="flush-collapseOne<?php echo $lista->id ?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body"><?php echo $lista->description ?></div>
                  </div>
                </div>
            </div>

            <p class="card-text"></p>
            
            <div class="row">
                <button type="button" style="margin:10px 10px 10px 10px;" class="btn col btn-warning" data-bs-toggle="modal" data-bs-target="#updateProduct" onclick="llenarDatos('<?php echo $srt ?>');">Editar</button>
                <button type="button" style="margin:10px 10px 10px 10px;" class="btn col btn-success"><a class="dropdown-item" href="details.php?slug=<?php echo $lista->slug ?>">Detalles</a></button>
                <button type="button" style="margin:10px 10px 10px 10px;" class="btn col btn-danger" onclick="alerta('<?php echo $lista->id ?>')">Eliminar</button>
            </div>
        </div>
    </div>
</div>