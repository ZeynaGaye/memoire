<?php
    session_start();
    if(!isset($_SESSION['id'])) {
      header('location:accueil.php');
      exit();
      
  }
  include "connexiondb.php";
  $id = $_SESSION['idTontine'];
  $user = $_SESSION['id'];
  // $n=0;
  // $reqAn="SELECT count(*) countUser FROM annonce  WHERE tontine_id=$id and user_id != $user";
         
          
  //          $a=$pdo->query($reqAn);
  //           $n=$a->rowCount();
    
    
    
         
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="css/bootstrap.css"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
       
        <!-- <link rel="stylesheet" type="text/css" href="css/monstyle.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- <link href="css/styleg.css" rel="stylesheet" /> -->
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
<title>Administrateur</title>

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
    margin-top:5%;

}
.footer {
  background-color: rgba(47, 23, 15, 0.9);
  margin-top:10%;
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
  color:#e6a756;
  font-weight:bold;
  font-size:40px;
  margin-bottom: 1rem !important;
}


#services
{
    margin-top:5%;
    background-image:url("assets/img/tontin.jpg");
    background-attachment: fixed;
  background-position: center;
  background-size: cover;

}
.navbar
{
  background-color:#2F170F;
}
img
{
  width:100%;
}
</style>
    
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" >

<div class="container-fluid">

    <!-- <div class="navbar-header">
    
        <a href="Etudiant.php" class="navbar-brand">Gestion des Etudiants</a>
        
    </div> -->
    
    <ul class="nav navbar-nav">
                
        <li> 
            <a href="editPwd.php">
            <i class="fa-solid fa-pen-to-square"></i>
                Edit Password </a>
        </li>
        
         <li><a href="annonce.php">
         <i class="fa-solid fa-bullhorn"></i>
                Faire une annonce
            </a>
        </li> 
        <?php
            
            // $pdo=new PDO('mysql:host=localhost;dbname=gestion_tontine','root','',
            // array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            $user = $_SESSION['id'];
            $classe= $_SESSION['idTontine'];
            $req2="SELECT * FROM annonce  WHERE tontine_id=$classe and user_id != $user";
            $res1=$pdo->query($req2);
            $n=$res1->rowCount();
        ?>

        
        <li><a href="notification.php">
              <i class="fas fa-bell"></i>
              <span class="badge badge-counter"><?php echo $n;?></span>  
            </a>
        </li>
             
         <li>
            <a href="#about" class="get-started-btn scrollto"> 
            <i class="fa-solid fa-users"></i> Membres</a>
         </li>
         <li>
            <a href="choice.php" class="get-started-btn scrollto"> 
            <i class="fa-solid fa-users"></i>Mes Tontines</a>
         </li>
        
    </ul>
    
    
    <ul class="nav navbar-nav navbar-right">
                
        <li>
             <a href="choixTresorier.php">
                 <i class="fa-solid fa-user-plus"></i>
                 ajouter tresorier
             </a> 
        </li>
        <li>
      
        
        <button style = "margin-top:10%;"  >
        <a style = "text-decoration:none;
        color:inherit;" href="tirage.php">
             Tirage
             </a>
      </button>
      
        </li>
        
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
                
                    <h2 id="bienv" class="section-heading"><?php echo 'Bienvenue'. ' '.$_SESSION['prenom'].' '.$_SESSION['nom']. ' '.'à votre tontine'. ' ' .$_SESSION['nomton']?></h2>
                    <!-- <h3 class="section-subheading text-muted"> </h3> -->
                </div>
                <div class="row text-center ">
                    <div class="col-md-4 font" >
                        <span class="fa-stack fa-4x">
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                           <a href="pay.php">
                            <!-- <i class="fa-solid fa-users"></i> -->
                            <img src="assets/img/mise.png" alt="">
                          </a> 
                        </span>
                        <h4 class="my-3">Ajouter mise</h4>
                        <p class="text-muted">Veuillez cliquer sur ce lien pour ajouter votre mise selon l'opérateur de votre soit. Veuillez respecter les délais svp sinon une amande sera votre sanction merci!</p>
                    </div>
                    <div class="col-md-4 font">
                        <span class="fa-stack fa-4x">
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                            <a href="persElu.php">
                              <!-- <i class="fa-solid fa-user-plus"></i> -->
                              <img src="assets/img/creer.jpg" alt="">
                            </a>
                        </span>
                        <h4 class="my-3">evolution de la tontine</h4>
                        <p class="text-muted">Veuillez cliquer sur ce lien pour voir l'évolution de la tontine. Vous pouvez visualiser les personnes ayant déjà bénificier d'une tour et éventuellement connaitre le nombre de personne restant</p>
                    </div>
                    <div class="col-md-4 font ">
                        <span class="fa-stack fa-4x">
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                           <a href="historique.php"> 
                            <!-- <i class="fa-solid fa-right-from-bracket"></i> -->
                            <img src="assets/img/hist.png" alt="">
                          </a>
                        </span>
                        <h4 class="my-3">Historique des payements</h4>
                        <p class="text-muted">Sur ce lien vous avez l'historique des payments par séance. Par conséquent vous pouvez savoir qui sont en régle et ceux qui ne le sont pas.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
          <?php include("listeMembre.php");?>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100"id="membre">
         
          <!-- <img src="assets/img/epargnee.jpg" class="img-fluid" alt=""> -->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
        <footer class="footer text-faded text-center py-5 position-fixed-bottom">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <script src="assets/js/main.js"></script>
</body>
</html>

<!-- tache prograammé -->

<?php 




  // $pdo = new PDO("mysql:host=localhost;dbname=gestion_tontine",
  // "root", ""); 

$reqE = "select email from users, appartenir where users.id_users = appartenir.user_id
and appartenir.tontine_id = $id";
$resE = $pdo->query($reqE);
while($env=$resE->fetch())
{
  echo
  $to = $env['email'];

  $subject = "Sujet de l'e-mail";
  
  $message = "Contenu de l'e-mail";
  
  $headers = "From: fatimatasow18@gmail.com"."\r\n";
  
  if (mail($to, $subject, $message, $headers)) {
    echo "L'e-mail a été envoyé avec succès.";
  } else {
    echo "Une erreur s'est produite lors de l'envoi de l'e-mail.";
  }
}
  
?>

<script>
  setInterval(myTimer, 1000);

function myTimer() {
  const date = new Date();
document.getElementById("demo").innerHTML = date.toLocaleTimeString();
}
</script>
<!-- randomme -->

<!-- <script>
function myFunction() {
  alert("I am an alert box!");
}
</script> -->



