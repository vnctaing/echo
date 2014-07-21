<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Echo - Le réseau social ouvert et éphémère</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <?=less('style.less')?>
        <?=less('responsive.less')?>
        <?=css('normalize.css')?>
        <?=js('vendor/modernizr-2.6.2.min.js')?>
        <?=js('vendor/less-1.5.0.min.js')?>
        <?=js('jquery.js')?>
        <?=js('localscroll/jquery.localscroll.js')?>
        <?=js('localscroll/jquery.scrollTo.js')?>
        <?=js('lancement.js')?>


    </head>
    <body>


<div id="header">
    <a href="#home">
        <?=img('echo-o-blanc.png', array('class'=>'first'))?>
        <?=img('echo-o-violet.png', array('class'=>'second'))?>
    </a>
    <ul>
        <li><a href="#concept">CONCEPT</a></li>
        <li><a href="#projet">PROJET</a></li>
        <li><a href="#equipe">ÉQUIPE</a></li>
    </ul>
</div>

<div id="home">
    <?=img('logo-echo-blanc.png', array('class'=>'logo'))?>
        <iframe src="//player.vimeo.com/video/78522942" width="580" height="330" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
         <div>
        <p>Echo est un réseau social éphémère, où la durée de vos posts dépend des autres !</p><br><br>
        <?php
            echo form_open('preview/email_validation');
            echo '<p>Pour être informé de la date de lancement :</p>';
            $opts = 'placeholder="Entrez votre adresse mail"';
            echo form_input('email','', $opts);
            echo form_submit('email_submit', 'OK');
            echo form_close();
        ?>

    </div>
</div>

<div id="concept">
    <div>
        <div class="hexa">
            <?= img('post-echo.png', array('alt'=>'post-echo', 'title'=>'Poster un echo' ))?>
            <p>Vous postez un <span>echo</span> de 100 caractères avec une <span>durée de vie limitée.</span></p>
        </div>
        <div class="fleche">
            <?= img('fleche.png', array('alt'=>'fleche', 'title'=>'Fleche' ))?>
        </div>
        <div class="hexa">
            <?= img('resonner-echo.png', array('alt'=>'resonner-echo', ))?>
            <p>Les autres utilisateurs le font <span>résonner</span>, votre echo est partagé et sa <span>durée de vie augmente</span>.
             </p>
        </div>
        <div class="fleche">
            <?= img('fleche.png', array('alt'=>'fleche'))?>
        </div>
        <div class="hexa">
            <?= img('disparition-echo.png', array('alt'=>'disparition-echo'))?>
            <p>Lorsqu'il arrive à la fin de sa durée de vie, l'echo <span>disparaît</span>.</p>
        </div>
    </div>
</div>

<div id="projet">
    <h2><?=img('multiple25.png',array('width'=>'50px'))?> La base</h2>
<p> Nous sommes 3 étudiants en première année de DUT Métiers du Multimédia et de l’Internet. Dans le cadre de cette formation, nous devons réaliser un projet, sur 1 an. C’est l’idée de créer un réseau social, de sa conception au rassemblement de sa communauté, qui nous a réuni. Nous avons donc créé l'agence Guacamole.</p>
    <h2><?=img('notion.png',array('width'=>'100px'))?> L'idée</h2>
<p> La question de la vie privée sur Internet prend aujourd’hui de plus en plus d’ampleur. Des réseaux sociaux comme Snapchat attirent de plus en plus d’utilisateurs car le concept d’éphémère et de disparition des données attire et rassure. Le droit à l’oubli attire les internautes.
    <br>Après avoir réuni les caractéristiques de ce qui nous plaisait dans les réseaux sociaux que l’on fréquentait, nous sommes arrivé à l’idée d’Echo : un réseau social de micro-blogging, où les posts seraient éphémères. Le principe d’abonnés et d’abonnements serait présent, ainsi qu’un système de listes.
</p>
    <h2><?=img('human74.png',array('width'=>'68px'))?>La réflexion</h2>
    <p>À partir de cette idée, nous avons réfléchi à des fonctionnalités supplémentaires pour créer l’envie aux utilisateurs de participer à notre communauté. <a href='#afficher_plus'><span id="showHide">>> Afficher la suite...</a></span>
   <script>
document.getElementById("showHide").onclick = function() {
    var theDiv = document.getElementById("cadre");
    if(theDiv.style.display == 'none') {
        theDiv.style.display = 'block';
        this.innerHTML = '>> Réduire';
    } else {
        theDiv.style.display = 'none';
        this.innerHTML = '>> Afficher la suite';
    }
}
</script>
<div id="cadre" style="display:none;">
Nous avons principalement exploité le jeu portant sur le côté éphémère des posts, en faisant participer les autres membres à leurs durée de vie.
Le post, appelé ici "echo", serait rédigé et mis en ligne avec une durée de vie de X minutes, la durée de vie minimale.
Les autres utilisateurs auraient le choix de reblogger le post — de le faire "résonner" — ce qui augmenterait la durée de vie de celui-ci de Y minutes. Lorsque l’echo arriverait à la fin de sa durée de vie, il disparaîtrait.
<br>Ensuite, pour ajouter un peu de challenge, nous avons pensé à ajouter une fonction de compteurs, présente sur une page de de statistiques accessible depuis chaque profil utilisateur.
On y verrait le nombre de résonances totales que l’utilisateur a comptabilisé sur l’ensemble de ses echos, ainsi que la moyenne des résonances par post en sans doute d’autres statistiques à venir.
<br>Cette idée nous a conduit à la suivante : la création d’une Hot Page, qui afficherait les utilisateurs du réseau qui ont récemment comptabilisés le plus de résonances, ainsi que les echos qui auront  fait "le plus de bruit". Les informations présentées seront mises à jour régulièrement.
Cette page aurait pour but de créer l’envie d’y apparaître, ou simplement de faire découvrir des nouveaux utilisateurs aux personnes qui s’y rendraient.
Voici les fonctionnalités principales du réseau social Echo. Celles-ci sont bien sûr susceptibles d’évoluer.

 <h2><?=img('winners.png', array('width'=>'68px'))?>Le but final</h2>
    <p>Le produit final que nous recherchons à atteindre est un réseau social simple de prise en main, efficace, complet et attractif. Nous souhaitons un design moderne et attractif. Et évidemment : une communauté active !</p>
</div>


</div>

</p>




</div>

<div id="equipe">
    <div>
        <?=img('vincent-hexa.png', array('alt'=>'Croquis de')) ?><br>
        <h3>Vincent Taing</h3>
        <h4>Chef de projet</h4>
        <p>"Passionné par les nouvelles technologies, <br> je suis le développeur et le chef de projet d'Echo."</p>
    </div>
    <div>
        <?=img('emma-hexa.png', array('alt'=>'Croquis de')) ?><br>
        <h3>Emma Grisot</h3>
        <h4>Designer</h4>
        <p> "Je m'occupe du design, de la <br>conception et de l'intégration du site."</p>
    </div>
    <div>
        <?=img('marvis-hexa.png', array('alt'=>'Croquis de')) ?><br>
        <h3>Marvis Dan</h3>
        <h4>Designer</h4>
        <p>"Je créé les logos et les illustrations. Je participe <br>également à la conception du site."
    </div>
</div>

<div id="footer">
    <?php
        echo form_open('preview/email_validation');
        echo '<p>Pour être informé de la date de lancement :</p>';
        $opts = 'placeholder="Entrez votre adresse mail"';
        echo form_input('email','', $opts);
        echo form_submit('email_submit', 'OK');
        echo form_close();
    ?>
</div>
</body>
</html>
