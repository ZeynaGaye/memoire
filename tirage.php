<?php
session_start();
$idT = $_SESSION['idTontine'];
include "connexiondb.php";



$req = "select * from users u, appartenir a where u.id_users = a.user_id and a.tontine_id= $idT
AND u.id_users NOT IN( SELECT user_id from tours where a.tontine_id =tours.tontine_id) ORDER BY rand() LIMIT 1";
$res = $pdo->query($req);
if($rand=$res->fetch())
{
    $id=$rand['user_id'];
    $idT=$rand['tontine_id'];
    $req= "insert into tours(tontine_id,user_id) values($idT,$id)";
    $res=$pdo->exec($req);?>
<textarea style='display:none;' id='ra' style="font-size:20px;color:#fd7e14; text_align: center"> 
<?php echo  ' '.$rand['nom'].' '.$rand['prenom'].' '.$rand['adresse'].' '.$rand['email'].' '
.$rand['tel'].' '.$rand['CNI'] ;}
?>
</textarea> 

<script>
    var ra = document.getElementById('ra').value;
    alert(ra);
</script>