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
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

                            <?php if(isset($_POST['submit_message'])) 
                                {
                                    if(!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message']) )
                                    {
                                        $name = htmlspecialchars($_POST['name']);
                                        $email = htmlspecialchars($_POST['email']);
                                        $message = htmlspecialchars($_POST['message']);

                                        if(strlen($name) < 20 AND preg_match("#[A-Za-z0-9]#", $name))
                                        {
                                            if(strlen($message) < 400 AND preg_match("#[A-Za-z0-9]#", $message))
                                            {
                                                if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                                {
                                                    $insere_message = $connexion -> prepare( 'INSERT INTO contact (name, email, message, date_message) VALUES (?,?,?,NOW())');
                                                    $insere_message -> execute(array($name,$email,$message));

                                                    $c_message = "Votre message a bien été posté";

                                                    $reqmail = $connexion -> prepare(" SELECT * FROM newsletter WHERE email=?");
                                                    $reqmail ->execute(array($email));
                                                    $mailexist = $reqmail->rowCount();
                                                    if($mailexist == 0)
                                                    {
                                                        $insere = $connexion -> prepare( 'INSERT INTO newsletter (name,email) VALUES (?,?)');     
                                                        $insere -> execute(array($name,$email,));
                                                        $c_message_newsletter = "En nous envoyant un message, vous vous abonnez automatiquement à notre newsletter";
                                                    }else{
                                                        $c_message="bravo! Vous etes deja dans notre newsletter";
                                                    }
                                                }else{
                                                    $message_erreur = "Adresse email invalide";
                                                }   
                                            }else{
                                            $message_erreur = "Erreur: Le message ne doit pas avoir des caractères spéciaux et doit avoir moins de 400 caractères"; 
                                            }
                                        }else {
                                            $message_erreur = "Erreur: Le nom doit avoir moins de 20 caractères";
                                        }
                                    }else{
                                        $message_erreur = "Erreur: Tous les champs doivent être completés";
                                    }
                                }?>       


                <div class="breacrumb-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">                
                                
                            <span style="color: green; font-weight: bold;">
                                <?php if(isset($c_message)){ echo '<hr>' . $c_message; }?>
                            </span>
                            <span style="color: green; font-weight: bold;">
                                <?php if(isset($c_message_newsletter)){ echo $c_message_newsletter; }?>
                            </span>                 
                             <span style="color: red; font-weight: bold;">          
                                <?php if(isset($message_erreur)){ echo $message_erreur . '<hr>' ; }?>
                            </span>
                             
                            </div>
                        </div>            
                    </div>        
                </div>
                
    <!-- Breadcrumb Section Begin -->

    <!-- Map Section Begin -->
    <div class="map spad">
        <div class="container">
            <div class="map-inner">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd"
                    height="610" style="border:0" allowfullscreen="">
                </iframe>
                <div class="icon">
                    <i class="fa fa-map-marker"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- Map Section Begin -->

    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1">
                    <div class="contact-form">
                        <div class="leave-comment">
                            <h4>Laissez un message</h4>
                            Nous allons vous répondre.
                            <hr> 
                            <p>Tous les champs obligatoires sont marqués *</p>
                            <form action="" method="post" class="comment-form">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Votre nom *" name="name">
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" placeholder="Votre Adresse email *" name="email">
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea placeholder="Votre message *" name="message"></textarea>
                                        <button type="submit" class="site-btn" name="submit_message">Envoyez le message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-lg-5">
                    <div class="contact-title">
                        <h4>Contactez nous</h4>
                        <p>Utilisez les coordonées ci-dessous pour nous contactez. Nous sommes disponibles du lundi au samadi.
                            Ce que nous désirons, c'est vous offrir non seulement des produits mais aussi un service de qualité. 
                        </p>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-location-pin"></i>
                            </div>
                            <div class="ci-text">
                                <span>Adresse:</span>
                                <p>RDC-KISANGANI/Boulevard du 30 juin</p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-mobile"></i>
                            </div>
                            <div class="ci-text">
                                <span>Tel:</span>
                                <p>+243 978 297 534 </p>
                            </div>
                        </div>
                        <div class="cw-item">
                            <div class="ci-icon">
                                <i class="ti-email"></i>
                            </div>
                            <div class="ci-text">
                                <span>Adresse Email:</span>
                                <p> kaserekamaliva@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Partner Logo Section End -->

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