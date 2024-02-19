<?php 
function aleatoire_password()
    {
    	$combinaison="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $longueur=strlen($combinaison)-1; 
        $password="";
        for ($i=0; $i < 8; $i++) 
        { 
        	$rand=rand(0,$longueur);
        	$password=$password."".$combinaison[$rand];
        }
        return $password;
    }
 ?>