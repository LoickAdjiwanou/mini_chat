<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <title>Formulaire</title>
    <link rel="stylesheet" href="minichat.css">
</head>
<body class="corps">
    <center>
        <p><strong><font size="6px">MINI-CHAT</font></strong></p>
        <form method="post" action="minichat_post.php" class="form">
            <p>
                <p><label for="nom"><strong>Nom</strong></label></p>
                <p><input type="text" name="nom" id="nom" required="required"/></p>
                <p><label for="message"><strong>Message</strong></label></p>
                <p><input type="text" name="message" id="message" required="required"/></p>
                <?php
                    session_start();
                    
                    $jour=date('d');
                    $mois=date('m');
                    $année=date('Y');
                    $heure=date('H');
                    $minute=date('i');

                    $date=$jour.'/'.$mois.'/'.$année;
                    $temps=$heure.'h'.$minute.'mins';

                    $_SESSION['dat']=$date;
                    $_SESSION['temps']=$temps;
                ?>
                <input type="submit" class="submit" value="Envoyer"/>
            </p>
        </form>

        <?php
        require_once('connect.php');
            $req=$bdd->query('SELECT pseudo, messages, dates, temps FROM minichat ORDER BY ID DESC LIMIT 0, 30');
            
            echo '<br/><br/><strong><u>Derniers Messages:</u></strong><br/>';
            

            while($donnees=$req->fetch()){
                echo '<br/><br/><div class="mess"><br/><br/><strong>'.strip_tags($donnees['pseudo']).'</strong> a envoyé le '.strip_tags($donnees['dates']).' à '.strip_tags($donnees['temps']).' <br/><br/><em>'.strip_tags($donnees['messages']).'</em><br/><br/></div>';
            }

            $req->closeCursor();
        ?>
    </center>
</body>
</html>