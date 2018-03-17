<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Blog</title>
  <link rel="stylesheet" type="text/css" href="Contenu/style.css">
  <script src="Script/script.js"></script>
</head>
<body>
  <div id="contenu">
    <header> 
      <h1><a href="index.php">Bienvenue</a></h1>
    </header>
    <div id="derniersArticles">
          <?= $contenu; ?>
    </div>
    <footer>
      <p>Blog réalisé avec PHP, HTML5 et CSS.</p>
      <form method="post" action="index.php?action=connexion"> 
        <label for "pseudo"><b>Identifiant :</b></label> <input type="text" id="identifiant" name="id"/>
        <label for "password"><b>Mot de passe :</b></label> <input type="password" id="password" name="password"/>
        <button type="submit"><b>Connexion</b></button>
      </form>
      <div id="loginResult">
        <?= $loginResult; ?>
      </div>
    </footer>
  </div>
</body>
</html>