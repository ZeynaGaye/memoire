<?php
 session_start();

require_once ('connexiondb.php');

$iduser=$_SESSION['idA'];

$oldpwd=isset($_POST['oldpwd'])?$_POST['oldpwd']:"";

$newpwd=isset($_POST['newpwd'])?$_POST['newpwd']:"";

$requete="select * from users where id_users=$iduser and password=('$oldpwd') ";

$resultat=$pdo->prepare($requete);

$resultat->execute();

$msg="";
$interval=3;
$url="login.php";

if($resultat->fetch()) {
    $requete = "update users set password=(?) where id_users=?";
    $params = array($newpwd, $iduser);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($params);

    $msg="<div class='alert alert-success' >
                <strong>Félicitation!</strong> Votre mot de passe est modifié avec succés
           </div>";
           header("Location:accueilAdmin.php");

}else{
    $msg="<div class='alert alert-danger' >
            <strong>Erreur!</strong> L'ancien mot de passe est incorrect !!!!
           </div>";
    $url=$_SERVER['HTTP_REFERER'];
}

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Changement de mot de passe</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <br><br>
        <?php
            echo  $msg;
            header("refresh:$interval;url=$url");
        ?>

    </div>
</body>
</html>


