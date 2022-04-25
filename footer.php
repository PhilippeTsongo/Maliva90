<footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <span style="color: white; font-size: 25px; font-weight:  bolder;">MALIVASHOP</span>
                        </div>
                        <ul>
                            <li>Adresse: RDC-Kisangani-Boulevard du 30 Juin</li>
                            <li>Tel: +243 978 297 534</li>
                            <li>Adresse email: kaserekamaliva@gmail.com</li>
                        </ul>



                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Informations</h5>
                        <ul>
                            <li><a href="./shopping-cart.php">Panier</a></li>
                            <li><a href="index.php">Accueil</a></li>
                            <li><a href="">A propos</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Mon compte</h5>
                        <ul>
                            <li><a href="register.php">Créer un compte</a></li>
                            <li><a href="login.php">Connexion</a></li>
                            <li><a href="deconnexion.php">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>

                <?php if(isset($_POST['newsletter'])){
                if(!empty($_POST['name']) AND !empty($_POST['email'])){
                    $name = htmlspecialchars($_POST['name']);
                    $email = htmlspecialchars($_POST['email']);         
                    if(strlen($name) < 12 AND preg_match("#[A-Za-z0-9]#", $name)){
             
                    $reqmail = $connexion ->prepare(" SELECT * FROM Newsletter WHERE email=?");
                    $reqmail ->execute(array($email));
                    $mailexist = $reqmail->rowCount();

                        if(filter_var($email, FILTER_VALIDATE_EMAIL) AND strlen($email) < 35 AND preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)){
                                if($mailexist == 0){

                                    $insere = $connexion -> prepare( 'INSERT INTO newsletter (name, email) VALUES (?,?)');
                                    $insere -> execute(array($name,$email));
                                    $c_msg = "Vous vous êtes abonnés";
                                }
                                else{
                                    $c_msg_erreur = "Cette adresse email est déjà utilisée";
                                }
                            }
                            else{
                            $c_msg_erreur = "Cette adresse email n'est pas valide";
                            }
                        }   
                    else{
                        $c_msg_erreur = "Erreur: Le pseudo doit avoir moins de 12 caractères et ne doit pas avoir des caractères spéciaux";
                    }
                }   
                else{
                    $c_msg_erreur = "Erreur: Tous les champs doivent être completés";
                }
            }?>


                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Notre newsletter</h5>

                        <span style="color: green">
                            <?php if(isset($c_msg)){ echo $c_msg; }?>       
                        </span>
                        <span style="color: red">
                            <?php if(isset($c_msg_erreur)){ echo $c_msg_erreur; }?>
                        </span>
                        
                        <p>Entrez votre nom et votre adresse email pour vous abonnez à notre newsletter.</p>
                        <form action="" class="subscribe-form" method="post">
                            <input type="text" placeholder="Entrer votre nom*" name="name" value="<?php if(isset($name)){ echo $name;}?>">
                            <button type="submit" name="newsletter">rejoindre</button>
                            <input type="text" placeholder="Entrer votre adresse" name="email" value="<?php if(isset($email)){ echo $email;}?>">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy; 2021 Tout droits réservés | This e-commerce is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://api.whatsapp.com/send?phone=243971122237&text=Salut%20Mr%20GeeKofGeek%Philippe%Tsongo&source=&data=" target="_blank">Philippe TSONGO THKV</a>
                                
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            (function () {
                var options = {
                    whatsapp: "+243978297534", // WhatsApp number
                    call_to_action: "message me", // Call to action
                    position: "right", // Position may be 'right' or 'left'
                };
                var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
        </script>
    </footer>