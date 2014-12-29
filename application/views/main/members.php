<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Nouveau membre</title>
  <?=css('member.css')?>
  <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" media="screen and (max-width: 800px)" href="../../assets/css/member-mobile.css">
</head>
<body>
	<div id="navbar">
    <?php echo anchor(base_url(), '<img src="../../assets/img/echo.png">'); ?>
    <ul class="hidden">
      <li><?php echo anchor('/', 'Accueil'); ?></li>
    </ul>
  	</div>
  	<h1>Bienvenue chez vous !</h1>
  	<div class="deconnexion">
  		<a href='<?php echo base_url()."main/logout";?>'>Déconnexion</a>
	</div>

</body>
</html>
