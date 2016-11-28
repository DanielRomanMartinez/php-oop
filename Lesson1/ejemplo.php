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

?>