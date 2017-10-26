<?php

//framework/controller/blog.php
class blogController extends Controller
{
	public function create()
	{
		// Je rends la vue qui se trouve dans view/blog/create.php
		$this->render('blog.create');
	}

	public function store()
	{
		$blog = new Model ('articles');
		$blog->auteur = $_POST['auteur'];
		$blog->titre = $_POST['titre'];
		$blog->theme = $_POST['theme'];
		$blog->texte = $_POST['texte'];
		$blog->save();
	//	header('Location: /blog/index');
	}

	public function index()
	{
		$blog = new Model('articles');
		$GLOBALS['articles'] = $blog->all();
		$this->render('blog.index');
	}

	public function edit()
	{
		$blog = new Model('articles');
		$blog->find($_GET['id']);
		$GLOBALS['articles'] = $blog;
		$this->render('blog.edit');
	}

	public function update()
	{
		$blog = new Model ('articles');
		$blog->find($_GET['id']);
		$blog->auteur = $_POST['auteur'];
		$blog->titre = $_POST['titre'];
		$blog->theme = $_POST['theme'];
		$blog->save();

		// header('Location: /blog/index');
	}
	public function delete()
	{
		$blog = new Model('articles');
		$blog->delete($_GET['id']);
	}
}

?>