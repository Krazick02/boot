function alerta(n) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '<a class="dropdown-item" href="eliminar.php?idEliminar=' + n + '">Yes, delete it!</a>'
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

function llenarDatos(datos) {
    data = datos.split('||');

    console.log(data);
    document.getElementById('nameU').value = data[0];
    document.getElementById('descriptionU').value = data[1];
    document.getElementById('featuresU').value = data[2];
    document.getElementById('brand_idU').value = data[3];
    document.getElementById('objetivoId').value = data[4];
};