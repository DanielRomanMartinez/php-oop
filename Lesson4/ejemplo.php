<?php

// Unit
abstract class Unit {
	protected $alive = true;
	protected $name;

	public function __construct($name){
		$this->name = $name;
	}

	public function move($direction){
		echo "<p>{$this->name} camina hacia $direction</p>";
	}

	abstract public function attack($opponent);
}

// Soldier
class Soldier extends Unit{

	public function attack($opponent){
		echo "<p>{$this->name} corta a $opponent en 2</p>";	
	}
}

// Archer
class Archer extends Unit{
	public function attack($opponent){
		echo "<p>{$this->name} dispara una flecha a $opponent</p>";

		$opponent->die();
	}
}

/*
$dk = new Unit('Dani');
$dk->move('Hacia el sud');
$dk->attack('Ramm');
*/
echo "<hr>";

$dk = new Soldier('Dani');
$dk->move('Hacia el sud');
$dk->attack('Ramm');

echo "<hr>";

$monica = new Archer('Monica');
$monica->attack($monica);

?>