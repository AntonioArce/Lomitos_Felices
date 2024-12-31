<?php
	function conectar()
	{
		$user="root";
		$pas="";
		$server="localhost";
		$db="albergue";
		$con=mysqli_connect($server,$user,$pas,$db) or die ("Error al conectar la base de datos".mysqli_error());

		return $con;
	}
?>