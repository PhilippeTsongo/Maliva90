<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Redaction | Maliva</title>

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
    

    <!-- Header Section Begin -->
    <?php include('header_index.php');
    // Header End 

    $mode_edition = 0;
    if(isset($_GET['edit']) AND !empty($_GET['edit'])) 
    {   
        $mode_edition = 1;
        $edit_id = htmlspecialchars($_GET['edit']);
        $edit_article = $connexion->prepare('SELECT * FROM prod WHERE id = ?');
        $edit_article->execute(array($edit_id));
        if($edit_article->rowCount() == 1) 
        {
          $edit_article = $edit_article->fetch();
        } else
        {
          die('Erreur : l\'article n\'existe pas...');
       }
    }

    if(isset($_POST['publier']) AND !empty($_POST['publier']))
    {
        if(!empty($_POST['name']) AND !empty($_POST['price']) AND !empty($_POST['descript']) AND !empty($_POST['cat_name']) AND !empty($_POST['category']))
        {
            $name = htmlspecialchars($_POST['name']);
            $price = htmlspecialchars($_POST['price']);
            $desc = htmlspecialchars($_POST['descript']);
            $cat_name = htmlspecialchars($_POST['cat_name']);
            $category = htmlspecialchars($_POST['category']);
            $color = htmlspecialchars($_POST['color']);
            $size = htmlspecialchars($_POST['size']);


            if($mode_edition == 0) {
             // var_dump($_FILES);
             // var_dump(exif_imagetype($_FILES['miniature']['tmp_name']));
            $ins = $connexion->prepare('INSERT INTO prod (name, price, descript, cat_name, category, color, size, date_pub) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())');
            $ins->execute(array($name, $price, $desc, $cat_name, $category, $color, $size));

                $lastid = $connexion->lastInsertId();
         
                if(isset($_FILES['monfichier']) AND !empty($_FILES['monfichier']['name'])) 
                {
                    if(exif_imagetype($_FILES['monfichier']['tmp_name']) == 2) 
                    {
                        $chemin = 'images/'.$lastid.'.jpg';
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], $chemin);
                    } else {
                        $m_erreur_creat = 'Votre image doit être au format jpg';
                        $m_erreur_creat = 'Votre produit a été publié sans l\'image';
                    }
                }

            $c_msg_creat = "<div class='site-btn register-btn'>Votre produit a bien été  publié</div>";
            }else{
                $update = $connexion->prepare('UPDATE prod SET name = ?, price = ?, descript= ?, cat_name = ?, category = ?, color=?, size=?, date_pub = NOW() WHERE id = ?');
                $update->execute(array($name, $price, $desc, $cat_name, $category, $color, $size, $edit_id));
         
                $c_msg_creat = '<div class=\'site-btn register-btn\'>Votre produit a bien été mis à jour !</div>';
            }
        }else{
            $m_erreur_creat = "Tous les champs doivent être complétés";
        }
    }?>



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
                                <h4><a href="accueil_admin.php" style="color: black;">Supprimer un produit</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php if(!empty($_SESSION['name_admin']))
    { ?>

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Nouveaux produits</h2>
                        <span style="color: green;">
                            <?php if(isset($c_msg_creat)){ echo $c_msg_creat; }?>       
                        </span>
                        
                            <?php if(isset($m_shop_command)){ echo $m_shop_command; }?>       
                      
                            <?php if(isset($m_shop)){ echo $m_shop; }?>       
                        <span style="color: red;">
                           <?php if(isset($m_erreur_creat)){ echo $m_erreur_creat; }?>
                        </span>
                        
                        <form action="" method="post" enctype="multipart/form-data">
                           
                            <div class="group-input">
                                <label for="username">Nom du produit *</label>
                                <input type="text" id="username" name="name" <?php if($mode_edition == 1) { ?> value="<?= $edit_article['name'] ?>"<?php } ?>>
                            </div>
                           
                            <div class="group-input">
                                <label for="username">Prix du produit *</label>
                                <input type="text" id="username" name="price" <?php if($mode_edition == 1) { ?> value="<?= $edit_article['price'] ?>"<?php } ?>>
                            </div>

                            <div class="group-input">
                                <label for="pass"> Déscription du produit *</label>
                                <input type="text" id="pass" name="descript" <?php if($mode_edition == 1) { ?> value="<?= $edit_article['descript'] ?>"<?php } ?>>
                            </div>
                           
                            <div class="group-input">
                                <label for="pass"> Catégorie du produit*</label>
                                <input type="text" id="pass" name="cat_name" <?php if($mode_edition == 1) { ?> value="<?= $edit_article['cat_name'] ?>"<?php } ?>>
                            </div>

                            <div class="group-input">
                                <label for="con-pass">Catégorie électronique ou vêtement *</label>
                                <input type="text" id="con-pass" name="category" <?php if($mode_edition == 1) { ?> value="<?= $edit_article['category'] ?>"<?php } ?>>
                            </div>

                            <div class="group-input">
                                <label for="con-pass">CES CHAMPS CONCERNENT LES VETEMENTS </label>
                                <label for="pass"> Couleurs disponibles du produit </label>
                                <input type="text" id="pass" name="color" <?php if($mode_edition == 1) { ?> value="<?= $edit_article['color'] ?>"<?php } ?>>
                            </div>

                            <div class="group-input">
                                <label for="pass"> Numéros disponibles du produit </label>
                                <input type="text" id="pass" name="size" <?php if($mode_edition == 1) { ?> value="<?= $edit_article['size'] ?>"<?php } ?>>
                            </div>

                            <div class="group-input" >
                                <label>Joindre l'image du produit(.jpg) *</label>
                                <input type="file" style="padding: 2.5%; background: #e7ab3c;" name="monfichier">
                            </div>
                            <input type="submit" class="site-btn register-btn" name="publier"value="Publiez">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->   
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
                                        $m_shop = "<a href='redaction.php?manage' class='site-btn login-btn' >Publiez un nouveau produit</a><br/>";

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
                        <h2>CONNEXION | ADMINISTRATION</h2>

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



    <?php }?>


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