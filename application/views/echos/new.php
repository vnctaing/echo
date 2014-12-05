<html>
<head>
  <title>Accueil</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../../assets/css/new.css"> <!-- Pour tous -->
  <link rel="stylesheet" media="screen and (max-width: 750px)" href="../../assets/css/new-mobile.css" /> <!-- Pour mobiles (640px) -->



  <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
</head>
<body>



  <div id="navbar">
    <img class="menu" src="../../assets/img/menu.png">
    <a href="#"><img src="../../assets/img/echo.png"></a>
    <ul class="hidden">
      <li><?php echo anchor('main/login', 'Connexion'); ?></li>
      <li><?php echo anchor('main/signup', 'Inscription'); ?></li>
    </ul>
  </div>
  <div id="allcontent">
  <div id="leftcontent">
    <h1><img src="../../assets/img/quotes1.png"> Les paroles <br>s'envolent, les <br>écrits aussi. <img src="../../assets/img/quotes2.png"></h1>
    
    <h2> Comment ça marche ?</h2>
    <hr />
    <br>
    <p class="help"><b>1.</b> Créez votre contenu, votre echo, écrivez ce que vous voulez.
    <br><br><b>2.</b> Choisissez la durée de vie que vous voulez attribuer à ce contenu, 10 minutes ? 1h30 ?
    <br><br><b>3.</b> Générez le lien de votre echo, et partagez-le où vous le souhaitez.
    <br><br><b>4.</b> La durée de vie de votre echo augmentera si les visiteurs aiment le contenu et le font raisonner.
    <br><br><b>5.</b> À la fin de sa durée de vie, votre echo disparaîtra.</p>
  </div>
  <div id="rightcontent">
    <h2> Créez votre contenu</h2>
    <hr>
    <br>
    <?php
      echo form_open('echos/create'); // Crée un formulaire qui appelle la méthode create du controlleur echos
      echo $this->session->flashdata('add_success');
      $attributes = array(
        'placeholder' => 'Exprimez-vous !',
        'name' => 'content'
        );
      echo form_textarea($attributes);
    ?>
    <br>
    <?php
      echo 'Chiffrement : ';
      echo form_checkbox('encrypt', 1);
      echo ' Entrez une clé secrète : ';
      echo form_input('secretkey');
    ?>
    <br>
    <br>
    <h2> Choisissez votre durée de vie</h2>
    <hr>
    <br>
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

      ?>
    
      
  
    <?php echo form_submit('mysubmit', 'OK');
    ?><br><br><br>
   </div>
  </div>
    <?php echo form_close();?>


</body>
</html>