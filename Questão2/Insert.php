<?php
	
	$username = "root";
	$password = "";
	$database = "bdcadastro";
	$server = "localhost";
	
	$conn = new PDO("mysql:host=localhost;dbnome=$bdCadastro", $username, $senha);
	
	if($conn->connect_error){
		die("Erro na conexão ".$conn->connect_error);
		header(string: 'Location: Cadasto.html');
		die();
	} else {
		echo "Conexão realizada.";
		$nome = $_REQUEST["nome"];
		$telefone = $_REQUEST["telefone"];
		$sqlselect = "SELECT nome, telefone FROM telefone WHERE nome = '$nome', telefone = '$telefone';";
		if($conn->query($sqlselect)){
			echo "Erro! Nome ou telefone já existem!";
			header(string: 'Location: Cadastro.html');
			die();
		} else {
			$sqlinsert = "INSERT INTO telefone (nome, telefone) VALUES ('$nome', '$telefone';)";
			if($conn->query($sqlinsert)){
			echo "Usuário inserido.";
			die();
			} else {
			echo $conn->error;
			header(string: 'Location: Cadastro.html');
			die();
			}
		}
	} 
?>
