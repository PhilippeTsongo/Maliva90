<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

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
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Breadcrumb Form Section Begin -->

    <?php

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
                                $m_shop = 'Cliquez sur Passez une commande pour continuer. <hr> <a href="shop.php" class="site-btn login-btn">
                                             Passez une commande
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
   


    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="login-form">
                        <h2>CONNEXION</h2>

                        <form action="" method="post">
                            <div style="color: green">
                                <?php if(isset($m)){ echo $m; }?>       
                            </div>
                            <div style="color: red">
                                <?php if(isset($m_erreur)){ echo $m_erreur; }?>
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