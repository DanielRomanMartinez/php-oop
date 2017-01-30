<?php

/*
	Leccion para aprender interfaces y polimorfismo
	
	La palabra polimorfismo significa “múltiples formas” y en programación orientada a objetos puede tener varios significados, por ejemplo la habilidad que tiene un método dentro de un objeto con interactuar con diferentes objetos de diferentes clases de la misma forma pero con resultados diferentes. Esto se logra cuando creamos clases que tienen la misma interfaz (es decir los mismos métodos públicos) pero se comportan de manera diferente. 
*/

function show($message)
{
	echo "<p>$message</p>";
}

abstract class Unit 
{
	protected $alive = true;
	protected $hp = 40;
	protected $name;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function move($direction)
	{
		show("{$this->name} camina hacia $direction");
	}

	public function getName()
	{
		return $this->name;
 	}

	public function getHp()
	{
		return $this->hp;
	}

	abstract public function attack(Unit $opponent);

	public function takeDamage($damage){

		$this->setHp($this->hp - $damage);

		if($this->hp <=0) $this->die();
	}

	public function die()
	{
		show("{$this->name} muere");
	}

	private function setHp($points)
	{
		$this->hp = $points;
		show("{$this->name} ahora tiene {$this->hp} puntos de vida");
	}
}

// Soldier
class Soldier extends Unit
{

	protected $damage = 40;

	public function attack(Unit $opponent)
	{
		show("{$this->name} corta con la espada a {$opponent->getName()}");

		$opponent->takeDamage($this->damage);
	}

	public function takeDamage($damage)
	{
		parent::takeDamage($damage / 2);
	}
}



// Archer
class Archer extends Unit
{

	protected $damage = 20;

	public function attack(Unit $opponent)
	{
		show("{$this->name} dispara una flecha a {$opponent->getName()	}"); 

		$opponent->takeDamage($this->damage);
	}

	public function takeDamage($damage)
	{
		if(rand(0,1) == 1) return parent::takeDamage($damage);
	}
}

// Archer
class MegaSoldier extends Unit
{

	protected $damage = 0;

	public function attack(Unit $opponent)
	{
		show("{$this->name} ataca a {$opponent->getName()}"); 

		$opponent->takeDamage($this->damage);
	}

	public function takeDamage($damage)
	{
		$damage = $damage/5;
		$damage = number_format($damage, 2);
		parent::takeDamage($damage);
	}
}

// DK - Soldado con armadura normal
// Monica - Arquera. De vez en cuando puede esquivar ataques
// DK, despues de cansarse de que Monica le atacara, le ataca de nuevo. Monica sin embargo puede esquivar ataques de vez en cuando.
// Mega Soldier. No ataca, y si ataca hace daño 0. Si le atacan, solo recibe una quinta parte (1/5) del daño.

$dk = new Soldier('Dani');
$dk->move('Hacia el sud');


$monica = new Archer('Monica');
$monica->attack($dk);
$monica->attack($dk);

$dk->attack($monica);

$mega_soldier = new MegaSoldier('Mega Soldier');
$dk->attack($mega_soldier);

?>