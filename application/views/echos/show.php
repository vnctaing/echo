<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Echo</title>
  <?=css('bootstrap.css')?>
  <?=css('show.css')?>
  <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
</head>
<body>
  <a href="../../../index.php"><img class="echo" src="../../../assets/img/logo-echo-blanc.png"></a>
  <div id="nav"> 
    <img class="fleche" src="../../../assets/img/multifleche.png">
    <ul>
      <li><?php echo anchor('main/login', 'Connexion'); ?></li>
      <li><?php echo anchor('echos/index', 'Crée ton echo'); ?></li>
   </ul>
  </div>
  </br>
  <hr>
  </br>
  <h2>Contenu</h2>
  <br>
  <div class="contenu">
    <p><?php echo $echo[0]->content;?></p>
    <br>
    <br>
    <?php
      echo $this->session->flashdata('echo_success');
    ?>
    <div class="resonne">
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    <?php
      echo anchor(base_url("echos/update/".$echo[0]->gkey), 'Faire résonner');
    ?>
    </div>
  </div>
</body>
</html>


