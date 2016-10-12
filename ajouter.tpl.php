<?php
echo <<<EOL
<html>
<head>
<title>$title</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="menu">
<ul>
    <li><a href="home.php">BLOG</a></li>
EOL;

if(isset($_SESSION['auteur'])) {
    echo <<<EOL
    <li><a href="ajouter.php">AJOUTER</a></li>
    <li><a href="suprimer.php">SUPRIMER</a></li> 
    <li><a href="deconnexion.php">DECONNECTER</a></li>
EOL;
} else {
    echo "
<li><a href=\"connexion.php\">CONNEXION</a></li>";
}

echo <<<EOL
<ul>
</div>
	<div id="form">
	<div class="alert">$alert</div>
	<div class="message">$message</div>
	<form action="" method="post">
		<div class="label">Titre</div>
		<div class="input"><input type="text" name="titre" value="$titre"></div>
		<div class="label">Article</div>
		<div class="input"><textarea name="content" value="">$content</textarea></div>
		<div class="label">&nbsp;</div>
		<div class="input"><input type="submit" name="valide" value="ajouter"></div>
	</form>
	</div>
	<div id="content">
	$listeArticles
EOL;
if(!empty($articles)) {
    foreach ($articles as $data) {
        echo "
<div class='titre'>{$data['title']}<span class='actions'> <a href='modifier.php?article={$data['id']}'>Mod.</a> <a href='supprimer.php?article={$data['id']}'>Sup.</a></span></div>
<div class='content'>{$data['content']}</div>
<div class='date'>{$data['date']}</div>";
    }
}
echo <<<EOL
	</div>
</body>
</html>
EOL;

