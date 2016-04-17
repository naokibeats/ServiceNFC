<!DOCTYPE html>
<html>
  <head>
    <title>Police Nationale</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
	<div class="page-content container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-wrapper">
                        <div class="box">
                            <div class="content-wrap">
                                <form class="form-4" method="post" action="<?php echo site_url("accueil/connexion") ?>">
                                    <h6>Identification</h6>
                                    <input class="form-control" name="username" type="text" placeholder="Username">
                                    <input class="form-control" name="mdp" type="password" placeholder="Password">
                                    <p class="erreur"><?php echo $err; ?></p>
                                    <div class="action">
                                        <input class="btn btn-primary signup" type="submit" name="submit" value="Connexion">
                                    </div>  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
	</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>js/custom.js"></script>
  </body>
</html>