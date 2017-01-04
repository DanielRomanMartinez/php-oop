<?php

class Person
{
    protected $firstName;
    protected $lastName;
    protected $nickname;
    protected $birthday;
    protected $changedNickname = 0;

    function __construct($firstName, $lastName)
	{
	    $this->firstName = $firstName;
	    $this->lastName  = $lastName;
	}


	public function setFirstName($firstName)
	{
		return $this->firstName;
	}

	public function getFirstName()
	{
		return $this->firstName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function setNickname($nickname)
	{
		// Cambiar nickname 2 veces
		if($this->changedNickname>=2){
			throw new Exception("You can't change a nickname more than twice");
		}

		// Nickname solo letras
		if (!ctype_alpha($nickname)) {
			throw new Exception("The nickname only can cointains letters");
		}

		// Nickname debe tener almenos 3 caracteres
		if(strlen($nickname)<3){
			throw new Exception("The nickname requires at least 3 characters.");
		}

		if($nickname == $this->firstName || $nickname == $this->lastName){
			throw new Exception("The nickname can't be equals than First Name or Last Name");	
		}

		$this->nickname = strtolower($nickname);
		$this->changedNickname++;
	}

	public function getNickname()
	{
		return $this->nickname;
	}

	public function setBirthday($birthday)
	{
		$this->birthday = $birthday;
	}
 
    public function getFullName()
	{
	    return $this->firstName . ' ' . $this->lastName;
	}

	public function getAge(){
		$date = explode("/", $this->birthday);
		$years = date('Y')-$date[2];
		if($date[0]>date('d') && $date[1]>=date('m')){
			$years--;
		}

		return $years;
	}
}

 	
$person1 = new Person('Dani', 'Roman');
$person2 = new Person('Monica','Castellanos');

// $person1->firstName = 'Dani'; // ERROR
$person1->setFirstName('Dani');
$person1->setNickname('DannyKass');
$person1->setBirthday('18/08/1990');
//$person1->setNickname('DaniRoman1');
//$person1->setNickname('DaniRomanMartinez');

echo "{$person1->getFirstName()} ";
echo "{$person1->getLastName()}  ";
echo "{$person1->getNickname()} <br>";
echo "{$person1->getAge()}";

//echo "{$person1->getFullName()} es amigo de {$person2->getFullName()}<br>";

?>
