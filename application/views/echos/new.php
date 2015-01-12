<html>
<head>
  <title>Accueil</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../../assets/css/new.css"> <!-- Pour tous -->
  <link rel="stylesheet" media="screen and (max-width: 830px)" href="../../assets/css/new-830px.css" /> <!-- Pour mobiles (830px) -->
  <link rel="stylesheet" media="screen and (max-width: 1100px)" href="../../assets/css/new-1100px.css" /> <!-- Pour les ecrans (1100px) -->
  <link rel="stylesheet" media="screen and (max-width: 500px)" href="../../assets/css/new-mobile.css" /> <!-- Pour les ecrans (500px) -->

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
    <a href="#"><img class="menu" src="../../assets/img/home.png"></a>
    <a href="#"><img src="../../assets/img/echo.png"></a>
    <ul class="hidden">
      <!--<li><?php echo anchor('main/login', 'Connexion'); ?></li>
      <li><?php echo anchor('main/signup', 'Inscription'); ?></li>-->
    </ul>


    <a href="#"><ul class="aide">
      <li>?</li>
    </ul></a>
    
  </div>
  <div id="allcontent">
  <div id="leftcontent">
    <h1><img src="../../assets/img/quotes1.png"> Les paroles <br>s'envolent, les <br>écrits aussi. <img src="../../assets/img/quotes2.png"></h1>
    
    <h2> Comment ça marche ?</h2>
    <hr />
    <ul class="help"><li><b>1.</b> Créez votre contenu, votre echo, écrivez ce que vous voulez.</li>
      <li><b>2.</b> Choisissez la durée de vie que vous voulez attribuer à ce contenu, 10 minutes ? 1h30 ?</li>
      <li><b>3.</b> Générez le lien de votre echo, et partagez-le où vous le souhaitez.</li>
      <li><b>4.</b> La durée de vie de votre echo augmentera si les visiteurs aiment le contenu et le font résonner.</li>
      <li><b>5.</b> À la fin de sa durée de vie, votre echo disparaîtra.</li>
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

    <h2> Choisissez votre durée de vie</h2>
    <hr>

    
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
      //Options passé

      echo form_dropdown('expired_at', $options, '1');
      echo form_submit('mysubmit', 'OK');
    ?><br><br><br>
   </div>
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