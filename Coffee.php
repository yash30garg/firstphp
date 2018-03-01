<?php

require 'Controller/CoffeeController.php';
 $coffeeController = new CoffeeController();
 
 if(isset($_POST['types']))
 {
	 //fill page with coffees of the selected type 
	 $coffeeTables=$coffeeController->CreateCoffeeTables($_POST['types']);
 }
 
 else
 {
	//page is loaded for the first time,no type selected 
		 $coffeeTables=$coffeeController->CreateCoffeeTables('%');

 }
 
//output page data 
$title ='Coffee overview';
$content = $coffeeController->CreateCoffeeDropdownList(). $coffeeTables;

include 'Template.php';

?>
