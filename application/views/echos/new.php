<html lang="fr">
<head>
  <title>Bienvenue sur Echo !</title>
  <meta charset="UTF-8">
  <link rel="icon" type="image/png" href="../../assets/img/o-violet-icon.png" />
  <link rel="stylesheet" type="text/css" href="../../assets/css/new.css">
  <?=css('navbar.css')?>
  <meta name="viewport" content="width=320">

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
  <div id="allcontent">
  <div id="leftcontent">
    <h1>Les paroles s'envolent, les écrits aussi !</h1>
    <ul>
      <li>
        <?=img('ecrire1.png')?>
        <p>Écrivez votre echo.</p>
      </li>
      <li>
        <?=img('ephemere1.png')?>
        <p>Choisissez sa durée de vie.</p>
      </li>
      <li>
        <?=img('envoyer1.png')?>
        <p>Partagez-le où vous voulez.</p>
      </li>
      <li>
        <?=img('resonner1.png')?>
        <p>Résonnez un echo pour augmenter sa durée de vie.</p>
      </li>
      <li>
        <?=img('autodetruit1.png')?>
        <p>Lorsque le temps est écoulé, le message s'auto-détruit.</p>
      </li>
    </ul>
  </div>
  <div id="rightcontent">
    <h2> Créez votre contenu</h2>
    <hr>
    <?php
      echo form_open('echos/create'); // Crée un formulaire qui appelle la méthode create du controlleur echos
      $attributes = array(
        'placeholder' => 'Exprimez-vous !',
        'name' => 'content'
        );

      echo form_textarea($attributes);
    ?>

    <?php
      $options = array(
        5 => '5 min',
        10 => '10 min',
        15 =>  '15 min',
        30 =>  '30 min',
        45 =>  '45 min',
        60 =>  '1h',
        90 =>  '1h30',
        120 =>  '2h'
        );
      echo '<div id="crypt">';
      //Options passé
      echo 'Crypte ton echo : ';
      echo form_checkbox('encrypt', 1);
      echo '<br><img class="key" src="../../assets/img/key.png"> Clé secrète : ';
      echo form_password('secretkey');
      echo '</div>';
      echo '<h2> Choisissez votre durée de vie</h2>
      <hr>';
      
      echo form_dropdown('expired_at', $options, '1');
      echo form_submit('mysubmit', 'OK');
      
    ?>
   </div>
  </div>
    

  <div id="compteur">
    <p>
    <?php echo $AUTO_INCREMENT?> echos ont déjà été créés.</p>
  </div>
  
    <?php echo form_close();?>
  <footer>
    <ul>
      <li><p>En utilisant ce service, vous acceptez <?php echo anchor('welcome/cgu', 'les Conditions Générales d\'Utilisation'); ?></p></li>
      <li><a href="https://www.facebook.com/pages/Echo/662945737093488" target="blank"><img src="../../assets/img/fb.png"></a></li>
      <li><a href="https://twitter.com/LeProjetEcho" target="blank"><img src="../../assets/img/twitter.png" ></a></li>
    </ul>
  </footer>

</body>
</html>