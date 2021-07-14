<?php
	
	$username = "root";
	$password = "";
	$database = "bdcadastro";
	$server = "localhost";
	
	$conn = new PDO("mysql:host=localhost;dbnome=$bdCadastro", $username, $senha);
	
	if($conn->connect_error){
		die("Erro na conexão ".$conn->connect_error);
		header(string: 'Location: Login.html');
		die();
	} else {
		echo "Conexão realizada.";
		$nome = $_REQUEST["nome"];
		$usuario = $_REQUEST["usuario"];
		$email = $_REQUEST["email"];
		$senha = $_REQUEST["senha"];
		$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
		$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
		$senhasegura = sodium_crypto_scretbox($senha, $nonce, $key);
		$sqlselect = "SELECT nome, email FROM usuario WHERE nome = '$nome', email = '$email';";
		if($conn->query($sqlselect)){
			echo "Erro! Nome ou emial já existem!";
			header(string: 'Location: Login.html');
			die();
		} else {
			$sqlinsert = "INSERT INTO usuarios (nome, usuario, email, senha) VALUES ('$nome', '$suario', '$email', '$senhasegura';)";
			if($conn->query($sqlinsert)){
			echo "Usuário inserido.";
			header(string: 'Location: Login.html');
			die();
			} else {
			echo $conn->error;
			header(string: 'Location: Login.html');
			die();
			}
		}
	} 
?>