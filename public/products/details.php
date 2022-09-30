<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '/xampp/htdocs/IDSTV/boot/public/templates/head.template.php'?>
</head>

<body>
    <?php include '/xampp/htdocs/IDSTV/boot/public/templates/navBar.template.php'?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2 d-sm-block d-none text-bg-dark sitebar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Ansssother action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                    <!-- <button class="btn btn-info" onclick="traeAvatarGithub()">
                        Ver tu avatar de Github
                    </button> -->
                </ul>
            </div>
            <div class="col">

                <section>
                    <div class="row">
                        <div class="col">
                            <label for="">
                                Productos
                            </label>
                        </div>
                        <!-- <div class="col">
                            <button class="btn float-end btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Añadir</button>
                        </div> -->
                    </div>
                </section>
                <section>
                    <div class="row">
                            <div class="col-md-3 col-sm-2">
                                <div class="card" style="width: 18rem;">
                                    <img src="/img/poke.png" class="card-img-top" alt="poke.png">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <button type="button" class="btn btn-success">Detalles</button>
                                        <button type="button" class="btn btn-danger" onclick="alerta(1)">Eliminar</button>
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addProduct">Editar</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </section>
                <!-- Modal -->
                <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="addProduct" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="">

                                <div class="modal-body">
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                    <div class="input-group flex-nowrap">
                                        <span class="input-group-text" id="addon-wrapping">@</span>
                                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">

        function alerta(n){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            })
        }
        
            function traeAvatarGithub(){
                Swal.fire({
                title: 'Submit your Github username',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Look up',
                showLoaderOnConfirm: true,
                preConfirm: (login) => {
                    return fetch(`//api.github.com/users/${login}`)
                    .then(response => {
                        if (!response.ok) {
                        throw new Error(response.statusText)
                        }
                        return response.json()
                    })
                    .catch(error => {
                        Swal.showValidationMessage(
                        `Request failed: ${error}`
                        )
                    })
                },
                allowOutsideClick: () => !Swal.isLoading()
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                    title: `${result.value.login}'s avatar`,
                    imageUrl: result.value.avatar_url
                    })
                }
                })
            };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>