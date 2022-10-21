
<tr>
  <td>
      <div class="d-flex align-items-center">
          <div class="avatar-sm bg-light rounded p-1 me-2">
            <a href="details.php?slug=<?php echo $lista->slug ?>" style="width:100%;">
              <img src="<?php echo $lista->cover ?>" alt="" class="img-fluid d-block" />
            </a>
          </div>
          <div>
              <h5 class="fs-14 my-1"><a href="details.php?slug=<?php echo $lista->slug ?>" class="text-reset"><?php echo $lista->name?></a></h5>
              <span class="text-muted">24 Apr 2021</span>
          </div>
      </div>
  </td>
  <?php 
                if(isset($lista->brand->name )){
                    echo '<td><h5 class="fs-14 my-1 fw-normal">'.$lista->brand->name.'</h5><span class="text-muted">Marca</span></td>';
                  }else{
                  echo '<td><h5 class="fs-14 my-1 fw-normal">Desconocida</h5><span class="text-muted">Marca</span></td>';
                }
            ?>

  <td>
      <button class="btn btn-primary" onclick="desc('<?php echo $lista->name ?>','<?php echo $lista->description ?>')" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">Description</button>
      
  </td>
</tr>

