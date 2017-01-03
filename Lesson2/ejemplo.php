<?php

class Person
{
    protected $firstName;
    protected $lastName;
    protected $nickname;
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
		if($this->changedNickname>=2){
			throw new Exception("You can't change a nickname more than twice");
		}

		if (!ctype_alpha($nickname)) {
			throw new Exception("The nickname only can cointains letters");
		}

		if(strlen($nickname)<3){
			throw new Exception("The nickname requires at least 3 characters.");
		}

		$this->nickname = strtolower($nickname);
		$this->changedNickname++;
	}

	public function getNickname()
	{
		return $this->nickname;
	}
 
    function getFullName()
	{
	    return $this->firstName . ' ' . $this->lastName;
	}
}

 	
$person1 = new Person('Dani', 'Roman');
$person2 = new Person('Monica','Castellanos');

// $person1->firstName = 'Dani'; // ERROR
$person1->setFirstName('Dani');
$person1->setNickname('DKAA');
$person1->setNickname('DaniRoman1');
$person1->setNickname('DaniRomanMartinez');

echo "{$person1->getFirstName()} ";
echo "{$person1->getLastName()}  ";
echo "{$person1->getNickname()} ";

//echo "{$person1->getFullName()} es amigo de {$person2->getFullName()}<br>";

?>