<?php 
	
	$username = "root";
	$password = "";
	$database = "bdCadastro";
	$server = "localhost";
    
	$conn = new PDO("mysql:host=localhost; bdCadastro=$database", $username, $senha);
    
    $sql = "SELECT * FROM telefones;";
    echo $sql;
?>
