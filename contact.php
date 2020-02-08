<?php
session_start();
require_once 'vendor/autoload.php';
if (!session_id()) @session_start();
$msg = new \Plasticbrain\FlashMessages\FlashMessages();
  
  if (isset($_POST['submit'])) {    
    $from=$_POST['name'];
    $to='yveskalumenoble@gmail.com';
    $subject=$_POST['subject'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    mail($to,$subject,$message,$from,$email);
    
    $msg->success('Votre message à été reçus avec succes, nous vous repondrons très bientôt !','contact.php',true);
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <?php require_once 'includes/head.php' ?>
  <title>Acceuil - echo de Kipushi</title>
</head>

<body>

  <!--==========================
    Header
  ============================-->
<?php require_once 'includes/header.php' ?>
        <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div style="margin-top:60px;" class="section-header">
          <h3>Contactez-nous</h3>
          <p>Si vous avez besoin d'entrer en contact avec nous, voici nos contacts, alors n'hesitez pas !</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Addresse</h3>
              <address>A108 Adam Street</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>N° Telephone</h3>
              <p><a href="tel:+155895548855">+243 97 49 39 405</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">yveskalumenoble@gmail.com</a></p>
            </div>
          </div>
        </div>

        <div class="form">
          <div id="sendmessage"><?php $msg->display() ?></div>
          <form method="post" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required="required" data-msg="Vous devez entrer votre nom"/>
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Adresse Email" required="required" data-msg="Entrez un mail valide" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required="required" data-msg="Ce champs est obligatoire" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" required="required" data-msg="Vous ne pouvez pas envoyer un message vide !" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
              <div class="text-center"><input class="btn btn-md btn-success" type="submit" name="submit"></div>
          </form>
        </div>

      </div>
    </section><!-- #contact -->
<?php require_once 'includes/footer.php' ?>
</body>
</html>