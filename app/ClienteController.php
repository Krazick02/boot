<?php

include_once 'config.php';

if (isset($_POST["action"]) && isset($_POST["email"])) {
    // var_dump($_POST['super_token']+$_SESSION['super_token']);
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {

        switch ($_POST["action"]) {
            case 'create':
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);
                $phone_number = strip_tags($_POST['phone_number']);
                $password = strip_tags($_POST['password']);
                $is_suscribed = strip_tags($_POST['is_suscribed']);
                $level = strip_tags($_POST['level']);
                $clienteController = new clienteController();
                $clienteController->register($name, $email, $phone_number, $password, $is_suscribed, $level);
                break;
            case 'addAddress':
                $name = strip_tags($_POST['name']);
                $lastname = strip_tags($_POST['lastname']);
                $street = strip_tags($_POST['street']);
                $postal_code = strip_tags($_POST['postal_code']);
                $city = strip_tags($_POST['city']);
                $province = strip_tags($_POST['province']);
                $phone_number = strip_tags($_POST['phone_number']);
                $is_billing_address = strip_tags($_POST['password']);
                $id = strip_tags($_POST['id']);
                $clienteController = new clienteController();
                $clienteController->registerAddress($name, $lastname, $street, $postal_code, $city, $province, $phone_number, $is_billing_address, $id);
                break;
            case 'updateAddress':
                $name = strip_tags($_POST['name']);
                $lastname = strip_tags($_POST['lastname']);
                $street = strip_tags($_POST['street']);
                $postal_code = strip_tags($_POST['postal_code']);
                $city = strip_tags($_POST['city']);
                $province = strip_tags($_POST['province']);
                $phone_number = strip_tags($_POST['phone_number']);
                $is_billing_address = strip_tags($_POST['password']);
                $client_id = strip_tags($_POST['client_id']);
                $address_id = strip_tags($_POST['address_id']);
                $clienteController = new clienteController();
                $clienteController->editAddress($name, $lastname, $street, $postal_code, $city, $province, $phone_number, $is_billing_address, $_client_id,$address_id);
                break;
            case 'update':
                $name = strip_tags($_POST['name']);
                $email = strip_tags($_POST['email']);
                $phone_number = strip_tags($_POST['phone_number']);
                $password = strip_tags($_POST['password']);
                $is_suscribed = strip_tags($_POST['is_suscribed']);
                $level = strip_tags($_POST['level']);
                $id = strip_tags($_POST['id']);
                $clienteController = new clienteController();
                $clienteController->register($name, $email, $phone_number, $password, $is_suscribed, $level, $id);
                break;
            case 'delete':
                $id = strip_tags($_POST['id']);
                $clienteController = new clienteController();
                $clienteController->delete($id);
                break;
            case 'deleteAddress':
                $id = strip_tags($_POST['id']);
                $clienteController = new clienteController();
                $clienteController->deleteAddress($id);
                break;
        }
    }
}



class clienteController
{
    public function register($name, $email, $phone_number, $password, $is_suscribed, $level)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'phone_number' => $phone_number,
                'is_suscribed' => $is_suscribed,
                'level_id' => $level
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            header("Location:" . BASE_PATH . "public/clientes.php?success=true");
        } else {
            header("Location:" . BASE_PATH . "public/clientes.php?error=true");
        }
    }
    public function registerAddress($name, $lastname, $street, $postal_code, $city, $province, $phone_number, $is_billing_address, $id)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'first_name' => $name,
                'last_name' => $lastname,
                'street_and_use_number' => $street,
                'postal_code' => $postal_code,
                'city' => $city,
                'province' => $province,
                'phone_number' => $phone_number,
                'is_billing_address' => $is_billing_address,
                'client_id' => $id
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            header("Location:" . BASE_PATH . "public/clientes.php?success=true");
        } else {
            header("Location:" . BASE_PATH . "public/clientes.php?error=true");
        }
    }
    public function editAddress($name, $lastname, $street, $postal_code, $city, $province, $phone_number, $is_billing_address, $client_id, $address_id)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'first_name=' . $name . '&last_name=' . $lastname . '&street_and_use_number=' . $street . '&postal_code=' . $postal_code . '&city=' . $city . '&province=' . $province . '&phone_number=' . $phone_number . '&is_billing_address=' . $is_billing_address . '&client_id=' . $client_id . '&id=' . $address_id,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            header("Location:" . BASE_PATH . "public/clientes.php?success=true");
        } else {
            header("Location:" . BASE_PATH . "public/clientes.php?error=true");
        }
    }
    public function edit($name, $email, $password, $phone_number, $is_suscribed, $level, $id)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'name=' . $name . '&email=' . $email . '&password=' . $password . '&phone_number=' . $phone_number . '&is_suscribed=' . $is_suscribed . '&level_id=' . $level . '&id=' . $id,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            header("Location:" . BASE_PATH . "public/clientes.php?success=true");
        } else {
            header("Location:" . BASE_PATH . "public/clientes.php?error=true");
        }
    }


    public function getAllUsers()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients',
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
    public function getOneUsers($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/' . $id,
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
    public function getAddress($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/' . $id,
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
    public function delete($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/clients/' . $id,
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
            header("Location:" . BASE_PATH . "public/clientes.php?success=true");
        } else {
            header("Location:" . BASE_PATH . "public/clientes.php?error=true");
        }
    }
    public function deleteAddress($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/addresses/' . $id,
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
            header("Location:" . BASE_PATH . "public/clientes.php?success=true");
        } else {
            header("Location:" . BASE_PATH . "public/clientes.php?error=true");
        }
    }
}
