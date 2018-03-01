<?php

require ("Entities/CoffeeEntity.php");

//Contains database related code for the Coffee page

class CoffeeModel {

    //Get all coffee types from the database and return them in an array.
    function GetCoffeeTypes() {
        require 'Credentials.php';

        //Open connection and Select database.   
      $con =   mysqli_connect($host, $user, $passwd,$database) or die(mysqli_error());
      //  mysqli_select_db($database);
	    $result=$con->query("SELECT DISTINCT type FROM coffee");
      // $result = mysqli_query("SELECT DISTINCT type FROM coffee") or die(mysqli_error());
       $types = array();

        //Get data from database.
        while($row = $result->fetch_assoc()){
			//echo $row["type"]." <br>";
            array_push($types, $row["type"]);
        }

        //Close connection and return result.
      //  mysqli_close();
		$con->close();
        return $types;
    }

    //Get coffeeEntity objects from the database and return them in an array.
    function GetCoffeeByType($type) {
        require 'Credentials.php';

        //Open connection and Select database.     
       $con = mysqli_connect($host, $user, $passwd) or die(mysqli_error);
       $coffeee = mysqli_select_db($con,$database);

        $query = "SELECT * FROM coffeedb.coffee WHERE type LIKE '$type'";
        $result = mysqli_query($con,$query) ;
        $coffeeArray = array();

        //Get data from database.
        while ($row = mysqli_fetch_array($result)) {
            $name = $row[1];
            $type = $row[2];
            $price = $row[3];
            $roast = $row[4];
            $country = $row[5];
            $image = $row[6];
            $review = $row[7];

            //Create coffee objects and store them in an array.
            $coffee = new CoffeeEntity(-1, $name, $type, $price, $roast, $country, $image, $review);
            array_push($coffeeArray, $coffee);
        }
        //Close connection and return result
        mysqli_close($con);
        return $coffeeArray;
    }

}

?>