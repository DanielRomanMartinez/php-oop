<?php
/*
DANI ROMAN MARTINEZ
28/11/2016

Ejercicios Propuestos

    a) Realiza una definición de algún objeto de tu preferencia, por ejemplo: Un carro. Tengo un Toyota de color rojo, con cuatro puertas el cual puede acelerar y tocar la bocina.

    b) A partir del ejercicio anterior, procede a crear una Clase con las propiedades y los métodos que consideres que estén dentro de tu definición.

*/
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