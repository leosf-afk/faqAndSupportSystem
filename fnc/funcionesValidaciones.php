
<?php 
	function ValidarMail($cadena)
	{
		$regexMail = "/[a-zA-Z0-9._+-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/";
	
		if ( preg_match($regexMail, $cadena) )
		{
			$mailValido = true;
		}
		else
		{
			$mailValido = false;
		}
	
	
		return $mailValido;
	}
?>
