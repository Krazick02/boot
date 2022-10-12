<?php

include_once 'config.php';

if (isset($_POST["action"])) {
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST["action"]) {
            case 'create':
                $name = strip_tags($_POST['name']);
                $description = strip_tags($_POST['description']);
                $slug = strip_tags(strtr($_POST['name'], " ", "-"));
                $brand_id = strip_tags($_POST['marca']);
                $brand = new BrandController();
                $brand->createBrand($name, $description, $slug, $brand_id);
                break;
            case 'update':
                $name = strip_tags($_POST['name']);
                $description = strip_tags($_POST['description']);
                $slug = strip_tags(strtr($_POST['name'], " ", "-"));
                $brand = new BrandController();
                $brand->updateBrand($name, $description,$slug);
                break;
            case 'delete':
                $id = strip_tags($_POST['idBrand']);
                $brand = new BrandController();
                $brand->delBrand($id);
                break;
        }
    }
}

include_once 'config.php';
class BrandController
{
    public function getBrands()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);


        $response = json_decode($response);

        if (isset($response->code) &&  $response->code > 0) {
            return $response->data;
        } else {
            return array();
        }
    }
    public function getProducts($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands/' . $id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));


        $response = curl_exec($curl);

        curl_close($curl);


        $response = json_decode($response);

        if (isset($response->code) &&  $response->code > 0) {
            if (isset($response->data->products)) {
                return $response->data->products;
            }
        } else {
            return array();
        }
    }
    public function createBrand($name, $description, $slug)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('name' => $name, 'description' => $description, 'slug' => $slug),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);


        $response = json_decode($response);

        if (isset($response->code) &&  $response->code > 0) {
            header("Location:../public/view/productos?success=true");
        } else {
            header("Location:../public/view/productos?error=true");
        }
    }
    public function delBrand($brand_id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands/' + $brand_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'DELETE',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);


        $response = json_decode($response);

        if (isset($response->code) &&  $response->code > 0) {
            header("Location:../public/view/productos?success=true");
        } else {
            header("Location:../public/view/productos?error=true");
        }
    }

    public function updateBrand($name, $description, $slug)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/brands',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'name=' + $name + '&description=' + $description + '&slug=' + $slug,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);

        curl_close($curl);


        $response = json_decode($response);

        if (isset($response->code) &&  $response->code > 0) {
            header("Location:../public/view/productos?success=true");
        } else {
            header("Location:../public/view/productos?error=true");
        }
    }
}
