<?php


    if(isset($_POST["action"]) && isset($_POST["email"])){
        switch($_POST["action"]){
            case 'access':
                $authcontroller = new AuthController();
                $authcontroller->login($_POST["email"],$_POST["pwd"]);
        }
        
    }



    Class AuthController{
        public function login($email,$password){
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
            CURLOPT_POSTFIELDS => array('email' => $email,'password' => $password),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $res=json_encode($response);

            $response = curl_exec($curl);
            curl_close($curl);
            $response = json_decode($response);
            if( isset($response->code) &&  $response->code > 0) 
            {
                session_start();
                $_SESSION['id'] = $response->data->id;
                $_SESSION['name'] = $response->data->name;
                $_SESSION['lastname'] = $response->data->lastname;
                $_SESSION['avatar'] = $response->data->avatar;
                $_SESSION['token'] = $response->data->token;
             
                header ("Location:../public/view/productos.php");
            } 
            else 
            {
                header ("Location:../?error=true");
            }
        }
    }
?>