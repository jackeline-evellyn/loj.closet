<?php 
	
	//Abrir conexão
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$banco = "loja_closet";
	$conecta = mysqli_connect($servidor,$usuario, $senha, $banco);

	//Testar conexao
	if(mysqli_connect_errno()){
		die("Conexao falhou: ". mysqli_connect_errno());

	}
?>
<?php
	//Consula aos banco de dados
	$consulta_produto = "SELECT * FROM produto";
	$produto = mysqli_query($conecta, $consulta_produto);

	if(!$produto){
		die ("Falha na consulta ao banco.");
	}
?>
