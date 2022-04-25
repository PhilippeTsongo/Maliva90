<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Commandes_admin</title>

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
	                            <h4><a href="commandes.php" style="color: black;">Voir les commandes</a></h4>
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

        <?php $recupere = $connexion->query('SELECT * FROM commande ORDER BY id');?> 

        <section class="shopping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>nom</th>
                                        <th>email</th>
                                        <th>adresse</th>
                                        <th>tel</th>
                                        <th>zip code</th>
                                        <th>produit</th>
                                        <th>prix</th>
                                        <th>Qté</th>
                                        <th>Total</th>
                                        <th>date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php while($aff = $recupere->fetch())
                                    {?>
                                    <tr style="border-bottom: 1px solid silver;">
                                        <td class="total-price first-row" style="border-right: 1px solid silver;">
                                            <?= $aff["id"]?>
                                        </td>
                                        <td class="qua-col first-row" style="border-right: 1px solid silver;">
                                            <h5><?= $aff["name"]?></h5>
                                        </td>
                                        <td class="total-price first-row" style="border-right: 1px solid silver;"><?= $aff["email"]?>
                                        </td>
                                        <td class="qua-col first-row" style="border-right: 1px solid silver;">
                                            <?= $aff["address"]?>
                                        </td>
                                        <td class="total-price first-row" style="border-right: 1px solid silver;">
                                            <?= $aff["tel"]?>
                                        </td>
                                        <td class="qua-col first-row" style="border-right: 1px solid silver;">
                                            <?= $aff["zip_code"]?>
                                        </td>
                                        <td class="qua-col first-row" style="border-right: 1px solid silver;">
                                            <?= $aff["product_name"]?>
                                        </td>
                                        <td class="total-price first-row" style="border-right: 1px solid silver;">
                                            <?= $aff["unit_price"].'$'?>
                                        </td>
                                        <td class="qua-col first-row" style="border-right: 1px solid silver;">
                                            <?= $aff["quantity"].'pc'?><?php if($aff["quantity"] !=1){ echo 's';} ?>
                                        </td>
                                        <td class="total-price first-row" style="border-right: 1px solid silver;">
                                            <?= $aff["total_price"].'$'?>
                                        </td>
                                        <td class="total-price first-row" style="border-right: 1px solid silver;">
                                            <?= $aff["date_command"]?>
                                        </td>
                                    </tr>
                                    
                                <?php }?>
                                <?php if($recupere->rowCount() == 0)
                                {?>
                                    <div class="primary-btn">
                                        <a href="accueil_admin.php">Vous n'avz aucune commande pour le moment</a>
                                    </div>
                                    <hr/>
                               <?php }else{?> 
                                    <div class="primary-btn">
                                        <?php echo 'Vous avez '. $recupere -> rowCount().' Commande'?><?php if($recupere -> rowCount() !=1){ echo 's';} ?> <i class="fs-12 fa fa-arrow-down" aria-hidden="true"></i> 
                                    </div>   
                                    <hr/>
                               <?php }?>

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="cart-buttons">
                                    <a href="accueil_admin.php" class="primary-btn">    
                                        <i class="fs-12 fa fa-arrow-left" aria-hidden="true"></i>   
                                        retour
                                    </a>
                                    <a href="deconnexion.php" class="primary-btn checkout-btn">deconnexion</a>
                                </div>
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