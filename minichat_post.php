<?php
    session_start();
    if(isset($_POST['nom']) AND isset($_POST['message'])){
        require_once('connect.php');
        $req=$bdd->prepare('INSERT INTO minichat(ID, pseudo, messages, dates, temps)VALUES(:i, :nom_m, :mess, :dat, :tmps)');
        $req->execute(array(
            'i'=>'',
            'nom_m'=>$_POST['nom'],
            'mess'=>$_POST['message'],
            'dat'=>$_SESSION['dat'],
            'tmps'=>$_SESSION['temps']
        ));
        header('Location: minichat.php');
    }
    
?>