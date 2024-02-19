<?php
        session_start();
        // if(!isset($_SESSION['use'])) {
        //     header('location:accueil.php');
        //     exit();
        // }
        if(isset($_SESSION['id'])){
            
            require_once('connexiondb.php');
            
            $idUser=isset($_GET['idUser'])?$_GET['idUser']:0;
            
            $etat=isset($_GET['etat'])?$_GET['etat']:0;
        
            if($etat==1)
                $newEtat=0;
            else
                $newEtat=1;

            $requete="update users set etat=? where id_users=?";
            
            $params=array($newEtat,$idUser);
            
            $resultat=$pdo->prepare($requete);
            
            $resultat->execute($params);
            
            header('location:accueilAdmin.php');
            
     }
     else
      {
                header('location:accueil.php');
      }
?>