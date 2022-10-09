<?php
include_once 'config.php';
if (isset($_POST['action'])) {
    // var_dump($_POST['super_token']+$_SESSION['super_token']);
    //if (isset($_POST['super_token']) && $_POST['super_token'] == $_SESSION['super_token']) {
        switch ($_POST['action']) {
            case 'create':
                session_start();
                $name = strip_tags($_POST['name']);
                $slug = strip_tags(strtr($_POST['name']," ","-"));
                $description = strip_tags($_POST['description']);
                $features = strip_tags($_POST['features']);
                $brand_id = strip_tags($_POST['marca']);
                $cover = new CURLFILE($_FILES['imagen']['tmp_name']);
                $productController = new ProductosController();
                $productController -> createProduct($name, $slug, $description, $features, $brand_id,$cover);
                break;
            case 'delete':
                $idEl = $_POST['idEliminar'];
                $productController = new ProductosController();
                $productController -> delete($idEl);
                break;
            case 'update':
                $name = strip_tags($_POST['name']);
                $slug = strip_tags(strtr($_POST['name']," ","-"));
                $description = strip_tags($_POST['description']);
                $features = strip_tags($_POST['features']);
                $brand_id = strip_tags($_POST['marca']);
                $id = strip_tags($_POST['objetivo']);
                $productController = new ProductosController();
                $productController -> updateProduct($name,$slug,$description,$features,$brand_id,$id);
                break;
        }
    //}
}

Class ProductosController{
    public function productos(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
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
    public function spcfP($slug){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/'.$slug,
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
    
    public function createProduct($name, $slug, $description, $features, $brand_id, $cover) {
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $name,
        'slug' => $slug,
        'description' => $description,
        'features' => $features,
        'brand_id' => $brand_id,
        'cover'=> $cover),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer ' .$_SESSION['token'],
        ),
    ));
    
        $response = curl_exec($curl);

        curl_close($curl);
        
        

        $response = json_decode($response);

        if( isset($response->code) &&  $response->code > 0) {
            header ("Location:".BASE_PATH."public/view/productos?success=true");
        } else{
            header ("Location:".BASE_PATH."public/view/productos?error=true");
        }
    }


    public function delete($id) {
        var_dump($id);
        $curl = curl_init();
        
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/'.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'DELETE',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            ),
        ));
    
        $response = curl_exec($curl);
    
        curl_close($curl);

        $response = json_decode($response);
    
        if( isset($response->code) &&  $response->code > 0) {
            $var = $response->message;
            header ("Location:../view/productos");
            // header ("Location:../view/productos.php?delete=true");
        } else{
            // header ("Location:../view/productos.php?delete=false");
            return $response;
            //header ("Location:../view/productos");
        }
    }

    public function updateProduct($name, $slug, $description, $features, $brand_id, $id) {
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => 'name='.$name.'&slug='.$slug.'&description='.$description.'&features='.$features.'&brand_id='.$brand_id.'&id='.$id,
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$_SESSION['token'],
                'Content-Type: application/x-www-form-urlencoded'
            ),
          ));

        $response = curl_exec($curl);
        
        curl_close($curl);
        
        $response = json_decode($response);
        
        if( isset($response->code) &&  $response->code > 0) {
            header ("Location:../public/view/productos?success=true");
        } else{
            
            var_dump($response);
            
            // header ("Location:../public/view/productos.php?error=true&razon=".$var);
        }
    }
    public function cat($categoria){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/categories/'.$categoria,
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
            return $response -> data -> products;
        } 
        else {
            return array();
        }
    }
}