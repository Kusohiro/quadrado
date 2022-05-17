<!doctype html>
<?php 
require_once("class/class quadrado.php");
      $lado = isset($_GET["lado"]) ? $_GET["lado"] : "";
        $cor = isset($_GET["cor"]) ? $_GET["cor"] : "";
?>
<html>
<head>
<meta charset="utf-8">
<title>quadrado</title>
</head>
	<style>
	div.quad {
 width:<?php echo $lado ?>px;
 height:<?php echo $lado ?>px;
 background-color: <?php echo $cor ?>;
 }


</style>
<body>
	
	<?php 
		$quadrado = new quadrado ($lado, $cor);
		$valores = $quadrado->__toString();
	echo $valores;
	?>
	<div class="quad"></div>
	
</body>
</html>