<?php


class CoffeeModel{
function CreateCoffeeDropDownList()
	{
		$coffeeModel =new CoffeeModel();
		$result ="<form action = '' method='post' width='200px'>
		
		 Please select a type:
		 <select name ='types'>
		 <option value = '%'>All </option>
		 ".$this->CreateOptionValues($coffeeModel->GetCoffeeTypes()).
		 "</select>
		 <input type ='submit' value='search'/>
		 </form>";
	
      return $result;	
	}

}














function GetCoffeeTypes() {
        require 'Credentials.php';

        //Open connection and Select database.   
      $con =   mysqli_connect($host, $user, $passwd,$database) or die(mysqli_error());
      //  mysqli_select_db($database);
	  $result=$con->query("SELECT DISTINCT type FROM coffee");
      //  $result = mysqli_query("SELECT DISTINCT type FROM coffee") or die(mysqli_error());
     //   $types = array();

        //Get data from database.
       // while ($row = mysql_fetch_array($result)) {
while($row=$result->fetch_assoc()){		
		echo $row["type"]." <br>";
          //  array_push($types, $row[0]);
        }

        //Close connection and return result.  
      //  mysqli_close();
		$con->close();
      //  return $types;
    }
	GetCoffeeTypes();
	?>