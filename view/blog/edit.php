<?php
// framework/view/contact/edit.php
?>
<!DOCTYPE html>
<html Lang="fr">
<head>
	<meta charset="UTF-8">
	<title> Modifier un article</title>
</head>
<body>
	<form action="/blog/udpate/?id<?= $GLOBALS['articles']->id ?>" method="post">
		<input type="text" name="titre" value="<?= $GLOBALS['articles']->titre ?>" placeholder="titre"><br>
		<input type="text" name="auteur" value="<?= $GLOBALS['articles']->auteur ?>" placeholder="auteur"><br>
		<input type="text" name="theme" value="<?= $GLOBALS['articles']->theme ?>" placeholder="theme"><br>
		<input type="submit" value="Envoyer">
	</form>
</body>
</html>