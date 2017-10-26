<?php

class model
{
	public $pdo;
	public $table;
	public $attributes = [];
	public $database = 'contacts';
	public $user = 'root';
	public $password ='';
	public $is_new = true;

	public function __construct($table)
	{
		//Instanciation de PDO, stockage dans $this->pdo.
		$this->pdo = new PDO('mysql:host=localhost; dbname=' .$this->database, 
			$this->user, 
			$this->password,
			[PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
		$this->table = $table;
	}
	public function __set($key, $value)
	{
		$this->attributes[$key] = $value;
	}
	public function __get($key)
	{
		return $this->attributes[$key];
	}

	public function save()
	{
		if($this->is_new){
		// INSERT INTO contacts (nom, prenom, phone) VALUES (:nom, :prenom, :phone)
		$query = 'INSERT INTO ' 
		. $this->table 
		. ' (' 
		. implode(', ', array_keys($this->attributes))
		. ') VALUES (:'
		. implode(', :', array_keys($this->attributes))
		. ')';
		$this->execute($query, $this->attributes);
		$this->id = $this->pdo->lastInsertId();
	} else {
		// $query = 'UPDATE contacts SET prenom = :prenom, nom = :nom, phone = :phone';
		$query = 'UPDATE ' . $this->table . ' SET ';
		foreach($this->attributes as $key => $attribute){
			$query .= $key . ' = :' . $key . ', ';	
		}
		$query = substr($query, 0, strlen($query) - 2);
		dd($query);
		$query .= ' WHERE id = :id';

		$this->execute($query, $this->attributes);
		}
	}

	public function execute($query, $params = [], $query_type = '')
	{
		// Je prépare la requête en accédant à $this->pdo.
		$statement = $this->pdo->prepare($query);
		// Pour chaque paramètre passé...
		foreach ($params as $key => &$param) {
			// Je récupère le type du paramètre en cours
			if(is_null($param)){
				$type = PDO::PARAM_NULL;
			} else if (is_bool($param)){
				$type = PDO::PARAM_BOOL;
			} else if (is_int($param)){
				$type = PDO::PARAM_INT;
			} else {
				$type = PDO::PARAM_STR;
			}
			// Je bind le paramètre
			$statement->bindParam($key, $param, $type);
	}
	// J'exécute la requête.
	$q = $statement->execute();
	if($query_type == 'all'){
		return $statement->fetchAll(PDO::FETCH_ASSOC);
		} elseif($query_type == 'select'){
			$this->attributes = $statement->fetch(PDO::FETCH_ASSOC);
			$this->is_new = false;		
		}
		return $q;
	}

	public function all()
	{
		$query = 'SELECT * FROM ' . $this->table;
		return $this->execute($query, [], 'all');
	}

	public function find($id)
	{
		$this->execute('SELECT * FROM ' . $this->table . ' WHERE id = :id' , ['id' => $id], 'select');
	}

	public function delete($id)
	{
		$this->execute('DELETE FROM ' . $this->table . ' WHERE id = :id', ['id' => $id]);
	}
}

?>