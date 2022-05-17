<?php

    require_once("class/class quadrado.php");

    function exibir_como_select($key, $dados){
        $str = "<option value=0>Escolha</option>";
        foreach($dados as $linha){
            $str .= "<option value='{$linha[$key[0]]}'>{$linha[$key[1]]}</option>";
        }
        return $str;
    }
  function lista_quadrado($id){
		 $quadrado = new quadrado("", "");
        $lista = $quadrado->buscar($id);
        foreach($lista as $dados)
            return $dados;}
?>