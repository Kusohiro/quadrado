<?php 

class quadrado {
	private $idQuad;
	private $lado;
	private $cor;
	private $QidTab;
	
	 public function __construct($idQuad, $lado, $cor, $QidTab){
            $this->setlado($lado);
            $this->setcor($cor);
		 $this->setidquad($idQuad);
		 $this->setQidTab($QidTab);
        }
	public function __toString(){
		$str = "idQuad: ".$this->getidquad() ."<br>lado: ".$this->getlado() ."<br> cor: ".$this->getcor() ."<br>QidTab: ".$this->getQidTab() ."<br> area: ".$this->area()." <br> perimetro: ".$this->perimetro()." <br> diagonal: ".$this->diagonal();
		return $str;
	}
	 public function getlado(){ return $this->lado; }
        public function getcor(){ return $this->cor; }
	public function getidquad(){ return $this->idQuad; }
	public function getQidTab(){ return $this->QidTab; }
		
        public function setlado($lado){ if ($lado > 0)$this->lado = $lado; }
        public function setcor($cor){ if (strlen($cor) > 0)$this->cor = $cor; }
	public function setidquad($idquad){ if ($idquad > 0)$this->idQuad = $idquad; }
	public function setQidTab($QidTab){ if ($QidTab > 0)$this->QidTab = $QidTab; }
	
	public function area(){
		return $this->lado * $this->lado;
	}
	public function perimetro(){
		return $this->lado * 4;

	}
	public function diagonal(){
		$lado2 = $this->lado * $this->lado;
		$diagonal2 = $lado2 + $lado2;
		return sqrt($diagonal2);
	}
 public function insere(){
            require_once("../conf/Conexao.php");
            $query = "INSERT INTO quadrado (idQuad, lado, cor, QidTab) VALUES (:idQuad, :lado, :cor, :QidTab)";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
	 		$stmt->bindParam(":idQuad", $this->idQuad);
            $stmt->bindParam(":lado", $this->lado);
            $stmt->bindParam(":cor", $this->cor);
	 		$stmt->bindParam(":QidTab", $this->QidTab);
            return $stmt->execute();
        }
        public function buscar($id){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM quadrado WHERE idQuad = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
        public function editar($id){
            require_once("../conf/Conexao.php");
            $query = "UPDATE quadrado
                    SET lado = :lado, cor = :cor, QidTab = :QidTab
                    WHERE idQuad = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":lado", $this->lado);
            $stmt->bindParam(":cor", $this->cor);
			$stmt->bindParam(":QidTab", $this->QidTab);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
        public function excluir($id){
            require_once("../conf/Conexao.php");
            $query = "DELETE FROM quadrado WHERE idQuad = :id";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            $stmt->bindParam(":id", $id);
            return $stmt->execute();
        }
		public function desenha(){
			$desenho = "<style>
	div.quad {
 width: ". $this->getlado() ."px;
 height: ". $this->getlado() ."px;
 background-color:".$this->getcor() .";
 		border-style: solid;
		border-width: 1px;
		border-color: #000;
 }


</style>

<div class='quad'></div>";
	return $desenho;		
		}
	public function buscarTabuleiro(){
            require_once("../conf/Conexao.php");
            $query = "SELECT * FROM tabuleiro";
            $conexao = Conexao::getInstance();
            $stmt = $conexao->prepare($query);
            if($stmt->execute())
                return $stmt->fetchAll(); 
            return false;
        }
    }
?>
