<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Appareils électroniques ainsi que les vêtements sont dispobles sur maliva.com | Maliva</title>

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

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels informatiques"');
            $cat = $display->fetch();?>
            <div class="single-hero-items set-bg" data-setbg="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <span>Livraison gratuite partout au congo</span>
                            <h1><?= $cat['cat_name']?></h1>
                            <p></p>
                        </div>
                        <div class="col-lg-6">
                            <img src="images/3.jpg" alt="">
                            <a href="shop.php?category=<?= $cat['cat_name']?>" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>quality<span>No 1</span></h2>
                    </div>
                </div>
            </div>
            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels de ménage"');
             $cat = $display->fetch();?>
            <div class="single-hero-items set-bg" data-setbg="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <span>Livraion gratuite partout au congo</span>
                            <h1><?= $cat['cat_name']?></h1>
                            <p></p>
                        </div>
                        <div class="col-lg-6">
                            <img src="images/17.jpg" alt="">
                            <a href="shop.php?category=<?= $cat['cat_name']?>" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>qualité<span>No 1</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <?php $display = $connexion->query('SELECT * FROM prod WHERE id=5');
                    $cat = $display->fetch();?>
                    <div class="product-large set-bg" data-setbg="images/<?= $cat['id']?>.jpg">
                        <h2 style="color: #e7ab3c; font-size: 35px;">Appareils électroniques</h2>
                        <a href="shop.php?categorie=<?= $cat['category']='électronique'?>" style="color: black;">Voir la collection</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Instruments musicaux"');
                            $cat = $display->fetch();?>
                            <li>
                                <a href="shop.php?category=<?= $cat['cat_name']?>" style="color: #e7ab3c;"><?= $cat['cat_name']?></a>
                            </li>

                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels informatiques"');
                            $cat = $display->fetch();?>
                            <li>
                                <a href="shop.php?category=<?= $cat['cat_name']?>" style="color: #e7ab3c;"><?= $cat['cat_name']?></a>
                            </li> 

                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels de ménage"');
                            $cat = $display->fetch();?>
                            <li>
                                <a href="shop.php?category=<?= $cat['cat_name']?>" style="color: #e7ab3c;"><?= $cat['cat_name']?></a>
                            </li>                              
                            
                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Matériels de menuiserie"');
                            $cat = $display->fetch();?>
                            <li>
                                <a href="shop.php?category=<?= $cat['cat_name']?>" style="color: #e7ab3c;"><?= $cat['cat_name']?></a>
                            </li>

                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Goupes électrogènes"');
                            $cat = $display->fetch();?>
                            <li>
                                <a href="shop.php?category=<?= $cat['cat_name']?>" style="color: #e7ab3c;"><?= $cat['cat_name']?></a>
                            </li> 
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">

                        <?php 
                        // ELECTRONIC PRODUCTS CAROUSELL
                        $display = $connexion->query('SELECT * FROM prod WHERE category="électronique"');?>
                        <?php while ($aff = $display->fetch()){?>
                        <div class="product-item">
                            <div class="pi-pic" style="height: 300px;">
                                <img src="images/<?php echo $aff['id'];?>.jpg" alt="<?= $aff['name'] ?>">
                                <div class="sale"><?php echo $aff['category'];?></div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view">
                                        <a href="product_detail.php?detail=<?= $aff['name']?>">Voir le detail</a>
                                    </li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?= $aff['cat_name'] ?></div>
                                <a href="product_detail.php?detail=<?= $aff['name']?>">
                                    <h5><?= $aff['name'] ?></h5>
                                </a>
                                <div class="product-price">
                                    <?= $aff['price'] .'$'?>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <?php $display = $connexion->query('SELECT * FROM prod WHERE id=12');
    $aff = $display->fetch();?>
    <section class="deal-of-week set-bg spad">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h2>Article de la semaine</h2>
                        <p>Un bonnet de meilleur qualité qui vous fait un bon look et qui vous protège contre le froid </p>
                        <div class="product-price">
                            <a href="product_detail.php?detail=<?php echo $aff['id']=12;?>" style="color: #e7ab3c;">
                                <?= $aff['name']?>
                            </a>
                        </div>

                        <div class="product-price">
                            <span>
                                <?= 'Catégorie: '.$aff['category'].' '. $aff['cat_name'] ?>
                            </span>
                        </div>

                        <div class="product-price">
                            <?= $aff['price'] . '$'?>
                        </div>
                    </div>
                    <div class="countdown-timer" id="countdown">
                        <div class="cd-item">
                            <span>56</span>
                            <p>Days</p>
                        </div>
                        <div class="cd-item">
                            <span>12</span>
                            <p>Hrs</p>
                        </div>
                        <div class="cd-item">
                            <span>40</span>
                            <p>Mins</p>
                        </div>
                        <div class="cd-item">
                            <span>52</span>
                            <p>Secs</p>
                        </div>
                    </div>
                    <a href="#" class="primary-btn">Articles simulaires</a>
                </div>
                <div class="col-lg-5 text-center">
                    <div class="section-title">
                        <img src="images/<?= $aff['id'] ?>.jpg">
                        <a href="product_detail.php?detail=<?php echo $aff['id']=12;?>" class="primary-btn">Shop Now</a>
                    <div class="section-title">
                </div> 
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                        <ul>
                             <ul>
                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Chapeau"');
                            $cat = $display->fetch();?>
                            <li>
                                <a href="shop.php?category=<?= $cat['cat_name']?>" style="color: #e7ab3c;"><?= $cat['cat_name']?></a>
                            </li>

                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="T-shirt"');
                            $cat = $display->fetch();?>
                            <li>
                                <a href="shop.php?category=<?= $cat['cat_name']?>" style="color: #e7ab3c;"><?= $cat['cat_name']?></a>
                            </li> 

                            <?php $display = $connexion->query('SELECT * FROM prod WHERE cat_name="Tricot"');
                            $cat = $display->fetch();?>
                            <li>
                                <a href="shop.php?category=<?= $cat['cat_name']?>" style="color: #e7ab3c;"><?= $cat['cat_name']?></a>
                            </li>                              
                        </ul>
                        </ul>
                    </div>
                    <div class="product-slider owl-carousel">
                        
                        <?php 
                        // CLOVES PRODUCTS CAROUSELL
                        $display = $connexion->query('SELECT * FROM prod WHERE category="vêtement"');?>
                        <?php while ($aff = $display->fetch()){?>
                        <div class="product-item">
                            <div class="pi-pic" style="height: 300px;">
                                <img src="images/<?= $aff['id']?>.jpg" alt="<?= $aff['name']?>">
                                <div class="sale"><?= $aff['cat_name']?></div>
                                <div class="icon">
                                    <i class="icon_okay_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view">
                                        <a href="product_detail.php?detail=<?= $aff['name']?>">Voir le detail</a>
                                    </li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?= $aff['cat_name']?></div>
                                <a href="product_detail.php?detail=<?= $aff['name']?>">
                                    <h5><?= $aff['name']?></h5>
                                </a>
                                <div class="product-price">
                                    <?= $aff['price'] . "$"?>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                    </div>
                </div>
                <?php $display = $connexion->query('SELECT * FROM prod WHERE id=15');
                $cat = $display->fetch();?>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="images/<?= $cat['id']?>.jpg" alt="<?= $cat['name']?>">
                        <h2 style="color: #e7ab3c; font-size: 35px;">Vêtements</h2>
                        <a href="shop.php?categorie=<?= $cat['category']="vêtement"?>" style="color: black;">
                            Voir la collection
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Informations</h2>
                    </div>
                </div>
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Livraison à domicile gratuite</h6>
                                <p>Partout au Congo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Livraison rapide</h6>
                                <p>Service de qualité</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>nous contacter</h6>
                                <p><a href="contact.php" style="color: black;">Contact</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Footer Section Begin -->
    <?php include("footer.php");?>
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