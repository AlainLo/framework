<?php

//framework/view/contact/create.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>créer un contact</title>
</head>
<body>
	<form action="/contact/store" method="post">
		<input type="text" name="nom" placeholder="nom"><br>
		<input type="text" name="prenom" placeholder="prénom"><br>
		<input type="text" name="phone" placeholder="Téléphone"><br>
		<input type="submit" value="Envoyer"><br>
	</form>
</body>
</html>