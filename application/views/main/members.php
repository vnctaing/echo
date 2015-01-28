<!doctype html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../../assets/img/o-violet-icon.png" />
  <title>Nouveau membre</title>
  <?=css('member.css')?>
  <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-58489011-1', 'auto');
  ga('send', 'pageview');

</script>
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
