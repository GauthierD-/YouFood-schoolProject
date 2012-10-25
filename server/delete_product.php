<?php 

require 'required.php';

$productManager = ManagerFactory::getProductManager();
$countryManager = ManagerFactory::getCountryManager();
$countries = $countryManager->findAllCountries();

if(isset($_POST['delete_product_submit'])) {
    
    $productManager->removeProduct($_POST['product']);
    
}

?>


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
        
    <a data-role="button" data-mini="true"  data-icon="gear" href="administration.php">Section Admin</a>
    <a data-role="button" data-mini="true" data-icon="home" href="index.php">Accueil</a>
</div>
    <div data-role="content">
			<h1>Supprimer un produit :</h1>	
			<form id="delete_product_form" method="POST">
                                    <div data-role="fieldcontain">
					<select data-native-menu="false" name="product" id="product">
                                            <?php 
                                            foreach($countries as $country) {
                                                echo "<optgroup label=".$country->getName().">";
                                                $products = $productManager->findProductsByCountry($country);
                                                foreach($products as $product) {
                                                    
                                                    echo "<option value=".$product->getId().">".$product->getName()."</option></optgroup>"; } } ?>
                                        </select>
                                    </div>
					<input type="submit" value="Valider" name="delete_product_submit" data-icon="check" data-inline="true" />
			</form>
                </div>
    </div>
</body>
	
</html>
