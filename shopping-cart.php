<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appareils électroniques ainsi que les vêtements sont dispobles sur maliva.com | Maliva  </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php include('header_index.php');?>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php $display = $connexion->query('SELECT * FROM prod');
                    $cat = $display->fetch();?>
                    <div class="breadcrumb-text product-more">
                        <a href="./index.php"><i class="fa fa-home"></i>Accueil</a>
                        <a href="./shop.php?populaire=<?= $cat['price']?>">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->


    <!----CART PAIEMENT----->

    <?php 
    if(isset($_GET['paiement']))
    { 
      if(!empty($_SESSION['name_user']))
      {
        if(isset($_POST['submit_netapayer']))
         {
            if(isset($_POST['name'],$_POST['email'],$_POST['address'], $_POST['tel'],$_POST['product_name'],$_POST['unit_price'],$_POST['quantity'],$_POST['total_price']) AND !empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['address']) AND !empty($_POST['tel']) AND !empty($_POST['product_name']) AND !empty($_POST['unit_price']) AND !empty($_POST['quantity']) AND !empty($_POST['total_price']))
              {

                $name = htmlspecialchars($_SESSION['name_user']);
                $email = htmlspecialchars($_SESSION['email_user']);
                $address = htmlspecialchars($_POST['address']);
                $tel = htmlspecialchars($_POST['tel']);
                $zip_code = htmlspecialchars($_POST['zip_code']); 
                $product_name = htmlspecialchars($_POST['product_name']); 
                $unit_price = htmlspecialchars($_POST['unit_price']);
                $quantity = htmlspecialchars($_POST['quantity']);
                $total_price = htmlspecialchars($_POST['total_price']);

                  if(strlen($address) < 50)
                    {
                      if(strlen($tel) < 15)
                      {
                        if(strlen($zip_code) < 20)
                        {
                            $insert = $connexion -> prepare('INSERT INTO commande (name, email, address, tel, zip_code, product_name, unit_price, quantity, total_price, date_command) VALUES (?,?,?,?,?,?,?,?,?,NOW())');

                            $insert->execute(array($name,$email,$address,$tel,$zip_code,$product_name,$unit_price,$quantity,$total_price));
                                    
                            $m = "Votre commande est envoyée avec succès!
                                Nous allons nous servir de vos coordonnées pour vous contacter et  passer au paiement";   
                        }else{
                            $m_er = "Erreur: Votre numéro postal est invalide";
                        }
                      }else{
                        $m_er = "Erreur: Le numéro doit avoir moins de 15 caractères"; 
                      }
                    }else{
                      $m_er ="Erreur: L'adresse doit avoir moins de 50 caractères";
                    }
                  }else{
                    $m_er ="Erreur: Tous les champs doivent être complétés";
                  }
              }
          ?>

           
      <?php }else{
      // CONNECTION FORM if not connected
          // CONNECTION FORM
                if(isset($_POST['submit_login'])) 
                {    
                    $name_connect = htmlspecialchars($_POST['name_connect']);
                    $pass_word_connect = sha1($_POST['pass_word_connect']);
                 
                    if(!empty($name_connect) AND !empty($pass_word_connect))
                    {       
                // CREATION DES SESSIONS D'UTILISATEUR 
                            $requser = $connexion->prepare("SELECT * FROM membres WHERE name=? AND pass_word = ?");
                            $requser->execute(array($name_connect, $pass_word_connect));
                            $userexist = $requser->rowCount();
                            if($userexist == 1)
                            {
                                $userinfo = $requser->fetch();
                                $_SESSION['id_user'] = $userinfo['id'];
                                $_SESSION['name_user'] = $userinfo['name'];
                                $_SESSION['email_user'] = $userinfo['email'];
                                          
                                $m ="<b>Vous êtes connectés</b>";
                                $m_shop = 'Cliquez sur continuer. <hr> <a href="shopping-cart.php?paiement" class="site-btn login-btn">
                                            Continuer
                                        </a>';
                            }
                            else
                            {
                                $m_erreur = "Erreur: Môt de passe ou nom d'utilisateur incorrect";  
                            }
                        }   
                        else
                        {
                            $m_erreur = "Erreur: Vous devez complétez tous les champs";
                        }
                    }
                ?>



        <div class="register-login-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="login-form">
                            <h2>CONNECTEZ-VOUS AVANT DE CONTINUER</h2>

                            <form action="" method="post">
                                <div style="color: green; font-weight: bold;">
                                    <?php if(isset($m)){ echo $m; }?>        
                                </div>
                                <div style="color: red; font-weight: bold;">
                                    <?php if(isset($m_erreur)){ echo $m_erreur; }?>
                                </div>
                                <hr>
                                <div style="color: green; font-weight: bold;">
                                    <?php if(isset($m_shop)){ echo $m_shop; }?>
                                </div>
                                <hr>    
                                <div class="group-input">
                                    <label for="username">Nom d'utilisateur*</label>
                                    <input type="text" name="name_connect" id="username" value="<?php if(isset($name_connect)){ echo $name_connect;}?>">
                                </div>
                                <div class="group-input">
                                    <label for="pass">Mot de passe *</label>
                                    <input type="text" name="pass_word_connect" id="pass">
                                </div>
                                <div class="group-input gi-check">
                                    <div class="gi-more">
                                        <label for="save-pass">
                                            Enregistrez le mot de passe Password
                                            <input type="checkbox" name="forget_pass" id="save-pass">
                                            <span class="checkmark"></span>
                                        </label>
                                        <a href="Contact.php" class="forget-pass">Mot de passe oublié</a>
                                    </div>
                                </div>
                                <button type="submit" name="submit_login" class="site-btn login-btn">
                                    Connexion
                                </button>
                            </form>
                            <div class="switch-login">
                                <a href="./register.php" class="or-login">Ou creez un compte</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }?>

        <section class="checkout-section spad">
            <div class="container">
                <form class="checkout-form" action="shopping-cart.php?paiement" method="post"> 
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <a href="shop.php" class="content-btn">Shop</a>
                            </div>
                            <hr>
                            <span style="color: green; font-weight: bold;">
                                <?php if(isset($m)){ echo $m; }?>
                            </span> 
                        
                            <span style="color: red; font-weight: bold;">
                                <?php if(isset($m_er)){ echo $m_er .'<hr>'; }?>
                            </span>
                            
                                 
                            <h4>Informations de livraison</h4>
                            
                            <?php if(!empty($_SESSION["shopping_cart"]))  
                            {  
                            $total = 0;   
                            foreach($_SESSION["shopping_cart"] as $keys => $values)  
                            { ?>  

                            <div class="row">  
                                

                                <div class="col-lg-6">
                                    <label for="fir">Votre nom<span>*</span></label>
                                    <input type="text" name="name" value="<?php if(isset($_SESSION['name_user'])) { echo $_SESSION['name_user'];}?>" id="fir">
                                </div>
                                <div class="col-lg-6">
                                    <label for="cun-name">Votre Adresse email<span>*</span></label>
                                    <input type="email" name="email" value="<?php if(isset($_SESSION['name_user'])) { echo $_SESSION['email_user'];}?>" id="cun-name">
                                </div>   
                                <div class="col-lg-12">
                                    <label for="cun">Votre adresse complete<span>*</span></label>
                                    <input type="text" name="address" placeholder="RDC/Kisangani/Makiso/Boulevard du 30 juin" value="<?php if(isset($address)){ echo $address; }?>" id="cun">
                                </div>
                                <div class="col-lg-12">
                                    <label for="phone">Votre numéro de téléphone<span>*</span></label>
                                    <input type="tel" name="tel" placeholder="+243 971 122 237" value="<?php if(isset($tel)){ echo $tel; }?>" id="phone">
                                </div> 
                            
                                <div class="col-lg-12">
                                    <label for="zip">Numéro Postal /CODE ZIP (pas obligatoire)</label>
                                    <input type="text" name="zip_code"  value="<?php if(isset($zip_code)){ echo $zip_code; }?>" id="zip">
                                </div>
                            

                            
                            
                                <div class="col-lg-4">
                                    
                                    <input type="hidden" name="quantity" value="<?php if(isset($values['item_quantity'])) { echo $values['item_quantity'] . 'Pc';} if($values['item_quantity'] !=1){ echo 's';} ?>" id="phone">
                                </div>

                                <div class="col-lg-4">
                                    
                                    <input type="hidden" name="unit_price" value="<?php if(isset($values['item_price'])) { echo $values['item_price'].'$';}?>" id="phone">
                                </div>

                                <div class="col-lg-4">
                                   
                                    <input type="hidden" name="total_price" value="<?php if(isset($values['item_quantity']) * ($values['item_price'])){ echo $values['item_quantity'] * $values['item_price'].'$' ;}?>" id="phone">
                                </div>

                                <div class="col-lg-12">
                                    
                                    <input type="hidden" name="product_name" value="<?php if(isset($values['item_name'])) { echo $values['item_name'];}?>" id="phone">
                                </div>
                                     
                            </div>
                            <?php }

                            }?>
                            <div class="order-btn">
                                <button type="submit" name="submit_netapayer" class="site-btn place-btn">Envoyer la commande</button>
                                    <hr>
                            </div>   
                        </div>
                      

                        <div class="col-lg-6">
                            <div class="checkout-content">
                                <a href="facture.html" class="content-btn">Voir la facture</a>
                            </div>
                            <div class="place-order">
                               
                                    <hr>
                                    <h4><strong><label>Vous voulez achetez <? if(isset($_SESSION['shopping_cart'])){ echo count($_SESSION['shopping_cart']);}?> <?php if(count($_SESSION['shopping_cart']) !=1){ echo 's<i class="fs-12 fa fa-arrow-down" aria-hidden="true"></i>';}?>                                    
                                    </label></strong></h4>
                                <hr>
                               
                                <div class="order-total">
                                    <ul class="order-table">
                                        <li>Produits <span>Total</span></li>
                                        <?php   
                                        if(!empty($_SESSION["shopping_cart"]))  
                                        {  
                                        $total = 0;
                                        foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                        {?>
                                        <li class="col-lg-7"><?= $values["item_name"]. ': '. $values["item_quantity"]?> X <?= $values["item_price"].'$'?>
                                            <span>
                                                <?= number_format($values["item_price"] * $values["item_quantity"], 2) .'$'?>
                                            </span>
                                        </li>
                                        <li>
                                            <?php $total = $total + ($values["item_price"] * $values['item_quantity']);?>
                                        </li>
                                        <?php }}?>

                                        <li style="color: #e7ab3c;">Total:
                                            <span class="col-lg-5">
                                            <?php if(isset($total)){ echo number_format($total, 2).'$';} ?>
                                            </span>
                                        </li>
                                        

                                    </ul>
                                    <div class="payment-check">
                                        <div class="order-btn">
                                            <a style="color: white" href="facture.html" class="site-btn place-btn">Voir la facture</a>
                                        </div>   
                                    </div>
                                    

                                    <?php   
                                    if(!empty($_SESSION["shopping_cart"]))  
                                    {  
                                    $total = 0;
                                    foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                    {
                                    // FICHIER COMPTEUR
                                    $monfichier = fopen('facture.html', 'r+');
                                    $facture = fgets($monfichier);
                                    fputs($monfichier, '<section style="border: 1px solid silver; text-align: center; padding: 3%; margin: 3%;"><h1>MALIVASHOPPING<h1> <h2 style="color:#e7ab3c;">FACTURE<h2>');
                                    

                                        if(isset($_SESSION['name_user'])) {
                                        fputs($monfichier,  '<h3>nom du client: '. $_SESSION['name_user'] . '</h3> ');}
                                    
                                        if(isset($_SESSION['name_user'])) {
                                        fputs($monfichier, '<h3>adresse gmail du client: '. $_SESSION['email_user']. '</h3><h3>Merci!</h3> d\'avoir choisi malivashopping. La serviabilité et la ponctualité sont les élements fodamentaux que nous considérons les plus.');
                                        }
                                    
                                        fputs($monfichier,  '<h3>PRODUIT(S)<h3><h4> '.$values["item_quantity"].'pc(s)');
                                        fputs($monfichier,  ' '.$values["item_name"]);
                                        fputs($monfichier,  ' '.$values["item_price"].'$');
                                        fputs($monfichier,  '= '.$values["item_quantity"] * $values["item_price"].'$'). '</h4></section>';
                                        fputs($monfichier, '<br/><br/><br/><a style="color:#e7ab3c;" href="shopping-cart.php?paiement">Retour</a>');
                                        fclose($monfichier);
                                        
                                        }}?>
                                    </div>







                                </div>
                            </div>
                        </div>
                    </div>   
                </form>
            </div>
        </section>
    <?php }?>










    <!-- Shopping Cart Section Begin -->
    <?php  if(isset($_POST["add_to_cart"]))  
        {  
          if(isset($_SESSION["shopping_cart"]))  
          {  
               $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
               if(!in_array($_GET["id"], $item_array_id))  
               {  
                    $count = count($_SESSION["shopping_cart"]);  
                    $item_array = array(  
                         'item_id' => $_GET["id"],  
                         'item_name' => $_POST["hidden_name"],
                         'item_image' => $_POST["hidden_image"],
                         'item_price' => $_POST["hidden_price"],  
                         'item_quantity' => $_POST["hidden_quantity"]  
                    );  
                    $_SESSION["shopping_cart"][$count] = $item_array;  
               }  
               else  
               {  
                    echo '<script>alert("Item Added")</script>';  
                    echo '<script>window.location="shopping-cart.php"</script>';  
               }  
          }  
          else  
          {  
               $item_array = array(  
                    'item_id' => $_GET["id"],  
                    'item_name' => $_POST["hidden_name"], 
                    'item_image' => $_POST["hidden_image"],  
                    'item_price' => $_POST["hidden_price"],  
                    'item_quantity' => $_POST["hidden_quantity"]  
               );  
               $_SESSION["shopping_cart"][0] = $item_array;  
          }  
     }  
     if(isset($_GET["action"]))  
     {  
          if($_GET["action"] == "delete")  
          {  
               foreach($_SESSION["shopping_cart"] as $keys => $values)  
               {  
                    if($values["item_id"] == $_GET["id"])  
                    {  
                        unset($_SESSION["shopping_cart"][$keys]);  
                        echo '<script>alert("Item Removed")</script>';  
                        echo '<script>window.location="shopping-cart.php"</script>';
                    }  
               }  
          }  
     }  
     ?>   
     <?php   
    if(!empty($_SESSION["shopping_cart"]))  
    {  
        $total = 0;  
    ?> 
        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <?php echo '<b>Vous avez ' . count($_SESSION['shopping_cart']);?> <?php if (count($_SESSION['shopping_cart'])!=1){ echo "produits</b>";}else{ echo 'produit';} ?><?php echo ' '.'dans votre panier<i class="fs-12 fa fa-arrow-down" aria-hidden="true"></i>';?>
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th class="p-name">Nom du produit</th>
                                        <th>Prix</th>
                                        <th>Quantité</th>
                                        <th>Total</th>
                                        <th><i class="ti-close"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                    {?>
                                    <tr>
                                        <td class="cart-pic first-row">
                                            <?php echo $values["item_image"];?>
                                        </td>
                                        <td class="cart-title first-row">
                                            <h5><?php echo $values["item_name"];?></h5>
                                        </td>
                                        <td class="p-price first-row"><?php echo number_format($values["item_price"], 2).'$';?></td>
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="<?php echo $values["item_quantity"];?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="total-price first-row"><?php echo number_format($values['item_quantity'] * $values['item_price'], 2).'$';?></td>
                                        <td class="close-td first-row">
                                            <a href="shopping-cart.php?action=delete&id=<?= $values['item_id'] ?>" style='color: red;'><i class="ti-close"></i></a> 
                                        </td>
                                    </tr>
                                    
                                <?php }?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="shop.php" class="primary-btn continue-shop">    
                                        <i class="fs-12 fa fa-arrow-right" aria-hidden="true"></i>   
                                        Continuez les achats
                                    </a>
                                    <a href="shopping-cart.php?paiement" class="primary-btn up-cart">Valider la commande</a>
                                </div>
                                
                            </div>
                            <div class="col-lg-4 offset-lg-4">
                                <div class="proceed-checkout">
                                    <ul>
                                        <?php foreach($_SESSION["shopping_cart"] as $keys => $values)  
                                        {?>
                                            <li class="subtotal">
                                                <?= $values['item_name']?>
                                                <span><?= number_format($values['item_quantity'], 2) * number_format($values['item_price'], 2) . "$"  ?> 
                                                </span> 
                                            </li>

                                        <?php // calcul du total 
                                        $total = $total + ($values['item_price']) * ($values['item_quantity']);?>
                                        <?php }?>
                                        
                                        <li class="cart-total">Net à payer
                                            <span>
                                                <?= number_format($total, 2).'$';?>
                                            </span> 
                                        </li>
                                    </ul>
                                    <a href="shopping-cart.php?paiement" class="proceed-btn">Valider la commande</a>














                               


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php } else{
            echo '<div class="site-btn place-btn">Le panier est vide</div>';
        }?>
    <!-- Shopping Cart Section End -->

    <!-- Footer Section Begin -->
    <?php include('footer.php');?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.zoom.min.js"></script>
    <script src="js/jquery.dd.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>