<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('getKey'))
{
    function getKey()
    {
    	if( $this->uri->segment(3) )
    	{
        	$key = $this->uri->segment(3);
      	} 
      	else if ( $this->uri->segment(1))
      	{
        	$key = $this->uri->segment(1);
      	}
    }
}



?>