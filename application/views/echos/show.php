<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Echo</title>
  <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" media="screen and (max-width: 830px)" href="../../assets/css/show.css">
</head>
<body>
  <div id="navbar">
    <a href="../../../index.php"><img src="../../assets/img/echo.png"></a>
    <ul class="hidden">
      <li><?php echo anchor('main/login', 'Connexion'); ?></li>
      <li><?php echo anchor('/', 'Accueil'); ?></li>
    </ul>
  </div>
  <hr>
  <h2>Contenu</h2>
  <div class="contenu">
    <p><?php echo $echo[0]->content;?></p>
    <?php
      $key = $this->uri->segment(3);
      if($this->echo_model->isEncrypted($key)){
        echo form_open("echos/decrypt/$key");
        echo form_input('secretkey');
        echo form_submit('mysubmit', 'Ok');
        echo form_close();
      }
      echo $this->session->flashdata('echo_success');
    ?>
    <div class="resonne">
    <?php
      echo anchor(base_url("echos/update/".$echo[0]->gkey), 'Faire résonner');
    ?>
    </div>
  </div>
</body>
</html>


