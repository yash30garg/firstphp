
<?php

require("Model/CoffeeModel.php");

//contains non-database related function for the coffee page 
class CoffeeController
{
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
	
	function CreateOptionValues($valueArray)
	{
		$result ="";
		for($tmp=0;$tmp<sizeof($valueArray);$tmp++){
			
			$result = $result . "<option value='$valueArray[$tmp]'>$valueArray[$tmp]</option>";
		}
		/*foreach($valueArray as $value)
		{
			$result = $result . "<option value='$value'>$value</option>";
		}
		*/
		return $result;
	}
	
	function CreateCoffeeTables($types)
	{
		$coffeeModel = new CoffeeModel();
		$coffeeArray = $coffeeModel->GetCoffeeByType($types);
		$result = "";
		
		//generate a coffeeTable for each coffeeEntity in array
		foreach ($coffeeArray as $key => $coffee)
		{
			$result =$result .
			    "<table class ='coffeeTable'>
				
				
				
				
				 
				 <tr>
				 <th rowspan='6' width= '150px'><img runat= 'server' src ='$coffee->image'/></th>
				 <th width ='75px'>Name: </th>
				 <td>$coffee->name</td>
				 </tr>
				 
				 <tr>
				 <th>Type:</th>
				 <td>$coffee->type</td>
				 </tr>
				 
				 <tr>
				 <th>Price:</th>
				 <td>$coffee->price</td>
				 </tr>
				 
				  <tr>
				 <th>Roast:</th>
				 <td>$coffee->roast</td>
				 </tr>
				 
				  <tr>
				 <th>Origin:</th>
				 <td>$coffee->country</td>
				 </tr>
				 
				 </table>";
				 
				 
		}
		return $result;
		
	}
	
	
}


?>