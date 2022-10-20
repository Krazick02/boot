function alerta(n, sptkn) {
    Swal.fire({
        title: 'Estas seguro?',
        text: "No podras deshacer esta accion!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: `Eliminar!`
    }).then((result) => {
        if (result.isConfirmed) {
            var data = new FormData();
            data.append('idEliminar', n);
            data.append('action', 'delete');
            data.append('super_token', sptkn);
            axios({
                method: "POST",
                url: "../../app/productController.php",
                data
            }).then((response) => {
                if (response.status === 200) {
                    Swal.fire(
                        'Eliminado!',
                        'El producto fue eliminado exitosamente.',
                        'success'
                    );
                    location.reload();
                } else {
                    Swal.fire(
                        'Fallo!',
                        'El producto no pudo ser eliminado.',
                        'fail'
                    );
                }
            }).catch((error) => {
                if (error.response) {
                    alert('o');
                }
            });
        }
    })
}

function llenarDatos(datos) {
    data = datos.split('||');

    console.log(data);
    document.getElementById('nameU').value = data[0];
    document.getElementById('descriptionU').value = data[1];
    document.getElementById('featuresU').value = data[2];
    document.getElementById('numeral').value = data[4];

};