<?php
class validation {
	
    public function IsNumber($num)
    {
        if ( is_numeric ( $_POST["$num"] ) == false )
        {
            return false;
        }
        
        else
            return true;
    }
    
	public function IsEmpty($name)
	{
			if (empty($_POST["$name"]))
				return false;
        
			else 
                return true;
	}
	
	
	
	public function IsEmail($Email) 
	{
	  if (empty($_POST["$Email"]));
		return false;
     
    // check if e-mail address is well-formed
         if (filter_var($Email, FILTER_VALIDATE_EMAIL)) 
			return true;
		
	}
	public function IsPositive($Num)
	{
		$num = $_POST["$Num"];
		if($num>0)
			return true;
		else 
			return false;
		
		
	}
		
	}
?>