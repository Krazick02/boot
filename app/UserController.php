<?php

include_once 'config.php';

if (isset($_POST["action"]) && isset($_POST["email"])) {
    // var_dump($_POST['super_token']+$_SESSION['super_token']);
    if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {

        switch ($_POST["action"]) {
            case 'create':
                $name = strip_tags($_POST['name']);
                $lastname = strip_tags($_POST['lastname']);
                $email = strip_tags($_POST['email']);
                $phone_number = strip_tags($_POST['phone_number']);
                $create_by = strip_tags($_POST['create_by']);
                $role = strip_tags($_POST['role']);
                $password = strip_tags($_POST['password']);
                $profile_photo = new CURLFILE($_FILES['profile_photo_file']['tmp_name']);
                $usercontroller = new UserController();
                $usercontroller->register($name, $lastname, $email, $phone_number, $create_by, $role, $password, $profile_photo);
                break;
            case 'perfil':
                $id = strip_tags($_POST['id']);
                $profile_photo = new CURLFILE($_FILES['profile_photo_file']['tmp_name']);
                $usercontroller = new UserController();
                $usercontroller->photo($id, $profile_photo);
                break;
            case 'update':
                $name = strip_tags($_POST['name']);
                $lastname = strip_tags($_POST['lastname']);
                $email = strip_tags($_POST['email']);
                $phone_number = strip_tags($_POST['phone_number']);
                $create_by = strip_tags($_POST['create_by']);
                $role = strip_tags($_POST['role']);
                $password = strip_tags($_POST['password']);
                $id = strip_tags($_POST['id']);
                $usercontroller = new UserController();
                $usercontroller->edit($name, $lastname, $email, $phone_number, $create_by, $role, $password, $id);
                break;
            case 'delete':
                $id = strip_tags($_POST['id']);
                $usercontroller = new UserController();
                $usercontroller->delete($id);
                break;
        }
    }
}



class UserController
{
    public function register($name, $lastname, $email, $phone_number, $create_by, $role, $password, $profile_photo)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
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
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            header("Location:" . BASE_PATH . "public/users.php?success=true");
        } else {
            header("Location:" . BASE_PATH . "public/users.php?error=true");
        }
    }
    public function edit($name, $lastname, $email, $phone_number, $create_by, $role, $password, $id)
    {

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'name=' . $name . '&lastname=' . $lastname . '&email=' . $email . '&phone_number=' . $phone_number . '&created_by=' . $create_by . '&role=' . $role . '&password=' . $password . '&id=' . $id,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) &&  $response->code > 0) {
            header("Location:" . BASE_PATH . "public/users.php?success=true");
        } else {
            header("Location:" . BASE_PATH . "public/users.php?error=true");
        }
    }


    public function getAllUsers()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users',
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
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/' . $id,
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
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/'.$id,
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
            header("Location:" . BASE_PATH . "public/users.php?success=true");
        } else {
            header("Location:" . BASE_PATH . "public/users.php?error=true");
        }
    }
    public function photo($id,$photo)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/users/avatar',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('id' => $id,'profile_photo_file'=> $photo),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION['token'],
            ),
        ));
        

        $response = curl_exec($curl);

        curl_close($curl);


        $response = json_decode($response);

        if (isset($response->code) &&  $response->code > 0) {
            header("Location:" . BASE_PATH . "public/perfilUser.php?success=true");
        } else {
            header("Location:" . BASE_PATH . "public/perfilUser.php?error=true");
        }
    }
}
