<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() . 'images/logo.png' ?>" >
        <?php foreach($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
        <?php endforeach; ?>
        
        <?php foreach ($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>
         
        <link href="<?php echo base_url()?>css/bootstrap-select.css" rel="stylesheet" type="text/css">
        <script src="<?php echo base_url()?>js/bootstrap-select.js" type="text/javascript"></script>
        
        <link href="<?php echo base_url()?>css/style.css" rel="stylesheet" type="text/css">
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Police 
            <?php 
                if(isset($title)){
                    echo "- " . $title;
                } 
            ?>            
        </title>
        <script>
            $(function (){
                $('a').tooltip();
            });
            
            $(window).on('load', function () {

                $('.selectpicker').selectpicker({

                });

                // $('.selectpicker').selectpicker('hide');
            });
        </script>
    </head>
    <body>
        <div id="wrap">
            <div class="container">

                <nav class="navbar">
                    <div class="navbar-inner">
                        <div class="container">
                            <ul class="nav">
                                <li> <a class="brand" href="<?php echo site_url("boControler/typeInfraction") ?>">Police Nationale</a> </li>
<!--                                <li> <a href="<?php //echo site_url("index.php/accueil") ?>">Accueil</a> </li>-->
                                <li class="dropdown"> 
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestion Infraction<b class="caret"></b> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url("boControler/typeInfraction") ?>">Type Infraction</a></li>
                                        <li><a href="<?php echo site_url("boControler/infraction") ?>">Infractions</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"> 
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestion Personne<b class="caret"></b> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url("boControler/personne") ?>">Personnes</a></li>
                                        <li><a href="<?php echo site_url("boControler/permisDeConduire") ?>">Permis de conduire</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"> 
                                    <a class="dropdown-toggle" href="<?php echo site_url("boControler/avisDeRecherche") ?>">Avis de Recherche</a>
                                </li>
                                <li class="dropdown"> 
                                    <a class="dropdown-toggle" href="<?php echo site_url("boControler/utilisateur") ?>">Gestion d'utilisateur</a>
                                </li>
                                <li class="divider-vertical"></li>
                                <li class="dropdown"> 
                                    <a class="dropdown-toggle" href="<?php echo site_url("accueil/deconnexion") ?>">D&eacute;connexion</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <?php 
                    if(isset($header)){
                ?>
                    <div class="row">
                        <div class="span8 offset2">
                            <h3><?php echo $header; ?></h3>
                        </div>
                    </div>
                <?php
                    } 
                ?>
                <?php print $content ?>



            </div>

        <div id="push"></div>
        </div>
        <div id="footer">
            <div class="container">
                <span class="muted" style="margin-left: 15px;">Copyright 2016 &copy; Tous droit r&eacute;s&eacute;rv&eacute;.</span>
                <span class="muted pull-right" style="margin-right: 15px;">Back Office du travaux pratique NFC</a></span>
            </div>
        </div>
    
    </body>
</html>
