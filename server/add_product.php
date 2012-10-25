<?php

require 'required.php';

$countryManager = ManagerFactory::getCountryManager();
$countries = $countryManager->findAllCountries();

if(isset($_POST['add_product_submit'])) {
    
	$productManager = ManagerFactory::getProductManager();
        $country_chosen = $countryManager->findCountryByName($_POST['country']);
        
        if($_POST['type'] == "Entrée") {
            
            $type = 1;
        }
        
        elseif($_POST['type'] == "Plat") {
            
            $type = 2;
        }
        
        elseif($_POST['type'] == "Dessert") {
            
            $type = 3;
        }
        
        elseif($_POST['type'] == "Boisson") {
            
            $type = 4;
        }
        
        // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['uploaded_image']) AND $_FILES['uploaded_image']['error'] == 0) {
  
                $infosfichier = pathinfo($_FILES['uploaded_image']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        $image_url = 'http://'.$_SERVER['HTTP_HOST'].'/images/'.$_FILES['uploaded_image']['name'];
                        move_uploaded_file($_FILES['uploaded_image']['tmp_name'], 'images/' . basename($_FILES['uploaded_image']['name']));
                }
        
}
	$productManager->addProduct($_POST['name'], $_POST['price'], $type ,$image_url ,$country_chosen);
        
        
        header('location:administration.php');
        
}

?>
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	
	<head>
    <meta charset="UTF-8">
    
    <title>YouFood Inc.</title>
    
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
    
        </head>
<body>
    <div data-role="page">
        <div data-role="header">
    <h1>Bienvenue sur YouFood Inc.</h1>
        
    <a data-role="button" data-mini="true" data-icon="gear" href="administration.php">Section Admin</a>
    <a data-role="button" data-mini="true" data-icon="home" href="index.php">Accueil</a>
</div>
    <div data-role="content">
			<h1>Ajouter un produit</h1>
		
			<form id="add_product_form" method="POST" enctype="multipart/form-data" data-ajax="false">
                            
                                        <div data-role="fieldcontain">
					<input id="name" type="text" name="name" placeholder="Nom" />
                            </div>
                                        <label for="price">Prix :</label>
                                        <div data-role="fieldcontain">
                                        <input type="range" name="price" id="price" value="0" min="0" max="50" data-highlight="true" />
                            </div>
                            
                                        <label for="select_type" class="select_type">Type :</label>
                                        <div data-role="fieldcontain">
                                        <select data-native-menu="false" name="type" id="type">
                                               <option value="Entrée">Entrée</option>
                                               <option value="Plat">Plat</option>
                                               <option value="Dessert">Dessert</option>
                                               <option value="Boisson">Boisson</option>
                                        </select>
                            </div>
                                        <label for="select_country" class="select_country">Pays :</label>
                                        <div data-role="fieldcontain">
                                        <select data-native-menu="false" name="country" id="country">
                                            <?php foreach($countries as $country) {
                                           echo "<option value=".$country->getName().">".$country->getName()."</option>"; } ?>
                                        </select>
                            </div>
                                        <label for="image">Image (80x80 px conseillé) :</label>
                                        <div data-role="fieldcontain">
                                        <input name="uploaded_image" type="file"/>
                            </div>
					<input type="submit" value="Valider" name="add_product_submit" data-icon="check" data-inline="true" />
			</form>
          
                </div>
    </div>
</body>
	
</html>
