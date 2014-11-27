<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Echo</title>
</head>
<body>
  <a href="../../../index.php"><img class="echo" src="../../../assets/img/logo-echo-blanc.png"></a>
  <div id="nav"> 
    <ul>
      <li><?php echo anchor('main/login', 'Connexion'); ?></li>
      <li><?php echo anchor('echos/index', 'Crée ton echo'); ?></li>
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


