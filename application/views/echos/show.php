<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Echo</title>
  <?=css('show.css')?>
  <link href='http://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" media="screen and (max-width: 800px)" href="../../assets/css/show-mobile.css">
  
  <script language=javascript> var url= document.URL; </script> 

</head>
<body>
  <div id="navbar">
  <?php echo anchor(base_url(), '<img src="../../assets/img/home.png" class="menu">'); ?>
  <?php echo anchor(base_url(), '<img src="../../assets/img/echo.png">'); ?>
    <ul class="hidden">

      <!--<li><?php echo anchor('main/signup', 'Inscription'); ?></li>
      <li><?php echo anchor('main/login', 'Connexion'); ?></li>-->
      <li><?php echo anchor('/', 'Accueil'); ?></li>
    </ul>
  </div>
  <?php echo $this->session->flashdata('add_success'); ?>

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
        echo form_password('secretkey');
        echo form_submit('mysubmit', 'Ok');
        echo form_close();
      }

        echo $this->session->flashdata('invalid_key');
      
    ?>  

  </div>
  <div class="resonne">
    <?php echo anchor(base_url("echos/update/".$echo[0]->gkey), 'Faire résonner');?>
    <script type="text/javascript">
     window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
    </script>
    <div class="ajout">
    <?php echo $this->session->flashdata('echo_success'); ?>
    </div>
  </div>

  <div id="share">
    <a class="twitter-share-button"
      href="https://twitter.com/share"
      data-via="LeProjetEcho">
    Tweet
    </a>
  </div>
  


  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
  
  <div class="fb-share-button" data-layout="button_count"></div>



 


  <!--script language="javascript">
    function fbshareCurrentPage(){
      window.open("https://www.facebook.com/sharer/sharer.php?u="+escape(window.location.href)+"&t="+document.title, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600');return false; 
    }
</script>


  <a href="javascript:fbshareCurrentPage()" target="_blank" alt="Share on Facebook">Facebook</a-->



    <script>
      setInterval(function(){
      var expDate = "<?php echo strtotime($echo[0]->expires_at);?>" ; 
      var today= new Date().getTime() / 1000; // UNIX en seconde
      var lifetime = expDate - today; // duree de vie en seconde 
      var hour = Math.floor(lifetime / 3600);
      var minutes = Math.floor(lifetime / 60 - hour * 60);
      var seconds = Math.floor(lifetime - hour * 3600 - minutes * 60)
      if (hour.length = 1){hour = "0" + hour;}
      var life = document.getElementById("life");
      life.innerHTML =  + hour + ":" + minutes + ":" + seconds;
      if(lifetime < 0 ){
        window.location.replace('<?php echo base_url() ?>');
      }

      }, 1000);
    </script>
    

  <footer>
    <ul>
      <li><p>En utilisant ce service, vous acceptez les <a href="welcome/CGU.html" target="blank">Conditions Générales d'Utilisation</a>.</p></li>
      <li><a href="https://www.facebook.com/pages/Echo/662945737093488" target="blank"><img src="../../assets/img/fb.png"></a></li>
      <li><a href="https://twitter.com/LeProjetEcho" target="blank"><img src="../../assets/img/twitter.png"></a></li>
    </ul>
  </footer>
</body>
</html>


