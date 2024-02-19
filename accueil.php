
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Accueil</title>
        <!-- <link rel="icon" type="image/x-icon" href="assets/favicon.ico" /> faima l'a commenté-->
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Bienvenue</span>
                
                <span class="site-heading-lower">Sama natteu</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="accueil.php">Home</a></li>
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="about.php">A propos</a></li>
                        <!-- <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="products.php">Products</a></li> -->
                        <li class="nav-item px-lg-4"><a class="nav-link text-uppercase" href="contact.php">Contact</a></li>
                        <li class="nav-item px-lg-4"><?php include ('connexion.php') ?></li>
                        <!-- <li class='nav-item px-lg-4'> < include ('connexion.php'); ?></li> -->
                        <!-- <li class='nav-item px-lg-4'><  include ('newTontine.php'); ?></li> -->
                        <!--  
                        include 'connexion.func.php';
                        if (connect() == 0) {
                           echo  "<li class='nav-item px-lg-4'>  include ('newTontine.php'); </li>";
                        } else {
                            echo  "<li class='nav-item px-lg-4'>  include ('connexion.php'); </li>";
                        } -->
                    
                    </ul>
                </div>
            </div>
        </nav>
        <section class="page-section clearfix">
            <div class="container">
                <div class="intro">
                    <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="assets/img/fem.jpg" alt="..." />
                    <div class="intro-text left-0 text-center bg-faded p-5 rounded">
                        <h2 class="section-heading mb-4">
                            <span class="section-heading-upper">Meilleur investissement</span>
                            <span class="section-heading-lower">Ça vaut le cout</span>
                        </h2>
                        <p class="mb-3">Voila se qu'il nous faut une épargne accessible à toute les couches de la société, garder son argent en toute sécurité sans rien payer. Ma tontine vous apporte ce luxe que les banques n'accordent qu'aux riches n'attendez plus épargnez quelque soit vos revenus!</p>
                        <div class="intro-button mx-auto"><a class="btn btn-primary btn-xl" href="#!">Inscrivez vous!</a></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="page-section cta">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 mx-auto">
                        <div class="cta-inner bg-faded text-center rounded">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Comme Promis</span>
                                <span class="section-heading-lower">Rêvons</span>
                            </h2>
                            <p class="mb-0">Avec nous le rêve est permis faite le meilleur investissement de votre vie avec sama natteu.Réaliser le plus fou de vos rêve en placant votre épargne au bon endroid.Placez votre argent avec un intéret de 0% .Sama natteu vous offre la possibilité d'épargner quelque soit vos revenus .  </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5 ">
            <div class="container"><p class="m-0 small">Copyright &copy; Fatima&zeyna 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
