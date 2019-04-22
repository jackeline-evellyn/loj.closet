<?php require_once("conexao/conexao.php"); ?>
<?php
    //Determinar localidade Brasil
    setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8');

    //Consulta ao banco de dados
    $produtos = "SELECT id,nome,preco,imagem ";
    $produtos .= "FROM produto ";
    
    if(isset($_GET["produto"])){
        $nome_produto = $_GET["produto"];
        $produtos .= "WHERE nome LIKE '%$nome_produto%' ";
    }
    $resultado = mysqli_query($conecta, $produtos);

    if(!$resultado){
        die("Falha na consulta ao banco");
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
            <div id="janela_pesquisa">
                <form action="index.php" method="get">
                    <input type="text" name="produto" placeholder="Pesquisar">
                    <input type="image" name="pesquisar" src="imagens/botao_search.png">               
                
                </form>
            </div>
            
            
            
            <div id="listagem_produtos">
            <?php 
                while($linha = mysqli_fetch_assoc($resultado)){
            ?>
            <ul>
                <li class="imagem">
                    <a href="detalhe.php?codigo=<?php echo $linha['id'] ?>">
                        <img src="<?php echo $linha["imagem"]   ?>" width="200px" height="250px">
                    </a>
                </li>
                
                <li><h3><?php echo $linha["nome"] ?> </h3></li>
                <li>Preço: <?php echo number_format($linha["preco"],2,',','.') ?></li>
            </ul>
            <?php
                }
            ?>
            </div>
        </main>
        <?php include_once("_incluir/footer.php"); ?>
	</body>

</html>

