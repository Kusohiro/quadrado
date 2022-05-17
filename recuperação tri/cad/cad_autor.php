<!doctype html>
<?php
    include_once "../conf/default.inc.php";
    require_once "../conf/Conexao.php";
	require_once "../utils.php";
		
		$acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    if($id > 0){
        $vetor = lista_quadrado($id);
    }

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
<div id="mainwrapper">
  <header> 
    <!--**************************************************************************
    Header starts here. It contains Logo and 3 navigation links. 
    ****************************************************************************-->
    <div id="logo"><img src="../BlogPostAssets/images/logoImage.png.png"logoImage.png"" alt="sample logo"><!-- Company Logo text --></div>
    <nav> <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">secreto</a></nav>
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
      	<table border="1">
    <tr>
        <th>ID</th>
        <th>lado</th>
        <th>cor</th>
		<th>Detalhes</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>
    <?php
        $pdo = Conexao::getInstance();
        $consulta = $pdo->query("SELECT * FROM quadrado
                                ORDER BY lado");
        while ($linha = $consulta->fetch(PDO::FETCH_BOTH)) {
			$Cor = str_replace('#','%23',$linha["cor"])
    ?>
    <tr>
        <td><?php echo $linha["id"]; ?></td>
        <td><?php echo $linha["lado"]; ?></td>
        <td><?php echo $linha["cor"]; ?></td>
		<td><a href="../indexautor.php?lado=<?php echo $linha['lado'];?>&cor=<?php echo $Cor;?>">detalhes</a></td>
        <td><a href="cad_autor.php?acao=editar&id=<?php echo $linha['id'];?>">Editar</a></td>
        <td><a href="javascript:excluirRegistro('../ctrl/ctrl_quadrado.php?acao=excluir&id=<?php echo $linha['id']; ?>')">Excluir</a><br></td>
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
      <div id="adimage"><img src="../BlogPostAssets/images/images (1).jpg" alt=""/></div>
		<br>
      <form action="../ctrl/ctrl_quadrado.php?id=<?php echo $id; ?>" method="post">
        lado: <input type="text" name="lado" value="<?php if($acao == "editar") echo $vetor[1]; ?>"><br>
        <br>
        cor: <input type="color" name="cor" value="<?php if($acao == "editar") echo $vetor[2]; ?>"><br>
        <button type="submit" name="acao" value="salvar">Salvar</button>
		  <br><br>
    </form>
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