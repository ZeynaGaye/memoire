<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/monstyle.css">
        <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script> 
    <title>Evolution</title>
</head>
<body>
    <?php 
    session_start();
    $idT = $_SESSION['idTontine'];
    $size=isset($_GET['size'])?$_GET['size']:3;
    $page=isset($_GET['page'])?$_GET['page']:1;
    $offset=($page-1)*$size; 

    require_once("connexiondb.php"); 
    $req = "select * from users, tours where users.id_users = tours.user_id";
    $res= $pdo->query($req); 

    $requeteCount="select count(*) countUser  from users u, tours t where u.id_users = t.user_id
    and t.tontine_id= $idT";
    $resultatCount=$pdo->query($requeteCount);

    $tabCount=$resultatCount->fetch();
    $nbrUser=$tabCount['countUser'];
    $reste=$nbrUser % $size;   
    if($reste===0) 
        $nbrPage=$nbrUser/$size;   
    else
        $nbrPage=floor($nbrUser/$size)+1;  
    
    ?>
<div  style="background-color: #e6a756;">
    <div class="panel-heading">Liste des Membres qui sont deja beneficiaires(<?php echo $nbrUser ?> Membres)</div>
        <div class="panel-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Nom</th> <th>Prénom</th> <th>Adresse</th> <th>Téléphone</th></tr>
                </thead>
                        
                <tbody>
                    <?php while($user=$res->fetch()){ ?>
                        <tr class="<?php echo $user['etat']==1?'success':'danger'?>">
                        <td><?php echo $user['nom'] ?> </td>
                        <td><?php echo $user['prenom'] ?> </td>
                        <td><?php echo $user['adresse'] ?> </td>
                        <td><?php echo $user['tel'] ?> </td>
                        <!-- <td><?php
                         $zey="select count(u.id_users) countUser from users u,tontine t where u.id_users  not in(select id_users from tours where tours.user_id) and t.id_tontine= $idT";
                         $resultatCount=$pdo->query($zey);
                         $tabCount=$resultatCount->fetch();
                         $nbrUser=$tabCount['countUser'];
                          echo $nbrUser;?> </td> -->
                               
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        <div>
    </div> 
</div>           
            <!-- <ul class="pagination">
            < for($i=1;$i<=$nbrPage;$i++){ ?>
                <li class="php if($i==$page) echo 'active' ?>"> 
                    <a href="Etudiant.php?page=php echo $i;?>&login=php echo $login ?>">
                                    php echo $i; ?>
                                </a> 
                             </li>
                        php } ?>
                    </ul> -->
                </div>
                <!-- </div>    -->
</body>
</html>