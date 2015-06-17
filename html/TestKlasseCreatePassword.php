<?php
require_once('simpletest/autorun.php');
require_once('PassWordCreation.php');


class TestOfCreatePassword extends UnitTestCase {
	
	function testOfCreatePasswordCorrect() {
		include 'DAL.php';
		//If the function'createPassword' is executed correctly, the function will return a password in the form of a string.
		
		$test = createPassword(8);
		$this->assertTrue($test); //Normally it has to return 'true'.
	}
	
	function testOfCreatePasswordIncorrectAmount() {
		include 'DAL.php';
		//If the function'createPassword' is executed correctly, the function will return a password in the form of a string.
		
		$test = createPassword(-5);
		$this->assertFalse($test); //Normally it has to return an false because createPassword should have a positive parameter.
	}
	
	function testOfCreatePasswordIncorrectType() {
		include 'DAL.php';
		//If the function'createPassword' is executed correctly, the function will return a password in the form of a string.
		
		$test = createPassword("number");
		$this->assertFalse($test); //Normally it has to return an error because the parameter of 'createPassword' should be an Integer value.
	}
}
?>