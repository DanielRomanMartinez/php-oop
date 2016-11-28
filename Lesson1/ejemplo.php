<?php
/*
 * Clase Telefono
 */
class Phone
{
    var $model;
    var $color;
    var $company;
 
    function __construct($model, $color, $company)
    {
        $this->model   = $model;
        $this->color   = $color;
        $this->company = $company;
    }
 
    function call()
    {
        return 'Estoy llamando a otro móvil';
    }
 
    function sms()
    {
        return "Estoy enviando un mensaje de texto";
    }
}
 
$nokia = new Phone('Nokia', 'Blanco', 'Movistar');
echo "{$nokia->call()} <br>"; // Estoy llamando a otro móvil
echo $nokia->color; // Imprimirá Blanco

/*****************************************************************/

class Person
{
    var $firstName;
    var $lastName;

    function __construct($firstName, $lastName)
	{
	    $this->firstName = $firstName;
	    $this->lastName  = $lastName;
	}
 
    function fullName()
	{
	    return $this->firstName . ' ' . $this->lastName;
	}
}

 	
$person1 = new Person('Duilio', 'Palacios');
$person2 = new Person('Ramon','Lapenze');
echo "<hr>";
echo "{$person1->fullName()} es amigo de {$person2->fullName()}<br>";

class Coche
{
    var $modelo;
    var $color;
    var $estado;

    function __construct($modelo, $color)
	{
	    $this->modelo = $modelo;
	    $this->color  = $color;
	    $this->estado = 'parado';
	}
 
    function arrancar()
	{

		if($this->estado == 'parado'){
			$this->estado = 'arrancado';
			return "Estoy arrancando el motor";	
		} else {
			return "El coche ya esta arrancado";
		}
	    
	}

	function parar()
	{

		if($this->estado == 'arrancado'){
			$this->estado = 'parado';
			return "Estoy parando el motor";	
		} else {
			return "El coche ya esta parado";
		}
	    
	}

	function fullInfo()
	{
		return "El coche es un ".$this->modelo." de color ".$this->color.". Actualmente se encuentra ".$this->estado;
	}
}

$coche1 = new Coche('Toyota Supra', 'blanco');
$coche2 = new Coche('Mitsubishi Lancer Evolution', 'Rojo');

echo "{$coche2->fullInfo()} <br>";
echo "{$coche2->arrancar()} <br>";
echo "{$coche2->parar()} <br>";
echo "{$coche2->fullInfo()} <br>";
echo "{$coche2->parar()} <br>";
echo "{$coche2->arrancar()} <br>";
echo "{$coche2->arrancar()} <br>";
echo "{$coche2->fullInfo()} <br>";



?>