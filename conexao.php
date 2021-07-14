<?php

	$servidor = "localhost";
	$username = "root";
	$senha = "";
	$dqbnome = "bdCadastro";
	
	$conn = new PDO("mysql:host=localhost;dbnome=$bdCadastro", $username, $senha);
	
	$dados = $conn->("SELECT nome, usuario, email FROM usuario" $conn->quote($usuario));
	
	if($conn -> erro){
	echo "erro de conexão!";}
	else{ 
	echo "conexão realizada";}
?>