<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appareils électroniques ainsi que les vêtements sont dispobles sur maliva.com | Maliva</title>

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
                        <a href="#"><i class="fa fa-home"></i>Accueil</a>
                        <span>Enregistration</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <?php 
    // CREATING ACAUNT  
                    if(isset($_POST['create'])) 
                    {
                        if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['pass_word']) AND !empty($_POST['confirm_pass']))
                        {
                            $name = htmlspecialchars($_POST['name']);
                            $email = htmlspecialchars($_POST['email']);
                            $pass_word = sha1($_POST['pass_word']); 
                            $confirm_pass = sha1($_POST['confirm_pass']);     

                            if(strlen($name) < 20 AND preg_match("#[A-Za-z0-9]#", $name))
                            {
                                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                {
                                    $reqmail = $connexion ->prepare(" SELECT * FROM membres WHERE email=?");
                                    $reqmail ->execute(array($email));
                                    $mailexist = $reqmail->rowCount();
                                    if($mailexist == 0)
                                    {   
                                        if(($pass_word == $confirm_pass)) 
                                        {
                                            if(strlen($pass_word) > 7 ) 
                                            {
                                                $insere = $connexion -> prepare('INSERT INTO membres (name, email, pass_word, confirm_pass) VALUES (?,?,?,?)');
                                                $insere -> execute(array($name,$email,$pass_word,$confirm_pass));
                                                    
                                                $userinfo = $insere->fetch();
                                                $_SESSION['id_user'] = $userinfo['id'];
                                                $_SESSION['name_user'] = $userinfo['name'];
                                                $_SESSION['email_user'] = $userinfo["email"];

                                                $c_msg_creat = "Votre compte a été créé avec succès <hr>";
                                                $m_shop = '<div class="register-form">  <a href="login.php" class="site-btn login-btn">
                                                    connexion
                                                </a><hr><br/><a href="shop.php" class="site-btn login-btn">
                                                    Passez une commande
                                                </a></div><hr><br/>';

                                                //header('location:login.php?email='.$_SESSION['email_user']);

                                                $mail = $connexion ->prepare(" SELECT * FROM newsletter WHERE email=?");
                                                $mail ->execute(array($email));
                                                $mailex = $mail->rowCount();
                                                if($mailex == 0)
                                                    {   
                                                        $insere = $connexion -> prepare('INSERT INTO newsletter (name, email) VALUES (?,?)');
                                                        $insere -> execute(array($name,$email));                        
                                                    }  
                                            }
                                            else{
                                                $m_erreur_creat = "Erreur: Le mot de passe doit avoir au minimum 8 caractères";  
                                            }
                                        }   
                                        else{
                                            $m_erreur_creat = "Erreur: vous avez entré deux mots de passes différents"; 
                                        }
                                    }else{
                                        $m_erreur_creat = 'Erreur: L\'adresse email<b>'. $email ."</b> est déjà utilisée";
                                    }   
                                }else{
                                 $m_erreur_creat = "Erreur: L' adresse email<b>" . $email . "</b> est invalide";
                                }
                            }else{
                                $m_erreur_creat = "Erreur: Le nom doit avoir moins de 20 lettres sans caractères spéciaux. le nom <b>". $name . "</b> a <b>" .strlen($name). " caractères</b>" ;
                            }
                        }else{
                            $m_erreur_creat = "Erreur: Tous les champs doivent être complétés";
                        }
                    }
                    ?>


    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Enregistrement</h2>
                        <span style="color: green">
                            <?php if(isset($c_msg_creat)){ echo $c_msg_creat; }?>       
                        </span>
                        <span style="color: green">
                            <?php if(isset($m_shop_command)){ echo $m_shop_command; }?>       
                        </span>
                        <span style="color: green">
                            <?php if(isset($m_shop)){ echo $m_shop; }?>       
                        </span>
                        <span style="color: red">
                           <?php if(isset($m_erreur_creat)){ echo $m_erreur_creat; }?>
                        </span>

                        <form action="" method="post">
                            <div class="group-input">
                                <label for="username">Nom d'utilisateur *</label>
                                <input type="text" id="username" name="name" placeholder="Meschack" value="<?php if(isset($name)){ echo $name;}?>">
                            </div>
                            <div class="group-input">
                                <label for="username">Adresse email *</label>
                                <input type="email" id="username" name="email" placeholder="meschack@gmail.com" value="<?php if(isset($email)){ echo $email;}?>">
                            </div>
                            <div class="group-input">
                                <label for="pass">Mot de passe *</label>
                                <input type="text" id="pass" name="pass_word" placeholder="********">
                            </div>
                            <div class="group-input">
                                <label for="con-pass">Confirmez le mot de passe *</label>
                                <input type="text" id="con-pass" name="confirm_pass" placeholder="**********">
                            </div>
                            <button type="submit" class="site-btn register-btn" name="create">CREEZ</button>
                        </form>
                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Ou se connecter</a>
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