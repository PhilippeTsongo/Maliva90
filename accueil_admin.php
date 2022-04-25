<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil_admin</title>

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
    <?php include('header_index.php');
    // Header End 
	?>

	<div class="banner-section spad">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-lg-4">
	                    <div class="single-banner">
	                        <img src="img/banner-1.jpg" alt="">
	                        <div class="inner-text">
	                            <h4><a href="accueil_admin.php?manage" style="color: black;"> Voir les Produits</a></h4>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-lg-4">
	                    <div class="single-banner">
	                        <img src="img/banner-2.jpg" alt="">
	                        <div class="inner-text">
	                            <h4><a href="redaction.php" style="color: black;">Publiez un produit</a></h4>
	                        </div>
	                    </div>
	                </div>
	                <div class="col-lg-4">
	                    <div class="single-banner">
	                        <img src="img/banner-3.jpg" alt="">
	                        <div class="inner-text">
	                            <h4><a href="commande.php?manage" style="color: black;">Voir les commandes</a></h4>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>



	<?php if(isset($_GET['manage']))
	{ 
	if(!empty($_SESSION['name_admin']))
	{ ?>


		<section class="product-shop spad">
                <div class="container">
                    <div class="row">        
                        <div class="col-lg-12 order-1 order-lg-2">
                            <div class="product-list"> 
                                <div class="row">
                                <?php $recupere = $connexion->query('SELECT * FROM prod ORDER BY id');
                                while($aff = $recupere->fetch()) 
                                {?>     
                                    <div class="col-lg-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic" style="border: 1px solid silver;height: 400px;">
                                                <img src="images/<?= $aff['id']?>.jpg" alt="">
                                                <div class="sale pp-sale">Nos produits</div>
                                                <div class="icon">
                                                    <i class="icon_heart_alt"></i>
                                                </div>
                                                <ul>
                                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                                    <li class="quick-view"><a href="redaction.php?edit=<?= $aff['id'] ?>">Modifier</a></li>
                                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="pi-text">
                                                <div class="catagory-name"><?= $aff['cat_name'] ?></div>
                                                <a href="redaction.php?edit=<?php echo $aff['id'];?>">
                                                    <h5><?= $aff['name'] ?></h5>
                                                </a>
                                                <div class="product-price">
                                                    <?= $aff['price'] .'$'?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <?php } ?>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
	 <?php }else{


						// CONNECTION FORM
						if(isset($_POST['submit_login'])) 
						{

							$name_connect = htmlspecialchars($_POST['name_connect']);
							$pass_word_connect = $_POST['pass_word_connect'];
							if(!empty($name_connect) AND !empty($pass_word_connect))
								{
						// CREATION DES SESSIONS D'UTILISATEUR 
									$requser = $connexion->prepare("SELECT * FROM admin WHERE name_connect = ?  AND pass_word_connect = ? ");
									$requser->execute(array($name_connect, $pass_word_connect));
									$userexist = $requser->rowCount();
									if($userexist == 1)
									{
										$userinfo = $requser->fetch();
										$_SESSION['id_admin'] = $userinfo['id'];
										$_SESSION['name_admin'] = $userinfo['name_connect'];
										$_SESSION['email_admin'] = $userinfo['email_connect'];

										$m_log ="<hr><b>Vous êtes connectés en tant qu'administrateur</b>";
										$m_shop = "<a href='accueil_admin.php?manage' class='site-btn login-btn' >voir les produits</a><br/>";

									}
									else
									{
										$m_erreur_log = "Erreur: Môt de passe ou nom d'utilisateur incorrect";	
									}
								}	
								else
								{
							 		$m_erreur_log = "Erreur: Vous devez complétez tous les champs";
								}
							}?>

						<!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>CONNEXION | ADMIN</h2>

                        <form action="" method="post">
                            <div style="color: green">
                                <?php if(isset($m_log)){ echo $m_log; }?>       
                            </div>
                            <div style="color: red">
                                <?php if(isset($m_erreur_log)){ echo $m_erreur_log; }?>
                            </div>
                            <hr>
                            <div style="color: green">
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
    <!-- Register Form Section End -->	



	<?php }}?> 
    
	<!-- Footer -->
	
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