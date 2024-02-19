
<?php 
session_start();
include "connexiondb.php";
if(!isset($_SESSION['id'])) {
  header('location:accueil.php');
  exit();
}
// $idT = $_SESSION['idTontine'];
$id = $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>soit</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
       
        <!-- <link rel="stylesheet" type="text/css" href="css/monstyle.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- <link href="css/style.css" rel="stylesheet" /> -->
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
<style>
a
{
  text-decoration:none;
  color:inherit;
}
.text-faded {
  color: #f6e1c5;
}
.page-section {
  padding: 6rem 0;
}
.page-section h2.section-heading, .page-section .section-heading.h2 {
  font-size: 2.5rem;
  margin-top: 0;
  margin-bottom: 1rem;
}
.page-section h3.section-subheading, .page-section .section-subheading.h3 {
  font-size: 1rem;
  font-weight: 400;
  font-style: italic;
  font-family: "Roboto Slab", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
  margin-bottom: 4rem;
}
.section-heading {
  text-transform: uppercase;
}
.section-heading .section-heading-upper {
  display: block;
  font-size: 1rem;
  font-weight: 800;
}
.section-heading .section-heading-lower {
  display: block;
  font-size: 3rem;
  font-weight: 100;
}
.text-uppercase {
  text-transform: uppercase !important;
}
.my-3 {
  margin-top: 1rem !important;
  margin-bottom: 1rem !important;
}
.text-muted {
  --bs-text-opacity: 1;
  color: #6c757d !important;
  font-size:130%;
}
#services
{
    margin-top:10%;
}
.footer {
  background-color: rgba(47, 23, 15, 0.9);
  margin-top:10%;
}
.navbar
{
  background-color: rgba(47, 23, 15, 0.9);
  color:#f6e1c5;
}

.py-5 {
  padding-top: 3rem !important;
  padding-bottom: 3rem !important;
}
.font
 {
      
      margin: auto;
      background-color:#fcf8e3;
 }
.font:hover
{
   background-color:#e6a756;
   box-shadow:5px 5px 5px #fcf8e3; 
   margin-left:-30;
}


#bienv
{
  color:#f6e1c5;
  font-weight:bold;
  /* font-size:40px; */
  margin-bottom: 1rem !important;
}


body
{
    margin-top:5%;
    background-image:url("assets/img/tont.jpg");
    background-attachment: fixed;
  background-position: center;
  background-size: cover;

}
#about
{
  
}
img
{
  width:100%;
}
</style>
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top ">

<div class="container-fluid">

    
    <ul class="nav navbar-nav">
                
        <li> 
            <a href="editPwd.php">
            <i class="fa-solid fa-pen-to-square"></i>
                Edit Password </a>
        </li>

        
        
    </ul>
    
    
    <ul class="nav navbar-nav navbar-right">
                
        
        
        <li>
            <a href="deconnexion.php">
                <i class="fa fa-sign-out"></i>
                &nbsp Se déconnecter
            </a>
        </li>
                        
    </ul>
    
</div>
</nav>


  <section class="page-section" id="services">
            <div class="container">
            <div class="text-center">
                
                <h2 class="section-heading" id = "bienv"><?php echo  'Bienvenue '.$_SESSION['prenom'].' '.$_SESSION['nom'].' ' .'voici nos services'?></h2>
                <!-- <h3 class="section-subheading text-muted"> </h3> -->
            </div>
                <div class="row text-center">
                    <div class="col-md-4 font">
                        <span class="fa-stack fa-4x">
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                           <a href="newTontine.php">
                            <!-- <i class="fa-solid fa-users"></i> -->
                            <img src="assets/img/adh.jpg" alt="">
                          </a> 
                        </span>
                        <h4 class="my-3">Creer Tontine</h4>
                        <p class="text-muted"> Pour créer une tontine vous devez être sur de bien vouloir respecter les politiques de confidentialités.De plus vous devez aussi savoir que a partir de la date de démarrage la tontine va  commencer même si le nombre maximum de participant n'est pas atteint.Il n'y aura plus d'adhération aprés le démarrage.</p>
                    </div>
                    <div class="col-md-4 font">
                        <span class="fa-stack fa-4x">
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                            <a href="adherer.php">
                              <!-- <i class="fa-solid fa-user-plus"></i> -->
                              <img src="assets/img/grfem.jpg" alt="">
                            </a>
                        </span>
                        <h4 class="my-3">Adhérer à une Tontine</h4>
                        <p class="text-muted">En cliquant sur le boutton adhérer vous accepter les conditions et politiques de confidentialités de cette tontine.
                          Toute fois vous ne serez membre que si l'administrateur vous accepte.Et en retour un email de confirmation vous sera envoyé. 
                        </p>
                    </div>
                    <div class="col-md-4 font">
                        <span class="fa-stack fa-4x">
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                           <a href=""> 
                            <!-- <i class="fa-solid fa-right-from-bracket"></i> -->
                            <img src="assets/img/tont.jpg" alt="">
                          </a>
                        </span>
                        <h4 class="my-3">Mes tontines</h4>
                        
                              <?php $req = $pdo->query("select * from tontine, appartenir where tontine.id_tontine = appartenir.tontine_id
                          and appartenir.user_id = $id") ;
                        echo  '<p class="text-muted"> Voici la liste des tontines aux quelles vous êtes membre. Vous pouvez choisir la tontine que vous voulez consulter.</p>';
                                  while($row = $req->fetch()) {?>
                                  
                                  <p class="text-muted">


<a  style="color:#2F170F; font-weight:bold;font-family:italic;font-size:25px" href="profil.php?tont=<?php echo $row['id_tontine'] ?>"><?php echo $row['nom_tontine'];?></a>
                                  </p>
                              <?php } ?>
                           
                         
                           
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5 position-fixed-bottom">
            <div class="container"><p class="m-0 small">Copyright &copy; Fatima&zeyna 2022</p></div>
        </footer>
</body>
</html>