<!doctype html>
<?php 
require_once("class/class quadrado.php");
		$idQuad = isset($_GET["idQuad"]) ? $_GET["idQuad"] : "";
		$idTab = isset($_GET["idTab"]) ? $_GET["idTab"] : "";
		$lado = isset($_GET["lado"]) ? $_GET["lado"] : "";
        $cor = isset($_GET["cor"]) ? $_GET["cor"] : "";
		$nome = isset($_GET["nome"]) ? $_GET["nome"] : "";
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>quadrado</title>
<link href="BlogPostAssets/styles/blogPostStyle.css" rel="stylesheet" type="text/css">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/montserrat:n4:default;source-sans-pro:n2:default.js" type="text/javascript"></script>
</head>

<body>
		<audio autoplay loop>
			<source  src="audio.mpeg">
		</audio>
<div id="mainwrapper">
  <header> 
    <!--**************************************************************************
    Header starts here. It contains Logo and 3 navigation links. 
    ****************************************************************************-->
    <div id="logo"><img src="BlogPostAssets/images/logoImage.png.png"logoImage.png"" alt="sample logo"><!-- Company Logo text --></div>
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
      <div id="bannerImage"><img src="BlogPostAssets/images/160e6a310003bee0545da7e36d27cfa8--anime-scenery-horror-film.jpg" alt=""/></div>
		<br>
      	<?php $dequad = new quadrado($idQuad, $lado, $cor, $idTab);
		$joaquim=$dequad->desenha();
		echo $joaquim;?>
<aside id="authorInfo" align="center"> 
        <!-- The author information is contained here -->
        <h2>João Vitor Oliveira de Souza</h2>
      <img id="melodia" src="BlogPostAssets/images/commission_by_jirafuru_de6glls-350t.png" width="633" height="350" alt=""/>
		<br><br></aside>
		<br>
    </section>
    <section id="sidebar"> 
      <!--************************************************************************
    Sidebar starts here. It contains a searchbox, sample ad image and 6 links
    ****************************************************************************-->
	  <h2>quadrado:</h2>
		<?php 
		$quadrado = new quadrado ($idQuad, $lado, $cor, $idTab);
		$valores = $quadrado->__toString();
	echo $valores;
	?>
		  <br><hr>
		 <div id="adimage"><img src="BlogPostAssets/images/images (1).jpg" alt=""/></div>
		<br><br>
    </form>
	  	<a href="cad/cad_tabuleiro.php?nome=<?php echo $nome?>">tabela tabuleiro </a>
		<br><br>
		<a href="cad/cad_quadrado.php?nome=<?php echo $nome?>">tabela quadrado </a>
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