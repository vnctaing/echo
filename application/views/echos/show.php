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
    <h3>Durée de vie : </h3>
    <div id="life"></div>


    <?php


      if( $this->uri->segment(3) )
      {
          $key = $this->uri->segment(3);
        } 
        else if ( $this->uri->segment(1))
        {
          $key = $this->uri->segment(1);
        }

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
      echo $this->session->flashdata('invalid_key');
      echo anchor(base_url("echos/update/".$echo[0]->gkey), 'Faire résonner');
    ?>


    <a class="twitter-share-button"
      href="https://twitter.com/share"
      data-via="social_EchoFR">
    Tweet
    </a>
    <script type="text/javascript">
    window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
    </script>
    </div>
  </div>


    <script>
      setInterval(function(){
      var expDate = "<?php echo strtotime($echo[0]->expires_at);?>" ; 
      var today= new Date().getTime() / 1000; // UNIX en seconde
      var lifetime = expDate - today; // duree de vie en seconde 
      var hour = Math.floor(lifetime / 3600);
      var minutes = Math.floor(lifetime / 60 - hour * 60);
      var seconds = Math.floor(lifetime - hour * 3600 - minutes * 60)
      var life = document.getElementById("life");
      life.innerHTML =  + hour + ":" + minutes + ":" + seconds;
      }, 1000);
    </script>
</body>
</html>


