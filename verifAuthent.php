<?php
    session_start();
    require_once('connexiondb.php');
    
    $login=isset($_POST['login'])?$_POST['login']:"";
    
    $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";
    
    //membre
    // $reqM= "select * from users  , appartenir  where users.id_users = appartenir.user_id and login='$login' and pwd=('$pwd')";
    // $resM = $pdo->query($reqM);
                //      var_dump($reqM);
                //  die();

    //admin            
    // $reqA= "select * from users as u, tontine as t where u.id_users = t.id_admin and login='$login' and pwd=('$pwd')  ";
    // $resA = $pdo->query($reqA);

    //Trésorier
    // $reqT= "select * from users as u, tontine as t where u.id_users = t.id_tresorier and login='$login' and pwd=('$pwd')";
    // $resT = $pdo->query($reqT);

    $requete="select * from users where login='$login' and pwd=('$pwd')";
    $resultat=$pdo->query($requete);
    if($user=$resultat->fetch())
    {
        $_SESSION['id']=$user["id_users"];
        $_SESSION['nom']=$user['nom'];
        $_SESSION['prenom']=$user['prenom'];
        $_SESSION['login']=$user['login'];
        $_SESSION['pwd']=$user['pwd'];
        
            header('location:choice.php');      
        
    }
    else{
        $_SESSION['erreurLogin']="<strong>Erreur!!</strong> Login ou mot de passe incorrecte!!!";
        header('location:accueil.php');
    }
    
    // var_dump($requete);
    // die();
    // if($admin = $resA->fetch())
    // {
    //     $_SESSION['id']=$admin["id_users"];
    //     $_SESSION['nom']=$admin['nom'];
    //     $_SESSION['nomton']=$admin['nom_tontine'];

    //     $_SESSION['prenom']=$admin['prenom'];
    //     $_SESSION['idTontine']=$admin['id_tontine'];


        
    //         header('location:accueilAdmin.php');
        
            
    // }
    // elseif($tres = $resT->fetch())
    // {
    //     $_SESSION['id']=$tres["id_users"];
    //     $_SESSION['nom']=$tres['nom'];
    //     $_SESSION['prenom']=$tres['prenom'];
    //     $_SESSION['nomton']=$tres['nom_tontine'];
    //     $_SESSION['idTontine']=$tres['id_tontine'];
        
    //         header('location:accueilTresorier.php');
            
    // }

    // elseif($mem=$resM->fetch())
    // {
    //     $_SESSION['id']=$mem["id_users"];
    //     $_SESSION['nom']=$mem['nom'];
    //     $_SESSION['prenom']=$mem['prenom'];
    //     $_SESSION['idTontine']=$mem['tontine_id'];
       
        
    //     if($mem['etat']==1){
    //     header('location:accueilMembre.php');
    //     }
            
        
    // }

    
    
    
    

?>
