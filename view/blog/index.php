<?php
//framework/view/blog/index.php
?>

<?php foreach($GLOBALS['articles'] as $blog): ?>
	<div>
		Titre : 
		<a href="/blog/edit/?id=<?= $blog['id'] ?>">
			<?= $blog['titre'] ?>
		</a><br>
		Auteur : <?= $blog['auteur'] ?> <br>
		Thème : <?= $blog['theme'] ?> <br>
		<a href="/blog/delete/?id=<?= $blog['id'] ?>">Supprimer</a>
	</div>
	<hr>
<?php endforeach ?>