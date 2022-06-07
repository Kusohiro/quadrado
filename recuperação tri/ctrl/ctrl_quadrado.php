<?php
    require_once("../class/class quadrado.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $idQuad = isset($_GET["idQuad"]) ? $_GET["idQuad"] : 0;
	$idTab = isset($_POST["idTab"]) ? $_POST["idTab"] : 0;

    if($acao == "excluir"){
        $quadrado = new quadrado("", "", "", "");
        $quadrado->excluir($idQuad);
        header("location:../cad/cad_quadrado.php");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $lado = isset($_POST["lado"]) ? $_POST["lado"] : "";
        $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
        
        $quadrado = new quadrado($idQuad, $lado, $cor, $idTab);
	//	var_dump($quadrado);
        if($idQuad == 0){
            $quadrado->insere();
            header("location:../cad/cad_quadrado.php");
        } else{
            $quadrado->editar($idQuad);
            header("location:../cad/cad_quadrado.php");
        }
    }
?>