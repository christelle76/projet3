<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Blog</title>
  <link rel="stylesheet" type="text/css" href="Contenu/style.css">
  <link rel="stylesheet" type="text/css" href="Contenu/styleResponsive.css">
  <script src="Script/script.js"></script>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
  <div id="contenu">
    <header> 
      <div id="blogPresentation">
        <h1><a href="index.php">Bienvenue</a></h1>
        <p>sur le blog de <span id="jean">Jean Forteroche</span></p>
        <p> </p>
        <p>Billet simple pour l'Alaska</p>
      </div>
    </header>
    <div class="separateur"><i class="fab fa-pagelines"></i></div>
    <div id ="contenuArticles">
          <?= $contenu; ?>
    </div>
    <div class="separateur"><i class="fab fa-pagelines"></i></div>
    <footer>
      <p>Blog réalisé avec PHP, HTML5 et CSS.</p>
      <form method="post" action="index.php"> 
        <label for "pseudo"><b>Identifiant :</b></label> <input type="text" id="identifiant" name="id"/>
        <label for "password"><b>Mot de passe :</b></label> <input type="password" id="password" name="password"/>
        <button type="submit"><b>Connexion</b></button>
      </form>
              <?php if (isset($result)){$loginResult; } else { };  ?>
      
    </footer>
  </div>
</body>
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</html>