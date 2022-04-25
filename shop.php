<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appareils électroniques ainsi que les vêtements sont dispobles sur maliva.com | shop </title>

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
    </div>
    -->

    <!-- Header Section Begin -->
    <?php include('header_index.php');?>    
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.php"><i class="fa fa-home"></i> Accueil</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">

                    <?php       // BARRE DE RECHERCHE
                    $recherche = $connexion -> query('SELECT id, name, price , CONCAT(name,price)  concatenation FROM prod ORDER BY id  DESC LIMIT 0,5');

                    if(isset($_GET['recherche']) AND !empty($_GET['recherche'])) {
                    $look_for = htmlspecialchars($_GET['recherche']);?>

                    <?php $recherche = $connexion -> query('SELECT id, name ,price , CONCAT(name,price)  concatenation FROM prod WHERE name like "%'.$look_for.'%" ORDER BY id DESC LIMIT 0,5');   
                
                    if ($recherche -> rowCount() > 0 AND preg_match("#[A-Za-z0-9]#", $look_for) ){ ?>



                    <?php $m_re= "Pour votre recherche: <mark>" . $look_for. "</mark> nous parvenons à trouver:" ;?> 

                    <span style="color: #e7ab3c; font-weight: bolder;">
                        <?php if(isset($m_re)){ echo $m_re; }?>
                        <hr>
                    </span>     
                    <div class="product-list">
                        <div class="row">
                            <?php while($donnees = $recherche -> fetch()) { ?>  
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic" style="height: 300px;">
                                        <img src="images/<?= $donnees['id']?>.jpg" alt="<?= $donnees['concatenation']?>">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product_detail.php?detail=<?= $donnees['name']?>">Voir le detail</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">
                                            
                                        </div>
                                        <a href="product_detail.php?detail=<?= $donnees['name']?>">
                                            <h5><?= $donnees['name']?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?= $donnees['price']. "$"?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <?php }else{ // IF NOT EXIST THE PRODUCT YOU LOOK FOR DISPLAY THE FOLLWING
                        $m_erreur_re = "nous ne parvenons pas à trouver <mark>" . $look_for . "</mark> dans la liste de nos produits. Veuillez entrez une autre recherche svp!";
                        // DISPLAY THE PRODUCTS IF THERE IS NO MATCHING RESEARCH
                        ?>
                        <span style="color: red; font-weight: bolder;">
                            <?php if(isset($m_erreur_re)){ echo $m_erreur_re; }?>
                        <hr>
                        </span>

                        <div class="product-list">
                        <div class="row">
                            <?php $display = $connexion->query('SELECT * FROM prod WHERE id>5');
                            while($donnees = $display->fetch()){;?> 
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic" style="height: 300px;">
                                        <img src="images/<?= $donnees['id']?>.jpg" alt="<?= $donnees['name']?>">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product_detail.php?detail=<?= $donnees['name']?>">Voir le detail</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">
                                            
                                        </div>
                                        <a href="product_detail.php?detail=<?= $donnees['name']?>">
                                            <h5><?= $donnees['name']?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?= $donnees['price']. "$"?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <?php }?>
                <?php }?>
                    


                    <?php if(isset($_GET['default2']) and !empty($_GET['default2'])) {
                        echo 'default articles';
                    }
                    ?>


                    <?php  //GET CATEGORIES
                    if(isset($_GET['category']) AND !empty($_GET['category'])){
                    $getcategory = htmlspecialchars($_GET['category']);
                    $dis_cat = $connexion->prepare('SELECT * FROM prod WHERE cat_name=?');
                    $dis_cat -> execute(array($getcategory));?>
                    <div class="product-list">
                        <div class="row">
                            <?php while($display = $dis_cat->fetch()){
                            ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic" style="height: 300px;">
                                        <img src="images/<?= $display['id']?>.jpg" alt="<?= $display['name']?>">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product_detail.php?detail=<?= $display['name']?>">Voir le detail</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">
                                            <?= $display['cat_name']?>
                                        </div>
                                        <div class="catagory-name" style="color: #e7ab3c;">    
                                            <?php if($display['price'] < 600 AND $display['price']  > 200){
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
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } ?>  

                                        </div>
                                        <a href="product_detail.php?detail=<?= $display['name']?>">
                                            <h5><?= $display['name']?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?= $display['price']."$"?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                    <?php }?>

                    <?php  //GET ORDER CROISSANT OU DECROISSANT
                    if(isset($_GET['prix']) AND !empty($_GET['prix'])){
                    $getcategory = (htmlspecialchars($_GET['prix']));    
                    $dis_cat = $connexion->prepare('SELECT * FROM prod WHERE price=? LIMIT 0,10 ');
                    $dis_cat -> execute(array($getcategory));
                    ?>
                    <div class="product-list">
                        <div class="row">
                            <?php while($display = $dis_cat->fetch()){
                            ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic" style="height: 300px;">
                                        <img src="images/<?= $display['id']?>.jpg" alt="<?= $display['name']?>">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product_detail.php?detail=<?= $display['name']?>">Voir le detail</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">
                                            <?= $display['cat_name']?>
                                        </div>
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
                                                <i class="fa fa-star"></i>

                                            <?php } ?>  

                                        </div>
                                        <a href="product_detail.php?detail=<?= $display['name']?>">
                                            <h5><?= $display['name']?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?= $display['price']."$"?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                    <?php }?>

                    <?php  //GET PLUS RECENTS
                    if(isset($_GET['recent']) AND !empty($_GET['recent'])){
                    $getcategory = (htmlspecialchars($_GET['recent']));    
                    $dis_cat = $connexion->query('SELECT * FROM prod ORDER BY date_pub DESC LIMIT 0,10');
                    $dis_cat -> execute(array($getcategory));
                    ?>
                    <div class="product-list">
                        <div class="row">
                            <?php while($display = $dis_cat->fetch()){
                            ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic" style="height: 300px;">
                                        <img src="images/<?= $display['id']?>.jpg" alt="<?= $display['name']?>">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product_detail.php?detail=<?= $display['name']?>">Voir le detail</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">
                                            <?= $display['cat_name']?>
                                            <?= $display['date_pub']?>
                                        </div>
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
                                                <i class="fa fa-star"></i>
                                            <?php } ?>  
                                        </div>
                                        <a href="product_detail.php?detail=<?= $display['name']?>">
                                            <h5><?= $display['name']?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?= $display['price']."$"?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                    <?php }?>


                    <?php  //GET PLUS POPULAIRES ET MOINS POPULAIRES
                    if(isset($_GET['populaire']) AND !empty($_GET['populaire'])){
                    $getcategory = (htmlspecialchars($_GET['populaire']));    
                    $dis_cat = $connexion->query('SELECT * FROM prod WHERE price<300 LIMIT 0,30');
                    $dis_cat -> execute(array($getcategory));
                    ?>
                    <div class="product-list">
                        <div class="row">
                            <?php while($display = $dis_cat->fetch()){
                            ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic" style="height: 300px;">
                                        <img src="images/<?= $display['id']?>.jpg" alt="<?= $display['name']?>">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view">
                                            <a href="product_detail.php?detail=<?= $display['name']?>">Voir le detail</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">
                                            <?= $display['cat_name']?>
                                            <?= $display['date_pub']?>
                                        </div>
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
                                                <i class="fa fa-star"></i>
                                            <?php } ?>  

                                        </div>
                                        <a href="product_detail.php?detail=<?= $display['name']?>">
                                            <h5><?= $display['name']?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?= $display['price']."$"?> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                    <?php }?>

                    <?php  //GET COLLECTION ELECTRONIQUE ET VETEMENT
                    if(isset($_GET['categorie']) AND !empty($_GET['categorie'])){
                    $getcategory = (htmlspecialchars($_GET['categorie']));    
                    $dis_cat = $connexion->prepare('SELECT * FROM prod WHERE category=?');
                    $dis_cat -> execute(array($getcategory));
                    ?>
                    <div class="product-list">
                        <div class="row">
                            <?php while($display = $dis_cat->fetch()){
                            ?>
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic" style="height: 300px;">
                                        <img src="images/<?= $display['id']?>.jpg" alt="<?= $display['name']?>">
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product_detail.php?detail=<?= $display['name']?>">Voir le detail</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name">
                                            <?= $display['cat_name']?>
                                            <?= $display['date_pub']?>
                                        </div>
                                        <a href="product_detail.php?detail=<?= $display['name']?>">
                                            <h5><?= $display['name']?></h5>
                                        </a>
                                        <div class="product-price">
                                            <?= $display['price']."$"?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                        </div>
                    </div>
                    <?php }?>

                    <?php $display = $connexion->query('SELECT * FROM prod');
                    $cat = $display->fetch();?>
                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="shop.php?categorie=<?= $cat['category']='électronique' ?>">Electroniques</a>
                        <i class="icon_loading"></i>
                        <a href="shop.php?categorie=<?= $cat['category']='Vêtement' ?>">Vêtements</a>
                    </div>
                    <hr>
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
                                <img src="images/<?= $recent['id']?>.jpg" alt="<?= $recent['name'] ?>">
                            </div>    
                            
                            <div class="col-sm-7">
                            <a href="product_detail.php?detail=<?= $recent['name']?>" style='color: silver;'>
                                <?= $recent['name'] ?></a>
                            <hr>

                                <div class="pd-rating">

                                    <div class="catagory-name" style="color: #e7ab3c;">
                                            <?php if($recent['price'] < 300 AND $recent['price']  > 200){
                                            ?>
                                            <div class="pd-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <?php }elseif($recent['price'] <= 200 AND $recent['price'] >= 100 ){?>
                                             <div class="pd-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <?php }elseif ($recent['price'] < 100){?>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } ?>  

                                    </div>
                                </div>

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
    <!-- Product Shop Section End -->

    <!-- Footer Section Begin -->
    <?php include('footer.php'); ?>
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