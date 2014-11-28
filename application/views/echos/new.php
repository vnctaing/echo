<html>
<head>
  <title>Accueil</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../../assets/css/new.css"> <!-- Pour tous -->
  <link rel="stylesheet" media="screen and (max-width: 640px)" href="../../assets/css/new-mobile.css" /> <!-- Pour mobiles (640px) -->



  <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
</head>
<body>
  <div id="navbar">
    <a href="#"></a>
    <ul>
      <li><?php echo anchor('main/login', 'Connexion'); ?></li>
      <li><?php echo anchor('main/signup', 'Inscription'); ?></li>
    </ul>
  </div>
  <div id="leftcontent">
    <h1> Les paroles s'envolent, les écrits aussi.</h1>

    <h2> Comment ça marche ?</h2>
    <hr />
    <br>
    <p class="help">1. Créez votre contenu, votre echo, écrivez ce que vous voulez.
    <br>2. Choisissez la durée de vie que vous voulez attribuer à ce contenu, 10 minutes ? 1h30 ?
    <br>3. Générez le lien de votre echo, et partagez-le où vous le souhaitez.
    <br>4. La durée de vie de votre echo augmentera si les visiteurs aiment le contenu et le font raisonner.
    <br>5. À la fin de sa durée de vie, votre echo disparaîtra.</p>
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
      echo 'Option Chiffrement: ';
      echo form_checkbox('encrypt', 1);
      echo 'Entrez une clé secrète :';
      echo form_input('secretkey');
    ?>
  
    <?php echo form_submit('mysubmit', 'OK');
    ?>
   </div>
    <?php echo form_close();?>



</body>
</html>