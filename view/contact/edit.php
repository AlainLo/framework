<?php
// framework/view/contact/edit.php
?>
<!DOCTYPE html>
<html Lang="fr">
<head>
	<meta charset="UTF-8">
	<title> Modifier un contact</title>
</head>
<body>
	<form action="/contact/udpate/?id<?= $GLOBALS['contact']->id ?>" method="post">
		<input type="text" name="nom" value="<?= $GLOBALS['contact']->nom ?>" placeholder="nom"><br>
		<input type="text" name="prenom" value="<?= $GLOBALS['contact']->prenom ?>" placeholder="prenom"><br>
		<input type="text" name="phone" value="<?= $GLOBALS['contact']->phone ?>" placeholder="Téléphone"><br>
		<input type="submit" value="Envoyer">
	</form>
</body>
</html>