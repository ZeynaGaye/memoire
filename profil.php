
<?php 
session_start();
include "connexiondb.php";
if(isset($_GET['tont']))
{
    $tont = $_GET['tont'];
    // $login=isset($_POST['login'])?$_POST['login']:"";
    
    // $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";
    $login= $_SESSION['login'];
    $pwd=$_SESSION['pwd'];
    //membre
    $reqM= "select * from users  , appartenir  where users.id_users = appartenir.user_id and appartenir.tontine_id = $tont and login='$login' and pwd=('$pwd')";
    $resM = $pdo->query($reqM);
                //      var_dump($reqM);
                //  die();

    //admin            
    $reqA= "select * from users as u, tontine as t where u.id_users = t.id_admin and t.id_tontine = $tont and login='$login' and pwd=('$pwd')  ";
    $resA = $pdo->query($reqA);
    

    //Trésorier
    $reqT= "select * from users as u, tontine as t where u.id_users = t.id_tresorier and t.id_tontine = $tont and login='$login' and pwd=('$pwd')";
    $resT = $pdo->query($reqT);

    $requete="select * from users where login='$login' and pwd=('$pwd')";

    
    $resultat=$pdo->query($requete);
    if($admin = $resA->fetch())
    {
        
        $_SESSION['nomton']=$admin['nom_tontine'];
        $_SESSION['idTontine']=$admin['id_tontine'];
        header('location:accueilAdmin.php');
        
    }
    elseif($tres = $resT->fetch())
    {

        $_SESSION['idTontine']=$tres['id_tontine'];
        $_SESSION['nomton']=$tres['nom_tontine'];
        
            header('location:accueilTresorier.php');
            
    }

    elseif($mem=$resM->fetch())
    {

        $_SESSION['idTontine']=$mem['tontine_id'];
        
       
        
        if($mem['etat']==1){
        $_SESSION['nomton']=$mem['nom_tontine'];
        header('location:accueilMembre.php');
        }
        else{
            echo " Veuillez attendre l'activation de l'admin pour vous connectez";
            header('location:choice.php');
        }
        
    }
    else{
        echo " Login ou mot de passe incorrecte!!!";
        header('location:authEtudiant.php');
    }
}
?>