<!doctype html>
<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
	require_once "../utils.php";
		
		$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idQuad = isset($_GET["idQuad"]) ? $_GET["idQuad"] : 0;
    if($idQuad > 0){
        $vetor = lista_quadrado($idQuad);
    }
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : 2;
    $procurar = isset($_POST['procurar']) ? $_POST['procurar'] : "";
$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>tabela quadrado</title>
<link href="../BlogPostAssets/styles/blogPostStyle.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
		<audio autoplay loop>
			<source  src="../audio.mpeg">
		</audio>
<div id="mainwrapper">
  <header> 
    <!--**************************************************************************
    Header starts here. It contains Logo and 3 navigation links. 
    ****************************************************************************-->
    <div id="logo"><img src="../BlogPostAssets/images/logoImage.png.png"logoImage.png"" alt="sample logo"><!-- Company Logo text --></div>
    <nav> <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><?php echo $nome?></a>
	  <a href="../login/index.php">SAIR</a></nav>
  </header>
  <div id="content">
    <div class="notOnDesktop"> 
      <!-- This search box is displayed only in mobile and tablet laouts and not in desktop layouts -->
      <input type="text" placeholder="Search">
    </div>
    <section id="mainContent"> 
      <!--************************************************************************
    Main Blog content starts here
    ****************************************************************************-->
      <h1><!-- Blog title -->quadrado</h1>
      <div id="bannerImage"><img src="../BlogPostAssets/images/160e6a310003bee0545da7e36d27cfa8--anime-scenery-horror-film.jpg" alt=""/></div>
		<br>
		<style>
			#pao {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}
			#trcss {
				background-color: #ADFFDC;
			}
				#trcss2:nth-child(odd) {
  background-color: #F37EFF;
}

#trcss2:nth-child(even) {
  background-color: #F557FF;
}
			}
			
			
		</style>
		<form method="post">
    <input type="radio" name="tipo" id="tipo" value="1" <?php if ($tipo == 1) { echo "checked"; }?>>idQuad<br>  
    <input type="radio" name="tipo" id="tipo" value="2" <?php if ($tipo == 2) { echo "checked"; }?>>lado<br>
	<input type="radio" name="tipo" id="tipo" value="3" <?php if ($tipo == 3) { echo "checked"; }?>>cor<br>	
	<input type="radio" name="tipo" id="tipo" value="4" <?php if ($tipo == 4) { echo "checked"; }?>>idTab<br>	
    <input type="text" name="procurar" id="procurar" value="<?php echo $procurar; ?>">
    <input type="submit" value="Consultar">
</form>
      	<table border="1" id="pao">
    <tr id="trcss">
        <th>idQuad</th>
        <th>lado</th>
        <th>cor</th>
		<th>idTab</th>
		<th>Detalhes</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
			
			$sql = "SELECT * FROM quadrado";
    if ($tipo == 1){
        $sql .= " WHERE idQuad like '$procurar' ORDER BY idQuad";
    }else if($tipo == 2){    
        $sql .= " WHERE lado LIKE '$procurar%' ORDER BY lado";
    }else if($tipo == 3) {
		$sql .= " WHERE cor LIKE '%$procurar%' ORDER BY cor";
	}else
		$sql .= " WHERE QidTab LIKE '$procurar' ORDER BY QidTab";
	
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query($sql);
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
			$Cor = str_replace('#','%23',$linha["cor"])
    ?>
    <tr id="trcss2">
        <td><?php echo $linha["idQuad"]; ?></td>
        <td><?php echo $linha["lado"]; ?></td>
        <td><?php echo $linha["cor"]; ?></td>
		<td><?php echo $linha["QidTab"]; ?></td>
		<td><a href="../indexQuadrado.php?idQuad=<?php echo $linha['idQuad'];?>&lado=<?php echo $linha['lado'];?>&cor=<?php echo $Cor;?>&idTab=<?php echo $linha['QidTab'];?>&nome=<?php echo $nome?>">detalhes</a></td>
        <td><a href="cad_quadrado.php?acao=editar&idQuad=<?php echo $linha['idQuad'];?>&nome=<?php echo $nome?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('../ctrl/ctrl_quadrado.php?acao=excluir&idQuad=<?php echo $linha['idQuad']; ?>&nome=<?php echo $nome?>')">Excluir</a><br></td>
    </tr>
    <?php 
        }
    ?>
</table>
      <aside id="authorInfo" align="center"> 
        <!-- The author information is contained here -->
        <h2>João Vitor Oliveira de Souza</h2>
      <img id="melodia" src="../BlogPostAssets/images/commission_by_jirafuru_de6glls-350t.png" width="633" height="350" alt=""/>
		<br><br></aside>
		<br>
    </section>
    <section id="sidebar"> 
      <!--************************************************************************
    Sidebar starts here. It contains a searchbox, sample ad image and 6 links
    ****************************************************************************-->
		<br>
      <form action="../ctrl/ctrl_quadrado.php?idQuad=<?php echo $idQuad; ?>" method="post">
        lado: <input type="text" name="lado" value="<?php if($acao == "editar") echo $vetor[1]; ?>"><br>
        <br>
        cor: <input type="color" name="cor" value="<?php if($acao == "editar") echo $vetor[2]; ?>"><br>
		idTab: <select name="idTab" value="<?php if($acao == "editar") echo $vetor[3]; ?>">
		  <?php
                        echo select_quadrado();
                    ?>
		  </select><br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
		  <br><hr>
		   <div id="adimage"><img src="../BlogPostAssets/images/images (1).jpg" alt=""/></div>
		  <br> <br>
    </form>
		<a href="cad_tabuleiro.php?nome=<?php echo $nome?>">tabela tabuleiro </a>
		<br><br>
		<a href="cad_quadrado.php?nome=<?php echo $nome?>">tabela quadrado </a>
		<br><br><br><br>
    </section>
  </div>
  <div id="footerbar"><!-- Small footerbar at the bottom --></div>
</div>
</body>
</html>
<script>
    function excluirRegistro(url){
        if(confirm("Este registro será excluído. Tem certeza?"))
            location.href = url;
    }
</script>