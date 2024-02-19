<?php
// session_start();
// if(!isset($_SESSION['use'])) {
//     header('location:authEnseignant.php');
//     exit();
// }
     require_once('connexiondb.php');
     if(isset($_GET['idUser']))
     {
         $id = $_GET['idUser'];
         $requete="delete from appartenir where user_id=$id";
         $res=$pdo->exec($requete);
           
         {
             $result= "delete from users where id_users=$id";
             $resultat = $pdo->exec($result);
             if($result)
             {
                echo" suppression  reussi";
                header('location:accueilAdmin.php');
             }
             else
             {
                echo" suppression echouee!reessayer";
             }
             
         }

     }