<?php
    require_once("../class/class quadrado.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        $quadrado = new quadrado("", "");
        $quadrado->excluir($id);
        header("location:../cad/cad_autor.php");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $lado = isset($_POST["lado"]) ? $_POST["lado"] : "";
        $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
        
        $quadrado = new quadrado($lado, $cor);
	//	var_dump($quadrado);
        if($id == 0){
            $quadrado->insere();
            header("location:../cad/cad_autor.php");
        } else{
            $quadrado->editar($id);
            header("location:../cad/cad_autor.php");
        }
    }
?>