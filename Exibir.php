<?php 
	
	$username = "root";
	$password = "";
	$database = "bdCadastro";
	$server = "localhost";
	
    $nomeinfo = $_POST['email'];

	$conn = new PDO("mysql:host=localhost; bdCadastro=$database", $username, $senha);
    
    if($nomeainfo != null){
        $sql = "SELECT nome, usuario, email FROM usuario WHERE nome = '$nomeinfo';";
        echo $sql;
    }	else {
        echo "Nome não encontrado";
        header(string: 'Location: Busca.html');
    }   
}