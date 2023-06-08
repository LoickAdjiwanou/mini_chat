<?php
    try{
        $bdd=new PDO('mysql:host=localhost;dbname=base','root','');
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
?>