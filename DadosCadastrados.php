<?php 
	
	$username = "root";
	$password = "";
	$database = "bdCadastro";
	$server = "localhost";
	
	$conn = new PDO("mysql:host=localhost; bdCadastro=$database", $username, $senha);
	
	$emailinfo = $_REQUEST['email'];
	$senhainfo = $_REQUEST['senha'];
	
	$sqlsenhasegura = "SELECT senha FROM usuario WHERE email = '$emailinfo';";
	$key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);
	$nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);
	$senha = sodium_crypto_scretbox($sqlsenhasegura, $nonce, $key);
	
	if($conn->connect_error){
		die("Erro na conexão ".$conn->connect_error);
		header(string: 'Location: Login.html');
		die();
	} else { 
		echo "Conexão realizada";
		header(string: 'Location: Busca.html');
	}
	
?>