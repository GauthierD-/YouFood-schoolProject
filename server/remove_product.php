<?php 

require 'required.php';
 
    $order_tmp = array("id_product"=>array(),"name"=>array(),"type"=>array(), "price"=>array(), "image_url"=>array()); 
    $products_number = count($_SESSION['order']['id_product']); 
     
    for($i = 0; $i < $products_number; $i++) 
    { 
        
        if($_SESSION['order']['id_product'][$i] != $_GET['id']) 
        { 
            array_push($order_tmp['id_product'],$_SESSION['order']['id_product'][$i]); 
            array_push($order_tmp['name'],$_SESSION['order']['name'][$i]); 
            array_push($order_tmp['type'],$_SESSION['order']['type'][$i]); 
            array_push($order_tmp['price'],$_SESSION['order']['price'][$i]);
            array_push($order_tmp['image_url'],$_SESSION['order']['image_url'][$i]);
        } 
    } 
     
    $_SESSION['order'] = $order_tmp; 
     
    unset($order_tmp); 

header ('location:client_order.php');
?>

