<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<?php
session_start();

require("connexiondb.php");
$id=$_SESSION['idTontine'];



$req="select* from historique, users where historique.iduser = users.id_users 
and idtontine = $id ";

$res=$pdo->query($req);


while ($ligne=$res->fetch()) {
  
  
      echo "<div class=\"alert alert-danger\" role=\"alert\">   ".$ligne['prenom']." ".$ligne['nom']."  
        a versé sa mise   le ".$ligne['date_pay']."
        </div>";
}
   
  
    