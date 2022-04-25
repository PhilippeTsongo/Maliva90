  <!-- Header Section Begin -->
    <?php include('connexion.php');?>
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                        kaserekamaliva@gmail.com
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        +243 978 297 534
                    </div>
                </div>
                <div class="ht-right">

                    <a href="login.php" class="login-panel">
                    <?php if(!empty($_SESSION['id_user'])){
                        echo "<b>" . $_SESSION['name_user'] . "</b>";
                    }else{
                        echo '<i class="fa fa-user"></i>Connexion';
                    } ?>

                    </a>
                       

                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width: 300px;">
                            <option value='yt' data-image="img/flag-1.JPG" data-imagecss="flag yt"
                                data-title="drc">RDC</option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                            <span style="color: black; font-size: 25px; font-weight:  bolder;">MALIVASHOP</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <a type="button" class="category-btn">Recherche ici</a>
                            <form method="GET" action ="shop.php?recherche" class="input-group">
                                <input type="research" name="recherche"  placeholder="Entrez votre recherche"  value="<?php if(isset($look_for)){echo $look_for; } ?>">
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>0</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="#">
                                    <i class="icon_bag_alt"></i>
                                    <span><?php if(!empty($_SESSION['shopping_cart'])){
                                        echo Count($_SESSION['shopping_cart']);
                                    }else echo ' 0';?></span>
                                </a>
                                <div class="cart-hover">

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

                                        }else  
                                        {  
                                            echo '<script>alert("Item Already Added")</script>';  
                                            echo '<script>window.location="cart.php"</script>';  
                                        }  
                                    }else  
                                    {  
                                        $item_array = array(  
                                        'item_id' => $_GET["id"],  
                                        'item_name' => $_POST["hidden_name"], 
                                        'item_image' => $_POST["hidden_image"],  
                                        'item_price' => $_POST["hidden_price"],  
                                        'item_quantity' => $_POST["hidden_quantity"]);  
                                        $_SESSION["shopping_cart"][0] = $item_array;  
                                    }  
                                }    
                                if(isset($_GET["action"]))  
                                {  
                                    if($_GET["action"] == "delete")  
                                    {  
                                        foreach($_SESSION["shopping_cart"] as $keys => $values){  
                                            if($values["item_id"] == $_GET["id"])  
                                            {  
                                                unset($_SESSION["shopping_cart"][$keys]);  
                                                echo '<script>alert("Item Removed")</script>';  echo '<script>window.location="shopping-cart.php"</script>';  
                                            }  
                                        }  
                                    }  
                                }?>     



                                    <?php   
                                    if(!empty($_SESSION["shopping_cart"]))  
                                        {  
                                            $total = 0;?>
                                    <div class="select-items">
                                        <table>
                                            <tbody>
                                    
                                                <?php foreach($_SESSION["shopping_cart"] as $keys => $values) 
                                                {?>
                                                <tr>
                                                    <td class="si-pic"><?= $values['item_image']?>
                                                    </td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p><?= number_format($values['item_price'], 2). '$'?> x <?= $values['item_quantity'].'pc'?><?php if($values['item_quantity'] !=1){ echo 's';}?>
                                                            </p>
                                                            <h6><?= $values['item_name']?></h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <a href="shopping-cart.php?action=delete&id=<?= $values['item_id'] ?>" style="color: red;"><i class="ti-close"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $total = $total + ($values['item_price']) * ($values['item_quantity']); ?>
                                            <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        <h5><?= number_format($total, 2). '$' ?></h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="shopping-cart.php" class="primary-btn view-card">Voir le panier</a>
                                        <a href="shopping-cart.php?paiement" class="primary-btn checkout-btn">Passez au paiement</a>
                                    </div>
                                     <li class="cart-price"><?= number_format($total, 2). '$' ?></li>
                                    <?php }else{?>
                                    <div class="select-button">
                                        Votre panier est vide
                                        <a href="shop.php?populaire=20" class="primary-btn checkout-btn">Produits</a>
                                    <?php }?>
                                    </div>
                                    
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Catégories</span>
                        <ul class="depart-hover">
                            <?php //ELECTRONIQUE 
                            $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Instruments musicaux"');
                            $cat = $display->fetch();?>
                            <li><a href="shop.php?category=<?= $cat['cat_name']?>">
                                <?= $cat['cat_name']?></a>
                            </li>
                            
                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels informatiques"');
                            $cat = $display->fetch();?>
                            <li><a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                            </li>

                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels de ménage"');
                            $cat = $display->fetch();?>
                            <li><a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                            </li>

                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels de menuiserie"');
                            $cat = $display->fetch();?>
                            <li><a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                            </li>

                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Goupes électrogènes"');
                            $cat = $display->fetch();?>
                            <li><a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                            </li>


                            <?php //VETEMENT
                            $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Chapeau"');
                            $cat = $display->fetch();?>
                            <li><a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                            </li>
                            
                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Tricot"');
                            $cat = $display->fetch();?>
                            <li><a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                            </li>
                            
                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="T-shirt"');
                            $cat = $display->fetch();?>                            
                            <li><a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <?php $display = $connexion->query('SELECT * FROM prod');
                        $cat = $display->fetch();?>
                        <li><a href="./index.php">Accueil</a></li>
                        <li><a href="./shop.php?populaire=<?= $cat['price']?>">Shop</a></li>
                        <li><a href="#">Collections</a>    
                            <ul class="dropdown">
                                <li><a href="shop.php?categorie=<?= $cat['category']='électronique' ?>">Electroniques</a>
                                </li>
                                <li><a href="shop.php?categorie=<?= $cat['category']='Vêtement' ?>">Vêtements</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="./contact.php">Contact</a></li>
                        <li><a href="#"><i class="ti-menu"></i> Pages</a>
                            <ul class="dropdown">
                                <li><a href="./index.php">Accueil</a></li>
                                <li><a href="./shopping-cart.php">Panier</a></li>
                                <li><a href="./register.php">Créer un compte</a></li>
                                <li><a href="./login.php">Connexion</a></li>
                                <li><a href="./deconnexion.php">déconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>