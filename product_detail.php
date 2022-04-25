<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="Fashi, unica, creative, html">
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
    <!-- Page Preloder 
    <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <?php include('header_index.php');?>
    <!-- Header End -->
    <?php //SELECT PRODUCT DETAIL 
    if(isset($_GET['detail']) AND !empty($_GET['detail'])){ 
    $getname = htmlspecialchars($_GET['detail']);
    $dis = $connexion->prepare('SELECT * FROM prod WHERE name=?');
    $dis ->execute(array($getname));
    $product_detail = $dis->fetch()
    ?>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="index.php"><i class="fa fa-home"></i>Accueil</a>
                        <a href="shop.php">shop</a>
                        <span>Detail</span>
                        <span><?= $product_detail['cat_name']?></span>
                        <span> / <?= $product_detail['name'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>



                            <?php if(isset($_POST['commenter'])) 
                                {
                                    if(!empty($_POST['comment']) AND !empty($_POST['name']) AND !empty($_POST['email']))
                                    {
                                        $comment = htmlspecialchars($_POST['comment']);
                                        $name = htmlspecialchars($_POST['name']);
                                        $email = htmlspecialchars($_POST['email']);
                                        $web_site = htmlspecialchars($_POST['web_site']);
                                        
                                        if(strlen($name) < 20 AND preg_match("#[A-Za-z0-9]#", $name))
                                        {
                                            if(strlen($comment) < 400 AND preg_match("#[A-Za-z0-9]#", $comment))
                                            {
                                                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                                {
                                                    $insere_com = $connexion -> prepare( 'INSERT INTO products_com (comment,name,email,web_site,product_detail_name, date_comment) VALUES (?,?,?,?,?,NOW())');
                                                    $insere_com -> execute(array($comment,$name,$email,$web_site,$getname));

                                                    $c_success = "Votre commentaire a bien été posté  <hr>   ";

                                                    $reqmail = $connexion -> prepare(" SELECT * FROM newsletter WHERE email=?");
                                                    $reqmail ->execute(array($email));
                                                    $mailexist = $reqmail->rowCount();
                                                    if($mailexist == 0)
                                                    {
                                                        $insere = $connexion -> prepare( 'INSERT INTO newsletter (name,email) VALUES (?,?)');     
                                                        $insere -> execute(array($name,$email,));
                                                        $c_success_n = "En commentant vous vous abonnez automatiquement à notre newsletter   <hr>   ";
                                                    }else{
                                                        $c_erreur="";
                                                    }
                                                }else{
                                                    $c_erreur = "Adresse email invalide <hr>   ";
                                                }   
                                            }else{
                                            $c_erreur = "Erreur: Le commentaire ne doit pas avoir des caractères spéciaux et doit avoir moins de 400 caractères"; 
                                            }
                                        }else {
                                            $c_erreur = "Erreur: Le nom doit avoir moins de 20 caractères  <hr>   ";
                                        }
                                    }else{?>
                                    <?php $c_erreur = "Erreur: Tous les champs doivent être completés  <hr>   ";
                                    }
                                }else{
                                }?>       

        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                    
                        <span style="color: green; font-weight: bold;">
                            <?php if(isset($c_success)){ echo $c_success;}?>
                        </span>
                        <span style="color: green; font-weight: bold;">
                            <?php if(isset($c_success_n)){ echo $c_success_n;}?>
                        </span>
                        <span style="color: red; font-weight: bold;">
                            <?php if(isset($c_erreur)){ echo $c_erreur;}?>
                        </span>                                
                   
                    </div>
                </div>
            </div>
        </div>



    <!-- Breadcrumb Section Begin -->
    
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom" style="height: 350px;">
                                <img class="product-big-img" src="images/<?= $product_detail['id']?>.jpg" alt="<?= $product_detail['name']?>">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="images/<?= $product_detail['id']?>.jpg">
                                        <img src="images/<?= $product_detail['id']?>.jpg" alt="<?= $product_detail['name']?>">
                                    </div>
                                    <div class="pt" data-imgbigurl="images/<?= $product_detail['id']?>.GIF">
                                        <img src="images/<?= $product_detail['id']?>.GIF" alt="<?= $product_detail['name']?>">
                                    </div>
                                    <div class="pt" data-imgbigurl="images/<?= $product_detail['id']?>.jpg">
                                        <img src="images/<?= $product_detail['id']?>.jpg" alt="<?= $product_detail['name']?>">
                                    </div>
                                    <div class="pt" data-imgbigurl="images/<?= $product_detail['id']?>.PNG">
                                        <img src="images/<?= $product_detail['id']?>.PNG" alt="<?= $product_detail['name']?>">
                                    </div>
                                </div>
                            </div>
                        </div>

    <?php }?>

    <?php //SELECT PRODUCT DETAIL 
    if(isset($_GET['detail']) AND !empty($_GET['detail'])){ 
    $getname = htmlspecialchars($_GET['detail']);
    $dis = $connexion->prepare('SELECT * FROM prod WHERE name=?');
    $dis ->execute(array($getname));
    $product_detail = $dis->fetch()
    ?>

                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span><?= $product_detail['category']?></span>
                                    <h3><?= $product_detail['name']?></h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">

                                    <div class="catagory-name" style="color: #e7ab3c;">
                                            <?php if($product_detail['price'] < 300 AND $product_detail['price']  > 200){
                                            ?>
                                            <div class="pd-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <?php }elseif($product_detail['price'] <= 200 AND $product_detail['price'] >= 100 ){?>
                                             <div class="pd-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <?php }elseif ($product_detail['price'] < 100){?>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            <?php } ?>  

                                    </div>
                                </div>
                                <div class="pd-desc">
                                    <p><?= $product_detail['descript'] ?></p>
                                    <h4><?= $product_detail['price'] ."$"?></h4>
                                </div>
                                <ul class="pd-tags">
                                    <li>
                                        <span>CATEGORIE</span>: <?= $product_detail['category']?>
                                    </li>
                                    <li>
                                        <span>CIBLE</span>: <?= $product_detail['cat_name']?>
                                    </li>
                                    <li>
                                        <span>
                                           <?php  $rev = $connexion->prepare('SELECT * FROM products_com WHERE product_detail_name=?');
                                            $rev -> execute(array($getname));?>
                                            <?php if($rev->rowCount() !=1 AND $rev->rowCount() !=0){ echo 'COMMENTAIRES:' ;}else{ echo 'COMMENTAIRE:';} ?>
                                            <?php echo $rev->rowCount();?>
                                        </span>
                                    </li>    
                                </ul>

                                <?php //--------CART SELECT HIDDEN INFORMATIONS, QUANTITY AND BUY BUTTON  ?>
                                <form action="shopping-cart.php?action=add&id=<?php echo $product_detail["id"]; ?>" method="post">            
                                    <input type="hidden" name="hidden_image" value='<img src="images/<?= $product_detail['id']?>.jpg" alt="<?= $product_detail['name']?>" class="img_cart" >'>
                                    <input type="hidden" name="hidden_name" value="<?php echo $product_detail["name"]; ?>" > 
                                    <input type="hidden" name="hidden_price" value="<?php echo $product_detail["price"]; ?>" >             

                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="hidden_quantity" value="1">
                                        </div>
                                        <button type="submit" name="add_to_cart" class="primary-btn pd-cart" style="border: none;">Achetez</button>
                                    </div>    
                                </form>   

                                <div class="pd-share">
                                    <div class="p-code">PARTAGE</div>
                                   
                                    <!--------------------- SHARE BUTTON--------------------->
                                    <div class="post-content" data-aos="flip-up" style="border: none">    
                                    <div class="sharethis-inline-share-buttons"></div>
                                        <div>
                                            <script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5cd9acd1f050250019075c87&product='inline-share-buttons-async='async'></script>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php //DISPLY COMMENTS 
                    $rev = $connexion->prepare('SELECT * FROM products_com WHERE product_detail_name=?');
                    $rev -> execute(array($getname));?>
      
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">
                                         <?php if($rev->rowCount() !=1 AND $rev->rowCount() !=0){ echo 'Commentaires:' ;}else{ echo 'Commentaire:';} ?>
                                            <?php echo $rev->rowCount();?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5><?= $product_detail['name']?></h5>
                                                <p><?= $product_detail['descript']?> </p>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="images/<?= $product_detail['id']?>.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Cotes</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <div class="catagory-name" style="color: #e7ab3c;">
                                                            <?php if($product_detail['price'] < 300 AND $product_detail['price']  > 200){
                                                            ?>
                                                            <div class="pd-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <?php }elseif($product_detail['price'] <= 200 AND $product_detail['price'] >= 100 ){?>
                                                             <div class="pd-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <?php }elseif ($product_detail['price'] < 100){?>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                
                                                            <?php } ?>  
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Catégorie du produit</td>
                                                <td>
                                                    <div class="p-price"><?= $product_detail['category'] ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Cible</td>
                                                <td>
                                                    <div class="p-price"><?= $product_detail['cat_name'] ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Nom du produit</td>
                                                <td>
                                                    <div class="p-price"><?= $product_detail['name'] ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Prix</td>
                                                <td>
                                                    <div class="p-price"><?= $product_detail['price'] . '.00$' ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Disponibilité</td>
                                                <td>
                                                    <div class="p-price">Disponible en stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size"><?= $product_detail['size'] ?></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td><span class="cs-color"><?= $product_detail['color'] ?></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Ajouter au panier</td>
                                                <td>

                                                    <?php //--------CART SELECT HIDDEN INFORMATIONS, QUANTITY AND BUY BUTTON  ?>
                                                    <form action="product_detail.php?action=add&id=<?php echo $product_detail["id"]; ?>" method="post">            
                                                        <input type="hidden" name="hidden_image" value='<img src="images/<?= $product_detail['id']?>.jpg" alt="<?= $product_detail['name']?>" class="img_cart" >'>
                                                        <input type="hidden" name="hidden_name" value="<?php echo $product_detail["name"]; ?>" > 
                                                        <input type="hidden" name="hidden_price" value="<?php echo $product_detail["price"]; ?>" >             

                                                        <div class="quantity">
                                                            <div class="pro-qty" style="cursor: pointer; text-align: center;" >
                                                                <input type="text" name="hidden_quantity" value="1">
                                                            </div>
                                                            <button type="submit" name="add_to_cart" class="primary-btn pd-cart" style="border: none;">+ panier</button>
                                                        </div>    
                                                    </form> 
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-3" role="tabpanel">

                               
                                    <div class="customer-review-option">
                                        <h4><?php if($rev->rowCount() !=1 AND $rev->rowCount() !=0){ echo 'COMMENTAIRES:' ;}else{ echo 'COMMENTAIRE:';} ?>
                                            <?php echo $rev->rowCount();?></h4>
                                        <?php while($review = $rev->fetch()){?>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5><?= $review['name']?> <span><?= $review['date_comment']?></span></h5>
                                                    <div class="at-reply"><?= $review['comment']?></div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }?>
                                        <div class="personal-rating">
                                            <h6>coter</h6>
                                            <div class="rating">
                                                <div class="catagory-name" style="color: #e7ab3c;">
                                                            <?php if($product_detail['price'] < 300 AND $product_detail['price']  > 200){
                                                            ?>
                                                            <div class="pd-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <?php }elseif($product_detail['price'] <= 200 AND $product_detail['price'] >= 100 ){?>
                                                             <div class="pd-rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <?php }elseif ($product_detail['price'] < 100){?>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            <?php } ?>  
                                                        </div>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Laissez un commentaire</h4> 

                                            <form action="" method="post" class="comment-form">
                                                <p class="s-text8 p-b-40">
                                                    Champs  oblogatoires *
                                                </p>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" name="name" placeholder="Name *" value="<?php if(isset($name)){ echo $name ;}?>">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="email" name="email" placeholder="Email *" value="<?php if(isset($email)){ echo $email ;}?>">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <input type="text" name="web_site" placeholder="site web (pas obligatoire)" value="<?php if(isset($web_site)){ echo $web_site ;}?>">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Votre commentaire" name="comment" value="<?php if(isset($comment)){ echo $comment ;}?>"></textarea>
                                                        
                                                        <button type="submit" name="commenter" class="site-btn">Commenter</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>Vous pourriez aimer</h2>
                            </div>
                        </div>
                    </div>
                    <?php  //YOU MAY LIKE   
                    $like = $connexion->query('SELECT * FROM prod LIMIT 0,3');?>
                    <div class="benefit-items">
                         
                        <div class="row">
                            <?php while($display = $like->fetch()){
                            ?>
                            <div class="col-lg-4">
                                <div class="single-benefit">
                                    <div class="sb-icon">
                                        <img  style="width: 100px;" src="images/<?= $display['id'] ?>.jpg" alt="<?= $display['name'] ?>">
                                    </div>
                                    <div class="sb-text">
                                        <a  style='color: black; font-size: 15px;' href="product_detail.php?detail=<?= $display['name']?>">
                                            <b><?= $display['name'] ?></b></a>
                            
                                        <div class="pd-rating">
                                            <div class="catagory-name" style="color: #e7ab3c;">
                                                    <?php if($display['price'] < 300 AND $display['price']  > 200){
                                                    ?>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <?php }elseif($display['price'] <= 200 AND $display['price'] >= 100 ){?>
                                                     <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <?php }elseif ($display['price'] < 100){?>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    <?php } ?>  
                                            </div>
                                        </div>
                                        <p style="color: #e7ab3c; font-weight: bold;"><?= $display['price'] .'$'?></p>
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            <?php }
                            $like = $connexion->query('SELECT * FROM prod WHERE category ="vêtement" LIMIT 0,3');?>
                            <?php while($display = $like->fetch()){
                            ?>
                            <div class="col-lg-4">
                                <div class="single-benefit">
                                    <div class="sb-icon">
                                        <img  style="width: 100px;" src="images/<?= $display['id'] ?>.jpg" alt="<?= $display['name'] ?>">
                                    </div>
                                    <div class="sb-text">
                                        <a  style='color: black; font-size: 15px;' href="product_detail.php?detail=<?= $display['name']?>">
                                            <b><?= $display['name'] ?></b></a>
                            
                                        <div class="pd-rating">
                                            <div class="catagory-name" style="color: #e7ab3c;">
                                                    <?php if($display['price'] < 300 AND $display['price']  > 200){
                                                    ?>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <?php }elseif($display['price'] <= 200 AND $display['price'] >= 100 ){?>
                                                     <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <?php }elseif ($display['price'] < 100){?>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    <?php } ?>  
                                            </div>
                                        </div>
                                        <p style="color: #e7ab3c; font-weight: bold;"><?= $display['price'] .'$'?></p>
                                        <hr>
                                    </div>
                                </div> 
                            </div>
                            <?php }
                            $like = $connexion->query('SELECT * FROM prod ORDER BY id DESC LIMIT 0,3');
                            while($display = $like->fetch()){
                            ?>
                            <div class="col-lg-4">
                                <div class="single-benefit">
                                    <div class="sb-icon">
                                        <img  style="width: 100px;" src="images/<?= $display['id'] ?>.jpg" alt="<?= $display['name'] ?>">
                                    </div>
                                    <div class="sb-text">
                                        <a  style='color: black; font-size: 15px;' href="product_detail.php?detail=<?= $display['name']?>">
                                            <b><?= $display['name'] ?></b></a>
                            
                                        <div class="pd-rating">
                                            <div class="catagory-name" style="color: #e7ab3c;">
                                                    <?php if($display['price'] < 300 AND $display['price']  > 200){
                                                    ?>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <?php }elseif($display['price'] <= 200 AND $display['price'] >= 100 ){?>
                                                     <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <?php }elseif ($display['price'] < 100){?>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    <?php } ?>  
                                            </div>
                                        </div>
                                        <p style="color: #e7ab3c; font-weight: bold;"><?= $display['price'] .'$'?></p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                        
                    </div>
                </div>

                    


                <!----ASIDE PART---->
                <div class="col-lg-3">
                    <div class="filter-widget">
                    <div class="section-title">    
                        <h2 class="fw-title">CATEGORIES</h2>
                    </div>
                            <div class="fw-tags">
                                <div class="section-title">
                                    <h5 class="fw-title">Electroniques</h5>
                                </div>
                                <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Instruments musicaux"');
                                $cat = $display->fetch();?>
                                <a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                                
                                <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels informatiques"');
                                $cat = $display->fetch();?>
                                <a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                                    
                                <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels de ménage"');
                                $cat = $display->fetch();?>
                                <a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>   
                            
                                <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels de menuiserie"');
                                $cat = $display->fetch();?>
                                <a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>

                                <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Goupes électrogènes"');
                                $cat = $display->fetch();?>
                                <a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>

                            </div>
                            <hr>
                            <div class="fw-tags">
                                <div class="section-title">
                                    <h5 class="fw-title">Vêtements</h5>
                                </div>     
                                <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Chapeau"');
                                $cat = $display->fetch();?>
                                <a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                                
                                <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="T-shirt"');
                                $cat = $display->fetch();?>
                                <a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>
                                    
                                <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Tricot"');
                                $cat = $display->fetch();?>
                                <a href="shop.php?category=<?= $cat['cat_name']?>"><?= $cat['cat_name']?></a>   
                            </div>
                            <hr>
                    </div>
                    <div class="filter-widget">
                        <div class="section-title">
                            <h4 class="fw-title">Arrangement selon les prix</h4>
                        </div>    
                            <div class="fw-tags">
                                <?php $display = $connexion->query('SELECT * FROM prod ORDER BY price ASC LIMIT 0,10');
                                $croissant = $display->fetch();?>
                                <a href="shop.php?prix=<?= $croissant['price']?>">Croissant</a>
                                
                                <?php $display = $connexion->query('SELECT * FROM prod ORDER BY price DESC LIMIT 0,10');
                                $croissant = $display->fetch();?>
                                <a href="shop.php?prix=<?= $croissant['price']?>">Décroissant</a>
                            </div>
                            <hr>
                    </div>     

                    <div class="filter-widget">
                        <div class="section-title">
                            <h4 class="fw-title">Articles les plus Récent</h4>
                        </div>    
                            <div class="fw-tags">
                                <?php $display = $connexion->query('SELECT * FROM prod ORDER BY date_pub');
                                $recent = $display->fetch();?>
                                <a href="shop.php?recent=<?= $recent['price']?>">Plus récents</a>
                            </div>
                            <hr>
                    </div> 

                    <div class="filter-widget">
                       <div class="section-title">
                            <h2>Dernièrement publiés</h2>
                        </div>
                        <?php $display = $connexion->query('SELECT * FROM prod ORDER BY date_pub DESC LIMIT 0,5');
                        while($recent = $display->fetch()){;?> 
                        <div class="row">
                            <div class="col-sm-5">
                                <img style="width: 100px;" src="images/<?= $recent['id']?>.jpg" alt="<?= $recent['name'] ?>">
                            </div>    
                            
                            <div class="col-sm-7" >
                            <a href="product_detail.php?detail=<?= $recent['name']?>" style='color: silver;'>
                                <?= $recent['name'] ?></a>
                            <hr>
                                <span style="color: #e7ab3c;">
                                    <?= $recent['price'] .'$'?>
                                </span>
                                <span style="background-color: #e7ab3c; padding: 2%;">
                                <a href="product_detail.php?detail=<?= $recent['name']?>" style='color: white;'>voir le detail</a>
                            </span>
                            </div>
                        </div>
                        <hr>
                    <?php }?>
                    </div>




                    <div class="filter-widget">
                        <h4 class="fw-title">Articles les plus Populaires</h4>
                            <div class="fw-tags">
                                <?php $display = $connexion->query('SELECT * FROM prod WHERE id>13 ORDER BY name ASC');
                                $populaire = $display->fetch();?>
                                <a href="shop.php?populaire=<?= $populaire['price']?>">Plus populaires</a>
                            </div>
                            <hr>
                    </div>              

                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                </div>    

                
            </div>
        </div>
    </section>
    <?php }?>
    <!-- Product Shop Section End -->

    <?php //DISPLY COMMENTS 
    $prod = $connexion->query('SELECT * FROM prod WHERE id>5 AND id<15');?>

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Autres produits</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php while($pro=$prod->fetch()){?>
                <div class="col-lg-3 col-sm-12">
                    <div class="product-item">
                        <div class="pi-pic" style="height: 300px;">
                            <img src="images/<?= $pro['id']?>.jpg" alt="<?= $pro['name']?>">
                            <div class="sale"><?= $pro['category']?></div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="product_detail.php?detail=<?= $pro['name'] ?>">Voir le detail</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name"><?= $pro['cat_name']?></div>
                            <a href="product_detail.php?detail=<?= $pro['name'] ?>">
                                <h5><?= $pro['name']?></h5>
                            </a>
                            <div class="product-price">
                                <?= $pro['price'].'$'?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
     
    <!-- Related Products Section End -->

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