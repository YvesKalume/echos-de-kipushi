<?php
if (!isset($_GET['id']) OR empty($_GET['id']) OR intval($_GET['id']) == 0) {
    die('Evenement indisponible');
}

require_once 'config/connection.php';
$id=htmlspecialchars($_GET['id']);
// recuperer tous l'évènement
$event=$database->events[$id];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'includes/head.php' ?>
    <title>Evènements - echo de Kipushi</title>
</head>

<body>

<!--==========================
  Header
============================-->
<?php require_once 'includes/header.php' ?>
<!-- #header -->

<!--==========================
      Portfolio Section
    ============================-->
<section id="about"  class="section-bg" >
    <div class="container">

        <header style="margin-top:60px;" class="section-header">
            <h3 class="section-title"><?=$event['titre']?></h3>
        </header>
        <div class="row"><img class="col-lg-12" src="./affiches/<?=$event['flayer']?>"></div>
        <table>
            <tbody>
            <tr>
                <td>
                    <b>Date :</b>
                </td>
                <td>
                    <?=$event['date']?>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Heure :</b>
                </td>
                <td>
                    <?=$event['heure']?>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Lieu :</b>
                </td>
                <td>
                    <?=$event['lieu']?>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="row portfolio-container">
            <div style="text-align: justify;" class="col-lg-12 portfolio-item filter-app wow fadeInUp">
                <!-- description -->
                <?=$event['description']?>
            </div>
        </div>

    </div>
</section>
<?php require_once 'includes/footer.php' ?>
</body>
</html>
