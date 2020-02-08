<?php
session_start();
    /*require_once '../config/connection.php';
    require_once '../config/functions.php';
    if (isset($_POST['submit'])) {
        if (!empty($_POST['titre']) AND !empty($_POST['description'])) {
            $titre=htmlspecialchars($_POST['titre']);
            $description=htmlspecialchars($_POST['description']);
            $cover_file=$_FILES['couverture']['tmp_name'];
            $cover_extension= pathinfo($_FILES['couverture']['name'])['extension'] ;
            $cover_name=htmlspecialchars('cover_galerie_'.$titre.'.'.$cover_extension);
            $path=formatname($titre);
            $i=0;
            if (!file_exists('../galerie/'.$path)){
                try {
                    mkdir('../galerie/'.$path);
                    foreach ($_FILES['file']['tmp_name'] as $fichier) {
                        $file_name=$_FILES['fichier']['name'][$i];
                        move_uploaded_file($fichier,'../galerie/'.$path.'/'.$file_name);
                        $i++;
                    }
                    $database->galerie()->insert(array(
                        'titre'=>$titre,
                        'description'=>$description,
                        'cover'=>$cover_name,
                        'dossier'=>$path,
                        'auteurs_id'=>$_SESSION['id'],
                    ));
                    move_uploaded_file($cover_file,'../galerie/'.$path.'/'.$cover_name);
                } catch (Exception $e) {
                    echo 'Erreur serveur';
                }
                
            }else{
                echo 'la galerie <b>'.$titre.'</b> existe déjà';
            }
        }else {
            echo 'veuillez bien remplir tous les champs';
        }
        
    }*/
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once 'includes/head.php' ?>
    <title>Document</title>
</head>
<body class="container-fluid">
<nav class="navbar navbar-vertical fixed-left navbar-expand-md bg-white" id="sidenav-main">
    <?php require_once 'includes/nav.php'; ?>
</nav>
<div class="main-content">

    <!-- Navbar horizontal -->
    <?php require_once 'includes/horizontal-nav.php'; ?>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Space -->
            </div>
        </div>
    </div>
    <!-- edit zone -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <!--right space -->
            </div>
            <div class="card bg-secondary shadow col-lg-8">
            <!-- afficher un message flash -->
            <div class="card-body">
                <form action="" method="post" id="form" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-username" >Titre</label>
                                <input name="titre" type="text" id="input-username" class="form-control form-control-alternative" placeholder="Titre galerie">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Couverture</label>
                                <input class="form-control" type="file" name="couverture" id=""></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-email">Description</label>
                                <textarea name="description" class="form-control form-control-alternative" placeholder="Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="file" name="fichier[]" id="fileform" multiple hidden>
                        <div class="col-lg-12" style="height: 250px;background-color: #c6c8ca" id="fileform" ondrop="isdrag(event)" ondragover="return false">
                            <input type="button" id="importer" style="margin-top: 100px" class="btn btn-sm offset-3 col-lg-6" value="importer" onclick="importFiles()"/>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="form-group">
                            <input class="btn btn-md btn-success" type="submit" name="submit">
                            <input class="btn btn-md btn-danger" type="reset">
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- end edit zone -->
    <!-- Footer -->
    <?php require_once 'includes/footer.php'; ?>
    <script>
        const el = (id) => {
            const element = document.getElementById(id);
            return element;
        };
        const form = el('form')

        form.addEventListener('submit',function (e) {
            e.preventDefault()
            const data = new FormData(this)
            const xhr = new XMLHttpRequest()
            xhr.onreadystatechange = function () {
                console.log(this.response)
            };
            xhr.open('POST','file.php',true)
            xhr.send(data);

            return false
        })





        /*importFiles = () => {
            const fileform = el('fileform');
            fileform.click();
            fileform.addEventListener('change',function(e) {
                console.log(fileform.value)
            })
        }

        isdrag = (event) => {
            event.preventDefault();
            const fichier = event.dataTransfer.files[0];
            const fileform = el('fileform');
            fileform.setAttribute('value',fichier)
            const form_data = new FormData();
            form_data.append('file',fichier);
        }*/
    </script>
</body>
</html>