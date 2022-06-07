<?php
    require_once("../class/class tabuleiro.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        $tabuleiro = new tabuleiro("", "");
        $tabuleiro->excluir($id);
        header("location:../cad/cad_tabuleiro.php");
	}

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $lado = isset($_POST["lado"]) ? $_POST["lado"] : "";
        
        $tabuleiro = new tabuleiro($id, $lado);
	//	var_dump($tabuleiro);
        if($id == 0){
            $tabuleiro->insere();
            header("location:../cad/cad_tabuleiro.php");
        } else{
            $tabuleiro->editar($id);
            header("location:../cad/cad_tabuleiro.php");
        }
    }
?>