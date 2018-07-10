<?php
class validation {
	
    public function IsNumber( $num )
    {
        if ( is_numeric ( $num ) )
            return false; // not number
        
        else
            return true; // number
    }
    
	public function IsEmpty( $name )
	{
        if ( empty ( $name ) )
            return false; // not empty

        else 
            return true; // empty
	}
	
	
	
	public function IsEmail( $Email ) 
	{
    // check if e-mail address is well-formed
         if ( ( filter_var( $Email , FILTER_VALIDATE_EMAIL ) )  && ( empty( $Email ) == false ) ) 
			return true ;
        
        else
            return false ;
	}
	public function IsPositive( $Num )
    {
		if( $Num > 0 )
			return true; // positive
        
		else 
			return false; // negative
	}
		
	}
?>