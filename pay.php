<?php
    session_start();
    include "connexiondb.php";
    $idT = $_SESSION['idTontine'];
    $id = $_SESSION['id'];
    // $req= "insert into historique_pay(id,user_id,tontine_id) values(null,$id,$idT)";
    // $res=$pdo->exec($req);
    
    
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
       
        <!-- <link rel="stylesheet" type="text/css" href="css/monstyle.css"> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- <link href="css/style.css" rel="stylesheet" /> -->
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
<title>AccueilMembre</title>

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
    /* padding:2%; */
}
.footer {
  background-color: rgba(47, 23, 15, 0.9);
  margin-top:10%;
}
.py-5 {
  padding-top: 3rem !important;
  padding-bottom: 3rem !important;
}
#fa
{
    margin-top:1%;
}

    </style>
    
</head>
<body >
<!-- onload="alerter()" -->
    
   
    


<section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                
                    <!-- <h2 class="section-heading text-uppercase">Nos Services</h2> -->
                    <h3 class="section-subheading text-muted"> </h3>
                </div>
                <div class="row text-center ">
                    <div class="col-md-4">
                        <!-- <span class="fa-stack fa-4x"> -->
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                           <a href="om.php"><img src="assets/img/OM.JPG" alt="" style = "width:70%;"></a>
                        <!-- </span> -->
                        <!-- <h4 class="my-3">Ajouter mise</h4> -->
                        
                    </div>
                    <div class="col-md-4">
                        <!-- <span class="fa-stack fa-4x"> -->
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                            <a href="om.php"> <img src="assets/img/wave.PNG" alt=""> </a>
                        
                    </div>
                    <div class="col-md-4">
                        <!-- <span class="fa-stack fa-4x"> -->
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                          <img src="assets/img/free.PNG" alt="">
                        </span>

                    </div>
                </div>
            </div>

            <div class="container" id="fa">
                <div class="text-center">
                
                    <!-- <h2 class="section-heading text-uppercase">Nos Services</h2> -->
                    <h3 class="section-subheading text-muted"> </h3>
                </div>
                <div class="row text-center ">
                    <div class="col-md-4">
                        <!-- <span class="fa-stack fa-4x"> -->
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                           <img src="assets/img/Kpay.JPEG" alt="" >
                        <!-- </span> -->
                        <!-- <h4 class="my-3">Ajouter mise</h4> -->
                        
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                           <img src="assets/img/visa.JPEG" alt="">
                        
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <!-- <i class="fas fa-circle fa-stack-2x text-primary"></i> -->
                          <img src="assets/img/wizzal.PNG" alt="">
                        </span>

                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5 position-fixed-bottom">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2022</p></div>
        </footer>
        
        <!-- <script>
            function alerter() {
                alert("paiement validé!");
            }
           
        </script> -->
</body>
</html>
