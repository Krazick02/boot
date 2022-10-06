<?php
    Class CategoryController{
        public function getCategories(){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'],
            ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            

            $response = json_decode($response);

            if( isset($response->code) &&  $response->code > 0) {
                return $response -> data;
            } 
            else {
                return array();
            }
        }

        public function getProducts($id){
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/categories/'.$id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'],
            ),
            ));

            
            $response = curl_exec($curl);

            curl_close($curl);
            

            $response = json_decode($response);

            if( isset($response->code) &&  $response->code > 0) {
                if(isset($response -> data -> products)){
                    return $response -> data -> products;
                }
            } 
            else {
                return array();
            }
        }
    }

