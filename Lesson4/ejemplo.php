<?php

// Unit4 -- Min 6:01 -- https://styde.net/interaccion-entre-objetos/

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

	public function setHp($points)
	{
		$this->hp = $points;
	}

	public function getHp()
	{
		return $this->hp;
	}

	abstract public function attack(Unit $opponent);

	public function die()
	{
		show("{$this->name} muere");
	}
}

// Soldier
class Soldier extends Unit
{

	public function attack(Unit $opponent)
	{
		show("{$this->name} corta a $opponent en 2");	
	}
}

// Archer
class Archer extends Unit
{

	protected $damage = 20;

	public function attack(Unit $opponent)
	{
		show("{$this->name} dispara una flecha a {$opponent->getName()	}"); 

		$opponent->setHp($opponent->getHp() - $this->damage);

		if($opponent->getHp() <=0) $opponent->die();
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

echo "<hr>";

$monica = new Archer('Monica');
$monica->attack($dk);
$monica->attack($dk);
?>