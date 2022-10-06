<?php

session_start();
if (isset($_POST["action"]) && isset($_POST["email"])) {
    switch ($_POST["action"]) {
        case 'access':
            $authcontroller = new AuthController();
            $authcontroller->login($_POST["email"], $_POST["pwd"]);
            break;
        case 'create':
            $name = strip_tags($_POST['name']);
            $lastname = strip_tags($_POST['lastname']);
            $email = strip_tags($_POST['email']);
            $phone_number = strip_tags($_POST['phone_number']);
            $create_by = strip_tags($_POST['create_by']);
            $role = strip_tags($_POST['role']);
            $password = strip_tags($_POST['password']);
            $profile_photo = new CURLFILE($_FILES['imagen']['tmp_name']);
            $authcontroller = new AuthController();
            $authcontroller->register($name, $lastname, $email, $phone_number, $create_by, $role, $password, $profile_photo);
            break;
        case 'recovery':
            $authcontroller = new AuthController();
            $authcontroller->recovery($_POST["email"]);
            break;
    }
}



class AuthController
{
    public function isLogin(){
        if(isset($_SESSION['token'])){
            return false;
        }
        return true;
    }
    public function login($email, $password)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/login',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $email, 'password' => $password),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            session_start();
            $_SESSION['id'] = $response->data->id;
            $_SESSION['name'] = $response->data->name;
            $_SESSION['lastname'] = $response->data->lastname;
            $_SESSION['avatar'] = $response->data->avatar;
            $_SESSION['token'] = $response->data->token;
            $_SESSION['email'] = $response->data->email;

            header("Location:../public/view/productos.php");
        } else {
            header("Location:../?error=true");
        }
    }

    public function register($name, $lastname, $email, $phone_number, $create_by, $role, $password, $profile_photo)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/register',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'name' => $name,
                'lastname' => $lastname,
                'email' => $email,
                'phone_number' => $phone_number,
                'created_by' => $create_by,
                'role' => $role,
                'password' => $password,
                'profile_photo_file' => $profile_photo
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            $this->login($email, $password);
        } else {
            header("Location:../?error=true");
        }
    }
    public function recovery($email)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/forgot-password',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $email),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            header("Location:../index.php");
        } else {
            header("Location:../?error=true");
        }
    }

    public function logout()
    {


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/logout',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('email' => $_SESSION['email']),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'],
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            $_SESSION= array();
            session_destroy();
            header("Location:../../index.php");
        } else {
            var_dump($_SESSION['token']);
        }
    }
}
