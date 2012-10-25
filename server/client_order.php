<?php require 'required.php'; ?>
<!DOCTYPE HTML>
<HTML>
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
        <h2>Votre commande :</h2>
            <?php 
             
            if(isset($_GET['id'])) {
                
                  $productManager = ManagerFactory::getProductManager();
                  $ordered_product = $productManager->findProductById($_GET['id']);                
                 
                    $select = array(); 
                    $select['id'] = uniqid(); 
                    $select['name'] = $ordered_product->getName(); 
                    $select['type'] = $ordered_product->getType(); 
                    $select['price'] = $ordered_product->getPrice();
                    $select['image_url'] = $ordered_product->getImagePath();


                        if(!isset($_SESSION['order'])) { 
 
                            $_SESSION['order'] = array();
                            $_SESSION['order']['id_product'] = array();
                            $_SESSION['order']['name'] = array(); 
                            $_SESSION['order']['type'] = array(); 
                            $_SESSION['order']['price'] = array();
                            $_SESSION['order']['image_url'] = array();
                            
                        } 


                    array_push($_SESSION['order']['id_product'],$select['id']); 
                    array_push($_SESSION['order']['name'],$select['name']); 
                    array_push($_SESSION['order']['type'],$select['type']); 
                    array_push($_SESSION['order']['price'],$select['price']);
                    array_push($_SESSION['order']['image_url'],$select['image_url']);
            }

            ?>
<ul data-role="listview" data-inset="true">
<?php

if(isset($_SESSION['order'])) {
$x = 0;
foreach ($_SESSION['order'] as $a) $x += sizeof($a);

    for ($i = 0, $total = 0; $i < $x; $i++) {
        
        if (isset($_SESSION['order']['name'][$i])) {    
                
                echo "<li><a href=\"clientOrder.php\"><img src=\"".$_SESSION['order']['image_url'][$i]."\"/>".$_SESSION['order']['name'][$i]." ("; }
    
                    if (isset($_SESSION['order']['price'][$i])) {
        
                        $total += $_SESSION['order']['price'][$i];
                        echo $_SESSION['order']['price'][$i]."€) : "; }
                    
                            if (isset($_SESSION['order']['type'][$i]) && $_SESSION['order']['type'][$i] == 1) {
                                
                                echo "(Entrée)</a><a href=\"remove_product.php?id=".$_SESSION['order']['id_product'][$i]."\" data-icon=\"minus\">Supprimer</a></li>";
                            }
                            
                            else if (isset($_SESSION['order']['type'][$i]) && $_SESSION['order']['type'][$i] == 2) {
                                
                                echo "(Plat)</a><a href=\"remove_product.php?id=".$_SESSION['order']['id_product'][$i]."\" data-icon=\"minus\">Supprimer</a></li>";
                            }
                            
                            else if (isset($_SESSION['order']['type'][$i]) && $_SESSION['order']['type'][$i] == 3) {
                                
                                echo "(Dessert)</a><a href=\"remove_product.php?id=".$_SESSION['order']['id_product'][$i]."\" data-icon=\"minus\">Supprimer</a></li>";
                            
                            }
                            
                            else if (isset($_SESSION['order']['type'][$i]) && $_SESSION['order']['type'][$i] == 4) {
                                
                                echo "(Boisson)</a><a href=\"remove_product.php?id=".$_SESSION['order']['id_product'][$i]."\" data-icon=\"minus\">Supprimer</a></li>";
                            
                            }
                    }
}
               
?> 

            </ul>
                <?php 
                if(isset($total)) {
                
                    echo "<h4>Total de la commande : ".$total."€</h4>"; } 
                
                ?>
                <a data-role="button" data-mini="true" data-inline="true" data-icon="arrow-l" href="index.php">Continuer ma Commande</a>
                <a data-role="button" data-mini="true" data-inline="true" data-icon="delete" rel="external" href="empty_order.php">Vider ma Commande</a>
                
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
			<input name="cmd" type="hidden" value="_xclick">
			<input name="business" type="hidden" value="Seller_1336934946_biz@supinfo.com">
			<input name="item_name" type="hidden" value="Commande chez YouFoodInc.">
			<input name="amount" type="hidden" value="<?php echo $total;?>">
			<input name="currency_code" type="hidden" value="EUR">
			<input name="no_shipping" type="hidden" value="1">
                        <input name="no_note" type="hidden" value="1" />
                        <input name="notify_url" type="hidden" value="http://youfood.lan/index.php" />
			<input name="return" type="hidden" value="http://youfood.lan/index.php">
                        <input name="custom" type="hidden" value="<? echo uniqid()?>">
			<input type="submit" name="submit" class="envoyer" value="Accéder au Règlement">
                        <img src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1" />
		</form>
    </div>
</div>

</body>
</HTML>
