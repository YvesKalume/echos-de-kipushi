<?php
    require_once './config/connection.php';
    if (isset($_REQUEST['submit'])) {
        if (!empty($_REQUEST['nom']) AND !empty($_REQUEST['email']) ) {
            $name=htmlspecialchars($_REQUEST['nom']);
            $email=htmlspecialchars($_REQUEST['email']);
            $database->newsletter()->insert(array(
                'nom'=>$name,
                'email'=>$email,
            ));
            $message='Merci pour votre abonnement, vous recevrez nos message pour chacun de nos évènements dans votre boite mail';
        }else{
            $message= 'Veuillez bien remplir tous les champs';
        }

    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'includes/head.php' ?>
    <title>Abonné</title>
</head>
<body>
    <section id="team">
      <div class="container">
        <?php
        if (isset($message)) {
            echo $message;
        }
        ?>
      </div>
    </section><!-- #team -->

    </body>
</html>