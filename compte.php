<?php
session_start();
if(!isset($_SESSION['id'])) {
  header('location:accueil.php');
  exit();
  
}
include "connexiondb.php";
$id = $_SESSION['idTontine'];
$idU = $_SESSION['id'];
if(isset($_POST['con']))
{
     $re = "select mise from tontine where id_tontine = $id";
     $rs = $pdo->query($re);
     $req= "insert into historique_pay(user_id,tontine_id,date_pay) values($idU,$id,'".date('Y-m')."-05')";
     $res=$pdo->exec($req);
     if($res)
    while($row = $rs->fetch())
     {
        $mise = $row['mise'];
        $reqq = "update tours set somme_recolte = somme_recolte + $mise where tontine_id = $id";
        $result=$pdo->exec($reqq);
        // var_dump($reqq);
        // die();
      }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/monstyle.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
    <title>Paiement</title>
    <style>
    .panel-hh{
    border-color:#f6e1c5;
    }  
    .panel-heading
    {
    background-color:#f6e1c5;
    }
    .bg-faded {
        
  color: #fff;
  background-color: #2F170F;
  border-color: #2F170F;
}
    </style>
</head>
<body>
<div class="container col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
    <div class="panel panel-hh margetop60">
        <div class="panel-heading">Envoie Somme</div>
           <div class="panel-body">
                <form action="" class="form" method = "post">
                <?php $req = $pdo->query("select somme_recolte from tours as t, users as u where u.id_users = t.user_id and t.tontine_id = $id ") ;
                if($rows = $req->fetch()) {?>
                 
                       <div class="form-group">
                        Somme Recolté:
                         <input type="text" name="mise" value = "<?php echo $rows['somme_recolte']; ?>"  class="form-control" disabled >
                        </div>
                    
                        <?php } ?>
                <?php $req = $pdo->query("select tel from users as u, tours as t where u.id_users = t.user_id and t.tontine_id = $id ") ;
                if($rows = $req->fetch()) {?>
                membre Elu :
                   <div class="form-group">
                        <input type="text" name="mise" value = "<?php echo $rows['tel']; ?>" class="form-control" disabled>
                    </div>
                <?php } ?>
                <button type="submit" name="con" class="btn bg-faded" onclick = "alerter()">
                <!-- <i class="fa-solid fa-circle-check"></i> -->
                    Valider
                </button> 

                </form>
            </div>
        </div>
    </div>
</div>
<script>
function alerter() {
alert("paiement validé!");
}
           
        </script>
</body>
</html>