<?php
 if(isset($_GET['id']))
 {
    $annonce=$_GET['id'];
    require("connexiondb.php");
    $req="Delete from annonce idAnnonce=$annonce";
    $res=$pdo->exec($req);
    if($res)
    {
      echo" suppression  reussi";
      header('location:accueilMembre.php');
    }
    else
    {
      echo" vous ne pouvez pas supprimer cette annonce";
    }
    
 }
  
?>