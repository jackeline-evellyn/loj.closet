    <?php require_once("conexao/conexao.php"); ?>
<?php

    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8');

    if(isset($_GET["codigo"])){
        $produto_id = $_GET["codigo"];
    } else {
        header("Location: index.php");
    }
    
    //consulta ao banco de dados
    $consulta = "SELECT * ";
    $consulta .= "FROM produto ";
    $consulta .= "WHERE id = {$produto_id}";
    $detalhe = mysqli_query($conecta,$consulta);

    //Testar erro 
    if(!$detalhe){
        die("Erro na conexão");
    } else{
        $dados_detalhe = mysqli_fetch_assoc($detalhe);
        $nome          = $dados_detalhe["nome"];
        $descricao     = $dados_detalhe["descricao"];
        $preco         = $dados_detalhe["preco"];
        $imagem        = $dados_detalhe["imagem"];
    }
?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title> Loja Closet </title>

		<!-- estilo -->
		<link href="_css/estilo.css" rel="stylesheet">
	</head>

	<body>
		<?php include_once("_incluir/header.php"); ?> 
        <main>
            <div id="detalhe_produto">
                <ul>
                    <li class="imagem"><img src="<?php echo $imagem ?>" width="300px" heigth="350px"></li>
                    <li><h2> <?php echo $nome ?></h2></li>
                    <li><b>Preço:</b> <?php echo "R$ ". number_format($preco,2,',','.') ?></li>
                    <li><b>Descrição:</b> <?php echo $descricao ?></li>
                </ul>
            </div>
        </main>
        <?php include_once("_incluir/footer.php") ?>
	</body>

</html>
