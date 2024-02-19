<?php
session_start();
require_once("connexiondb.php");
 if(isset($_GET['url']) and isset($_GET['id'])){
    $membre_id=$_GET['url'];
    $id=$_GET['id'];
          $req = "INSERT INTO appartenir(user_id, tontine_id) VALUES('$membre_id','$id' ) ";
          $res = $pdo->exec($req);
          if($res)
          {
            header("location:choice.php");
            $success_msg = "Félicitation, votre demande  a ete bien prise en compte.Voua aurez un retour bientot de la part de l'administrateur par email";
            echo '<span class="glyphicon glyphicon-ok">$succes_msg</span>';

          }


        
}
?>