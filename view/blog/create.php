<?php

//framework/view/blog/create.php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>créer un article</title>
</head>
<body>
	<form action="/blog/store" method="post">
		<input type="text" name="titre" placeholder="titre"><br>
		<input type="text" name="auteur" placeholder="auteur"><br>
		<input type="text" name="theme" placeholder="theme"><br>
		<input type="submit" value="Envoyer"><br>
	</form>
</body>
</html>